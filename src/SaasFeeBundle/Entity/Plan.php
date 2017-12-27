<?php
/**
 * @author JKetelaar
 */

namespace SaasFeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Plan
 * @package SaasFeeBundle\Entity
 *
 * @ORM\Table(name="plan")
 * @ORM\Entity(repositoryClass="SaasFeeBundle\Repository\PlanRepository")
 */
class Plan
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var LineStop
     *
     * @ORM\ManyToOne(targetEntity="SaasFeeBundle\Entity\LineStop", inversedBy="plans")
     * @ORM\JoinColumn(name="line_stop_id", referencedColumnName="id")
     */
    private $lineStop;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="dayType", type="string", length=255)
     */
    private $dayType;

    /**
     * Plan constructor.
     */
    public function __construct()
    {
        $this->time = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * Set type
     *
     * @param string $type
     *
     * @return Plan
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return LineStop
     */
    public function getLineStop()
    {
        return $this->lineStop;
    }

    /**
     * @param LineStop $lineStop
     *
     * @return Plan
     */
    public function setLineStop($lineStop): Plan
    {
        $this->lineStop = $lineStop;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Plan
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get dayType
     *
     * @return string
     */
    public function getDayType()
    {
        return $this->dayType;
    }

    /**
     * Set dayType
     *
     * @param string $dayType
     *
     * @return Plan
     */
    public function setDayType($dayType)
    {
        $this->dayType = $dayType;

        return $this;
    }
}

