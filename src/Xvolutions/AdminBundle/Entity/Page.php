<?php

namespace Xvolutions\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="url", type="string", unique=true, length=255)
     */
    private $url;

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
     * @ORM\Column(name="id_section", type="integer")
     */
    private $id_section;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_parent", type="integer", nullable=true)
     */
    private $id_parent;

        /**
     * @var integer
     *
     * @ORM\Column(name="id_language", type="integer", nullable=true)
     */
    private $id_language;

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
     * Set URL
     *
     * @param string $url
     * @return Url
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get URL
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
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
    public function getId_section()
    {
        return $this->id_section;
    }

    /**
     * Set id_section
     *
     * @param integer id_section
     * @return Section ID
     */
    public function setId_section($id_section)
    {
        $this->id_section = $id_section;

        return $this;
    }

    /**
     * Get id_parent
     *
     * @return integer 
     */
    public function getId_parent()
    {
        return $this->id_parent;
    }

    /**
     * Set id_parent
     *
     * @param integer id_parent
     * @return Page Parent ID
     */
    public function setId_parent($id_parent)
    {
        $this->id_parent = $id_parent;

        return $this;
    }

    /**
     * Get id_language
     *
     * @return integer 
     */
    public function getId_language()
    {
        return $this->id_language;
    }

    /**
     * Set id_language
     *
     * @param integer id_language
     * @return Page's Language ID
     */
    public function setId_language($id_language)
    {
        $this->id_language = $id_language;

        return $this;
    }
}
