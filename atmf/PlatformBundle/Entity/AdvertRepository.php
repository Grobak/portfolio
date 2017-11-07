<?php

namespace Dur\PlatformBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * AdvertRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdvertRepository extends \Doctrine\ORM\EntityRepository
{
  public function getPublishedQueryBuilder()
  {
    return $this
      ->createQueryBuilder('a')
      ->where('a.published = :published')
      ->setParameter('published', true);
  }

	public function getAdverts($page, $perPage = 10)
	{
	    $query = $this->createQueryBuilder('a')
      	// Jointure sur l'attribut image
      	->leftJoin('a.image', 'i')
      	->addSelect('i')
      	// Tri par date (du plus récent au plus ancien)
      	->orderBy('a.date', 'DESC')
      	->getQuery();

    	$query
    	// On définit l'aricle à partir duquel commence la liste
    	->setFirstResult(($page-1) * $perPage)
    	// Ainsi que le nombre d'articles à afficher sur une page 
    	->setMaxResults($perPage);

    	// On retourne l'objet Paginator correspondant à la requète
    	// !!! Ne pas oublier le use Doctrine\ORM\Tools\Pagination\Paginator; !!!
    	return new Paginator($query, true);
	}

	public function getLastAdverts($max = 5)
	{
	    $query = $this->createQueryBuilder('a')
      	// Tri par date (du plus récent au plus ancien)
      	->orderBy('a.date', 'DESC')
      	->getQuery();

    	$query
    	// Ainsi que le nombre d'articles à afficher sur une page 
    	->setMaxResults($max);

    	// On retourne l'objet Paginator correspondant à la requète
    	// !!! Ne pas oublier le use Doctrine\ORM\Tools\Pagination\Paginator; !!!
    	return new Paginator($query, true);
	}

	public function whereCurrentYear(QueryBuilder $qb)
  {
    $qb->andWhere('a.date BETWEEN :start AND :end')
      ->setParameter('start', new \Datetime(date('Y').'-01-01'))  // Date entre le 1er janvier de cette année
      ->setParameter('end',   new \Datetime(date('Y').'-12-31'));  // Et le 31 décembre de cette année
  }

  public function findAdvertByParametres($data)
  {
    $query = $this->createQueryBuilder('a');
    if($data['date'] != '')
    {
      $query->where('a.date <= :date')
      ->setParameters(array(
        'date' => $data['date']
      ));
    }
 /*   $query->where('a.date <= :date')
    ->setParameters(array(
      'date' => $data['date']
    )); */
    // Si la recherche porte sur toutes les marques
    if($data['title'] != '')
    {
      $query->andWhere('a.title LIKE :title')
      ->setParameter('title', $data['title']);
    }
    return $query->getQuery()->getResult();
  }
}