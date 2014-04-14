<?php

namespace MobileOne\WSservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MobileOne\WSservationBundle\Entity\PictureRepository")
 */
class Picture
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="text")
     */
    private $data;
    
    /**
     * @ORM\ManyToOne(targetEntity="MobileOne\WSservationBundle\Entity\Report", inversedBy="pictures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $report;


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
     * Set name
     *
     * @param string $name
     * @return Picture
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Picture
     */
    public function setData($data)
    {
        $this->data = $data;
    
        return $this;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set report
     *
     * @param \MobileOne\WSservationBundle\Entity\Report $report
     * @return Picture
     */
    public function setReport(\MobileOne\WSservationBundle\Entity\Report $report)
    {
        $this->report = $report;
    
        return $this;
    }

    /**
     * Get report
     *
     * @return \MobileOne\WSservationBundle\Entity\Report 
     */
    public function getReport()
    {
        return $this->report;
    }
}