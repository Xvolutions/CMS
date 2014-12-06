<?php

namespace Xvolutions\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Page
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Page
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Section")
     */
    private $id_section;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="id")
     * @ORM\Column(name="id_parent", type="integer", nullable=true)
     */
    private $id_parent;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Language")
     */
    private $id_language;

    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Alias",cascade={"persist", "remove"})
     */
    private $id_alias;

    public function __construct() {
        $this->id_language = new \Doctrine\Common\Collections\ArrayCollection();
        $this->id_section = new \Doctrine\Common\Collections\ArrayCollection();
        $this->id_alias = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set title
     *
     * @param string $title
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Page
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Page
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get id_section
     *
     * @return integer 
     */
    public function getIdsection()
    {
        return $this->id_section;
    }

    /**
     * Set id_section
     *
     * @param integer id_section
     * @return Section ID
     */
    public function setIdsection($id_section)
    {
        $this->id_section = $id_section;

        return $this;
    }

    /**
     * Get id_parent
     *
     * @return integer 
     */
    public function getIdparent()
    {
        return $this->id_parent;
    }

    /**
     * Set id_parent
     *
     * @param integer id_parent
     * @return Page Parent ID
     */
    public function setIdparent($id_parent)
    {
        $this->id_parent = $id_parent;

        return $this;
    }

    /**
     * Get id_language
     *
     * @return integer 
     */
    public function getIdlanguage()
    {
        return $this->id_language;
    }

    /**
     * Set id_language
     *
     * @param integer id_language
     * @return Page's Language ID
     */
    public function setIdlanguage($id_language)
    {
        $this->id_language = $id_language;

        return $this;
    }

    /**
     * Get id_alias
     *
     * @return integer 
     */
    public function getIdalias()
    {
        return $this->id_alias;
    }

    /**
     * Set id_alias
     *
     * @param integer id_alias
     * @return Page's Alias ID
     */
    public function setIdalias($id_alias)
    {
        $this->id_alias = $id_alias;

        return $this;
    }
}
