<?php

namespace Xvolutions\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alias
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Alias
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var integer
     *
     * Type 1 - page
     * Type 2 - blogPost
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

        /**
     * @var integer
     *
     * @ORM\Column(name="id_external", type="integer")
     */
    private $id_external;

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
     * Set url
     *
     * @param string $url
     * @return Alias
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set id_external
     *
     * @param string $id_external
     * @return id_external
     */
    public function setIdExternal($id_external)
    {
        $this->id_external = $id_external;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getIdExternal()
    {
        return $this->id_external;
    }
}
