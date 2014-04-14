<?php

namespace MobileOne\WSservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sound
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MobileOne\WSservationBundle\Entity\SoundRepository")
 */
class Sound
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
     * @ORM\Column(name="url", type="text")
     */
    private $url;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="MobileOne\WSservationBundle\Entity\Report", inversedBy="sounds")
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
     * @return Sound
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
     * @return Sound
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
     * @return Sound
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

    /**
     * Set url
     *
     * @param string $url
     * @return Sound
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
}