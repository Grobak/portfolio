<?php 

namespace Dur\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MailingController extends Controller
{
    public function indexAction()
    {   
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('DurPlatformBundle:Contact:index.php.twig');
        }

        $user = $this->getUser();

        $email = $user->getEmail();

        // Appel du template
        return $this->render('DurPlatformBundle:Contact:index.php.twig', array('email' => $user->getEmail(), 'name' => $user->getUsername()));
    }

    public function sendAction(Request $request)
    {   
        if ($request) {
            if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
                $user = $this->getUser();

                $username = $user->getUsername();
                $email = $user->getEmail();
            }else{
                $email = "annother-email@live.fr";
            }

            $subject = $_POST["subject"];

            $message = 'Vous avez reçu un message '; 
            if(!is_null($username)) {
                $message .= 'de '. $username .' :<br>';
            }else{
                $message .= 'anonyme :<br>';
            }
            $message .= $_POST["content"] ;

          /*  echo $message ;
            die();  */

            $mail = \Swift_Message::newInstance()
                ->setContentType('text/html')
                ->setSubject($subject)
                ->setFrom($email)
                ->setTo('c-carreras@hotmail.fr')
                ->setBody($message);

        /*    echo $mail;
            die();*/

            $this->get('mailer')->send($mail);

            $request->getSession()->getFlashBag()->add('notice', 'Le mail à bien été envoyé.');

            return $this->redirect($this->generateUrl('dur_platform_home'));
        }
        
        $request->getSession()->getFlashBag()->add('notice', 'Vous n\'avez pas rempli les informations.');

        return $this->redirect($this->generateUrl('dur_platform_home'));
    }
}