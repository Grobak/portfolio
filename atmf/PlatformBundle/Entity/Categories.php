<?php

namespace Dur\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var categ
     *
     * @ORM\Column(name="categ", type="string", length=255)
     */
    private $categ;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set string
     *
     * @param string $string
     *
     * @return Categories
     */
    public function setCateg($string)
    {
        $this->categ = $string;

        return $this;
    }

    /**
     * Get string
     *
     * @return string
     */
    public function getCateg()
    {
        return $this->categ;
    }
}

