<?php
/**
 * @author JKetelaar
 */

namespace SaasFeeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Stop
 * @package SaasFeeBundle\Entity
 *
 * @ORM\Table(name="stop")
 * @ORM\Entity(repositoryClass="SaasFeeBundle\Repository\StopRepository")
 */
class Stop
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var LineStop[]
     *
     * @ORM\OneToMany(targetEntity="SaasFeeBundle\Entity\LineStop", mappedBy="stop")
     */
    private $lines;

    /**
     * Stop constructor.
     */
    public function __construct()
    {
        $this->lines = new ArrayCollection();
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Stop
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Stop
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Stop
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return LineStop[]
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * @param LineStop[] $lines
     *
     * @return Stop
     */
    public function setLines(array $lines): Stop
    {
        $this->lines = $lines;

        return $this;
    }

    /**
     * @param LineStop $line
     *
     * @return Stop
     */
    public function addLine(LineStop $line): Stop
    {
        $this->lines[] = $line;

        return $this;
    }
}

