<?php

namespace Xvolutions\AdminBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Role
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */

/**
 * @ORM\Table
 * @ORM\Entity()
 */
class Role implements RoleInterface {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column(name="role", type="string", length=20, unique=true)
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="roles")
     */
    private $users;

    public function __construct() {
        $this->users = new ArrayCollection();
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
     * Set role
     *
     * @param string $rolename
     * @return Role Name
     */
    public function setRole( $role ) {
        $this->role = $role;

        return $this;
    }

    /**
     * @see RoleInterface
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Name
     */
    public function setName( $name ) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

}
