<?php
// src/Dur/UserBundle/DataFixtures/ORM/LoadUser.php
namespace Dur\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dur\UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    // Les noms d'utilisateurs à créer
    $listNames = array('admin', 'redaction', 'user');

    foreach ($listNames as $name) {
      // On crée l'utilisateur
      $user = new User;

      // Le nom d'utilisateur et le mot de passe sont identiques
      $user->setUsername($name);
      $user->setPassword($name);
      $user->setEmail($name.'@'.$name.'.com');
      

      // On définit uniquement le role ROLE_USER qui est le role de base
      if($name == 'admin'){
        $user->setRoles(array('ROLE_ADMIN'));
      }else if($name == 'redaction'){
        $user->setRoles(array('ROLE_AUTEUR'));
      }else {
        $user->setRoles(array('ROLE_USER'));
      }

      // On le persiste
      $manager->persist($user);
    }

    // On déclenche l'enregistrement
    $manager->flush();
  }
}