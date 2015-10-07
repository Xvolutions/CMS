<?php

namespace Xvolutions\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * BlogPost
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class BlogPost
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
     * @ORM\Column(name="subtitle", type="string", length=255)
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

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
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=255)
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Language")
     */
    private $id_language;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Section")
     */
    private $id_section;

    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Alias",cascade={"persist", "remove"})
     */
    private $id_alias;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Status")
     */
    private $id_status;

    public function __construct()
    {
        $this->tag = new ArrayCollection();
        $this->category = new ArrayCollection();
        $this->id_section = new ArrayCollection();
        $this->id_language = new ArrayCollection();
        $this->id_alias = new ArrayCollection();
        $this->id_status = new ArrayCollection();
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
     * @return BlogPost
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
     * Set subtitle
     *
     * @param string $subtitle
     * @return BlogPost
     */
    public function setSubTitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getSubTitle()
    {
        return $this->subtitle;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return BlogPost
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return BlogPost
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
     * @return BlogPost
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
     * Set tag
     *
     * @param string tag
     * @return tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set category
     *
     * @param string category
     * @return BlogPost
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return category
     */
    public function getCategory()
    {
        return $this->category;
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

    /**
     * Get id_status
     *
     * @return integer 
     */
    public function getIdstatus()
    {
        return $this->id_status;
    }

    /**
     * Set id_status
     *
     * @param integer id_status
     * @return Page's Status ID
     */
    public function setIdstatus($id_status)
    {
        $this->id_status = $id_status;

        return $this;
    }
}
