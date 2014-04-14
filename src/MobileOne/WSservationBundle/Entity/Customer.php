<?php

namespace MobileOne\WSservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Customer
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MobileOne\WSservationBundle\Entity\CustomerRepository")
 * @ExclusionPolicy("all")
 */
class Customer
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
     * @ORM\Column(name="firstName", type="string", length=255)
     * @Expose
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     * @Expose
     */
    private $lastName;
    
    /**
     * @ORM\OneToMany(targetEntity="MobileOne\WSservationBundle\Entity\Report", mappedBy="customer", cascade={"remove"})
     *
     */
    private $reports;
    
    
    
    /**
     * @ORM\ManyToOne(targetEntity="MobileOne\WSservationBundle\Entity\Company")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;


    

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
     * Set firstName
     *
     * @param string $firstName
     * @return Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Customer
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
     * Constructor
     */
    public function __construct()
    {
        $this->reports = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add reports
     *
     * @param \MobileOne\WSservationBundle\Entity\Report $reports
     * @return Customer
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

    /**
     * Set company
     *
     * @param \MobileOne\WSservationBundle\Entity\Company $company
     * @return Customer
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
}