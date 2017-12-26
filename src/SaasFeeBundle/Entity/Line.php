<?php
/**
 * @author JKetelaar
 */

namespace SaasFeeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Line
 * @package SaasFeeBundle\Entity
 *
 * @ORM\Table(name="line")
 * @ORM\Entity(repositoryClass="SaasFeeBundle\Repository\LineRepository")
 */
class Line
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
     * @var Stop[]
     *
     * @ORM\ManyToMany(targetEntity="SaasFeeBundle\Entity\Stop", mappedBy="lines")
     */
    private $stops;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", unique=true)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * Line constructor.
     */
    public function __construct()
    {
        $this->stops = new ArrayCollection();
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
     * Get stops
     *
     * @return array
     */
    public function getStops()
    {
        return $this->stops;
    }

    /**
     * Set stops
     *
     * @param array $stops
     *
     * @return Line
     */
    public function setStops($stops)
    {
        $this->stops = $stops;

        return $this;
    }

    /**
     * Set stops
     *
     * @param Stop $stop
     *
     * @return Line
     */
    public function addStop(Stop $stop)
    {
        $this->stops[] = $stop;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Line
     */
    public function setNumber($number)
    {
        $this->number = $number;

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
     * @param string $name
     *
     * @return Line
     */
    public function setName(string $name): Line
    {
        $this->name = $name;

        return $this;
    }
}

