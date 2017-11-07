<?php

namespace Dur\PlatformBundle\Controller;


use Dur\PlatformBundle\Entity\Image;
use Dur\PlatformBundle\Entity\Advert;
use Dur\PlatformBundle\Form\AdvertType;
use Dur\PlatformBundle\Form\AdvertEditType;
use Dur\PlatformBundle\Form\RechercheType;
use Dur\PlatformBundle\Entity\Category;
use Dur\PlatformBundle\Entity\Application;
use Dur\PlatformBundle\Form\ApplicationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
    public function indexAction($page)
    {
        $user = $this->getUser();

        if($page < 1){
            throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
        }

        $perPage = 5 /* $this->container->getParameter('per_page') */ ;

        // Pour récupérer la liste de toutes les annonces : on utilise findAll()
        $listArticles = $this->getDoctrine()->getManager()->getRepository('DurPlatformBundle:Advert')->getAdverts($page, 
                                                                                                                    $perPage) ;

        // On calcule le nombre total de pages grâce au count($listAdverts) qui retourne le nombre total d'annonces
        $nbPages = ceil(count($listArticles)/$perPage);

        if($page > $nbPages){
            throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
        }
    
    	// Appel du template
        return $this->render('DurPlatformBundle:Advert:index.php.twig', array('listArticles' => $listArticles, 'nbPages' => $nbPages, 'page' => $page));
    }

    public function viewAction($id)
    {
    	$em = $this->getDoctrine()->getManager();

	    // On récupère l'article $id
	    $article = $em->getRepository('DurPlatformBundle:Advert')->find($id);

	    if (null === $article) {
	      	throw new NotFoundHttpException("L'article d'id ".$id." n'existe pas.");
	    }

	    // On récupère la liste des candidatures de cette article
	    $listCommentaires = $em->getRepository('DurPlatformBundle:Application')->findBy(array('advert' => $article));

        return $this->render('DurPlatformBundle:Advert:view.php.twig', array('article' => $article, 
                                                                                'listCommentaires' => $listCommentaires));
    }

	public function menuAction($max = null)
	{
        /* $max = $this->container->getParameter('max') */ ;  
              
        $listArticles = $this->getDoctrine()->getManager($max)
        ->getRepository('DurPlatformBundle:Advert')->getLastAdverts();

    	// Appel du template
		return $this->render('DurPlatformBundle:Advert:menu.php.twig', array('listArticles' => $listArticles));	
    }

    public function addAction(Request $request)
    {
        $advert = new Advert();
        $form = $this->get('form.factory')->create(new AdvertType(), $advert);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('dur_platform_view', array('id' => $advert->getId())));
        }

        return $this->render('DurPlatformBundle:Advert:add.php.twig', array('form' => $form->createView(),));
    }

    public function editAction($id, Request $request)
	  {
		  $advert = $this->getDoctrine()
            ->getManager()
            ->getRepository('DurPlatformBundle:Advert')->find($id);

    	if (null === $advert) {
      	    throw new NotFoundHttpException("L'article d'id ".$id." n'existe pas.");
    	}

        $form = $this->get('form.factory')->create(new AdvertEditType(), $advert);

        // On fait le lien Requête <-> Formulaire
        // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
        $form->handleRequest($request);

        // On vérifie que les valeurs entrées sont correctes
        // (Nous verrons la validation des objets en détail dans le prochain chapitre)
        if ($form->isValid()) {
            // On l'enregistre notre objet $advert dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Article bien enregistrée.');

            // On redirige vers la page de visualisation de l'annonce nouvellement créée
            return $this->redirect($this->generateUrl('dur_platform_view', array('id' => $advert->getId())));
        }

        // À ce stade, le formulaire n'est pas valide car :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
        return $this->render('DurPlatformBundle:Advert:edit.php.twig', array('id' => $id, 'form' => $form->createView(),));
	}

	public function deleteAction($id, Request $request)
	{
		$em = $this->getDoctrine()->getManager();

    	// On récupère l'article $id
    	$advert = $em->getRepository('DurPlatformBundle:Advert')->find($id);
	
    	if (null === $advert) {
    	  	throw new NotFoundHttpException("L'article d'id ".$id." n'existe pas.");
    	}

        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression d'annonce contre cette faille
        $form = $this->createFormBuilder()->getForm();

        if ($form->handleRequest($request)->isValid()) {
            $em->remove($advert);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', "L'article a bien été supprimé.");

            return $this->redirect($this->generateUrl('dur_platform_home'));
        }

        // Si la requète est en GET on affiche une page de confirmation avant de delete
		return $this->render('DurPlatformBundle:Advert:delete.php.twig', array('article' => $advert, 'form'   => $form->createView()));
	}

    public function addApplicationAction(Request $request)
    {
        $commentaire = new Application();
        $form = $this->get('form.factory')->create(new ApplicationType(), $commentaire);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Commentaire posté.');

            return $this->redirect($this->generateUrl('dur_platform_view', array('id' => $commentaire->getId())));
        }

        return $this->render('DurPlatformBundle:Advert:addComm.php.twig', array('form' => $form->createView(),));
    }

    public function searchAction(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            $title = $request->get('Search_term');
            $em = $this->getDoctrine()->getManager();
            $qb = $em->getRepository('DurPlatformBundle:Advert')
                      ->createQueryBuilder('a');
            $searches= explode(' ', $title);
    
            foreach ($searches as $sk => $sv) {
                $cqb[]=$qb->expr()->like("CONCAT($sv, '')", "'%$sv%'");
            }
    
            $qb->andWhere(call_user_func_array(array($qb->expr(),"orx"),$cqb));
    
            $advert = $qb->getResult();
        }
        return $this->render('DurPlatformBundle:Advert:search.html.twig', array('advert' => $advert));
    }

    public function testAction()
    {
        return $this->render('DurPlatformBundle:Advert:index.php.twig');
    }
}