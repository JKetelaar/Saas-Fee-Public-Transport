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
     * @var Line
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
     * @return Stop
     */
    public function getStop(): Stop
    {
        return $this->stop;
    }

    /**
     * @param Stop $stop
     *
     * @return LineStop
     */
    public function setStop(Stop $stop): LineStop
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * @return Line
     */
    public function getLine(): Line
    {
        return $this->line;
    }

    /**
     * @param Line $line
     *
     * @return LineStop
     */
    public function setLine(Line $line): LineStop
    {
        $this->line = $line;

        return $this;
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

