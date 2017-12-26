<?php

namespace SaasFeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plan
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
     * @var \stdClass
     *
     * @ORM\Column(name="line", type="object")
     */
    private $line;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="stop", type="object")
     */
    private $stop;

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
     * Get line
     *
     * @return \stdClass
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Set line
     *
     * @param \stdClass $line
     *
     * @return Plan
     */
    public function setLine($line)
    {
        $this->line = $line;

        return $this;
    }

    /**
     * Get stop
     *
     * @return \stdClass
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * Set stop
     *
     * @param \stdClass $stop
     *
     * @return Plan
     */
    public function setStop($stop)
    {
        $this->stop = $stop;

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

