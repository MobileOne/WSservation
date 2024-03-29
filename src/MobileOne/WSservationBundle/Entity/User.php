<?php

namespace MobileOne\WSservationBundle\Entity;

use Symfony\Component\Validator\Constraints\DateTime;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MobileOne\WSservationBundle\Entity\UserRepository")
 * @ExclusionPolicy("all")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     * @Expose
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     * @Expose
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Expose
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     *
     */
    private $password;
    
    
    /**
     * @ORM\Column(name="salt", type="string", length=255)
     *
     */
    private $salt;

    
    
    /**
     * @ORM\ManyToOne(targetEntity="MobileOne\WSservationBundle\Entity\Company", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     * @Expose
     */
    private $company;
    
    /**
     * @ORM\OneToMany(targetEntity="MobileOne\WSservationBundle\Entity\Report", mappedBy="user", cascade={"remove"})
     *
     */
    private $reports;
    
    /**
     * @ORM\Column(name="roles", type="array")
     */
     private $roles;

  

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getusername()
    {
        return $this->username;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set company
     *
     * @param \MobileOne\WSservationBundle\Entity\Company $company
     * @return User
     */
    public function setCompany(\MobileOne\WSservationBundle\Entity\Company $company)
    {
        $this->company = $company;
    
        return $this;
    }

    /**
     * Get company
     *
     * @return \MobileOne\WSservationBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reports = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = 'USER';
    
    }
    
    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }
    
    public function setRoles(array $roles)
    {
    	$this->roles = $roles;
    	return $this;
    }
    
    public function getRoles()
    {
    	return $this->roles;
    }

    /**
     * Add reports
     *
     * @param \MobileOne\WSservationBundle\Entity\Report $reports
     * @return User
     */
    public function addReport(\MobileOne\WSservationBundle\Entity\Report $reports)
    {
        $this->reports[] = $reports;
    
        return $this;
    }

    /**
     * Remove reports
     *
     * @param \MobileOne\WSservationBundle\Entity\Report $reports
     */
    public function removeReport(\MobileOne\WSservationBundle\Entity\Report $reports)
    {
        $this->reports->removeElement($reports);
    }

    /**
     * Get reports
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReports()
    {
        return $this->reports;
    }
    public function eraseCredentials()
    {
    }

   
}