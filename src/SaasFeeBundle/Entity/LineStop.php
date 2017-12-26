<?php
/**
 * @author JKetelaar
 */
namespace SaasFeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LineStop
 *
 * @ORM\Table(name="line_stop")
 * @ORM\Entity(repositoryClass="SaasFeeBundle\Repository\LineStopRepository")
 */
class LineStop
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
     * @var Stop
     *
     * @ORM\ManyToOne(targetEntity="SaasFeeBundle\Entity\Stop", inversedBy="lines")
     * @ORM\JoinColumn(name="stop_id", referencedColumnName="id")
     */
    private $stop;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="SaasFeeBundle\Entity\Line", inversedBy="stops")
     * @ORM\JoinColumn(name="line_id", referencedColumnName="id")
     */
    private $line;

    /**
     * @var int
     *
     * @ORM\Column(name="stopOrder", type="integer")
     */
    private $stopOrder;


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
     * Set stop
     *
     * @param \stdClass $stop
     *
     * @return LineStop
     */
    public function setStop($stop)
    {
        $this->stop = $stop;

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
     * Set line
     *
     * @param \stdClass $line
     *
     * @return LineStop
     */
    public function setLine($line)
    {
        $this->line = $line;

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
     * Set stopOrder
     *
     * @param integer $stopOrder
     *
     * @return LineStop
     */
    public function setStopOrder($stopOrder)
    {
        $this->stopOrder = $stopOrder;

        return $this;
    }

    /**
     * Get stopOrder
     *
     * @return int
     */
    public function getStopOrder()
    {
        return $this->stopOrder;
    }
}

