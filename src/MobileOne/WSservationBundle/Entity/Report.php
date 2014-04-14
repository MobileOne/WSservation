<?php

namespace MobileOne\WSservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MobileOne\WSservationBundle\Entity\ReportRepository")
 */
class Report
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
     * @ORM\Column(name="title", type="text")
     */
    private $title;
    
    

    /**
     * @var \DateTime $date
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="positionX", type="decimal")
     */
    private $positionX;
    
     /**
     * @var decimal
     *
     * @ORM\Column(name="positionY", type="decimal")
     */
  
    private $positionY;
    
    /**
     * @ORM\ManyToOne(targetEntity="MobileOne\WSservationBundle\Entity\User", inversedBy="reports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="MobileOne\WSservationBundle\Entity\Customer", inversedBy="reports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;
    
    /**
     * @ORM\OneToMany(targetEntity="MobileOne\WSservationBundle\Entity\Picture", mappedBy="report", cascade={"remove"})
     *
     */
    private $pictures;
    
    /**
     * @ORM\OneToMany(targetEntity="MobileOne\WSservationBundle\Entity\Sound", mappedBy="report", cascade={"remove"})
     *
     */
    private $sounds;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Report
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
     * Set description
     *
     * @param string $description
     * @return Report
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set user
     *
     * @param \MobileOne\WSservationBundle\Entity\User $user
     * @return Report
     */
    public function setUser(\MobileOne\WSservationBundle\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \MobileOne\WSservationBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set customer
     *
     * @param \MobileOne\WSservationBundle\Entity\Customer $customer
     * @return Report
     */
    public function setCustomer(\MobileOne\WSservationBundle\Entity\Customer $customer)
    {
        $this->customer = $customer;
 
    
        return $this;
    }

    /**
     * Get customer
     *
     * @return \MobileOne\WSservationBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set positionX
     *
     * @param string $positionX
     * @return Report
     */
    public function setPositionX($positionX)
    {
        $this->positionX = $positionX;
    
        return $this;
    }

    /**
     * Get positionX
     *
     * @return string 
     */
    public function getPositionX()
    {
        return $this->positionX;
    }

    /**
     * Set positionY
     *
     * @param string $positionY
     * @return Report
     */
    public function setPositionY($positionY)
    {
        $this->positionY = $positionY;
    
        return $this;
    }

    /**
     * Get positionY
     *
     * @return string 
     */
    public function getPositionY()
    {
        return $this->positionY;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Report
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
     * Constructor
     */
    public function __construct()
    {
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sounds = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add pictures
     *
     * @param \MobileOne\WSservationBundle\Entity\Picture $pictures
     * @return Report
     */
    public function addPicture(\MobileOne\WSservationBundle\Entity\Picture $pictures)
    {
        $this->pictures[] = $pictures;
    
        return $this;
    }

    /**
     * Remove pictures
     *
     * @param \MobileOne\WSservationBundle\Entity\Picture $pictures
     */
    public function removePicture(\MobileOne\WSservationBundle\Entity\Picture $pictures)
    {
        $this->pictures->removeElement($pictures);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Add sounds
     *
     * @param \MobileOne\WSservationBundle\Entity\Sound $sounds
     * @return Report
     */
    public function addSound(\MobileOne\WSservationBundle\Entity\Sound $sounds)
    {
        $this->sounds[] = $sounds;
    
        return $this;
    }

    /**
     * Remove sounds
     *
     * @param \MobileOne\WSservationBundle\Entity\Sound $sounds
     */
    public function removeSound(\MobileOne\WSservationBundle\Entity\Sound $sounds)
    {
        $this->sounds->removeElement($sounds);
    }

    /**
     * Get sounds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSounds()
    {
        return $this->sounds;
    }
}