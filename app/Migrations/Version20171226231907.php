<?php

namespace SaasFee\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use SaasFeeBundle\Entity\Line;
use SaasFeeBundle\Entity\LineStop;
use SaasFeeBundle\Entity\Stop;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171226231907 extends AbstractMigration implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $doctrine = $this->container->get('doctrine');
        $manager = $doctrine->getManager();

        $this->addLines();

        $manager->flush();
    }

    private function addLines()
    {
        $this->addLine('Intersport', 1, ['Royal', 'Allalin', 'Central', 'Dorfplats', 'Gletscherbrücke']);

        $this->addLine(
            'Raiffeisen',
            2,
            ['Alfa', 'Felsenegg', 'Sunmatte', 'Grossus Moos', 'Royal', 'Allalin', 'Kantonsstrasse', 'Gletscherbrücke']
        );

        $this->addLine(
            'Allalino',
            3,
            ['Alphitta', 'Etoile', 'Royal', 'Allalin', 'Central', 'Dorfplats', 'Gletscherbrücke']
        );

        $this->addLine(
            'Energie-Bus',
            4,
            ['All In', 'Atlantic', 'Alphitta', 'Etoile', 'Royal', 'Allalin', 'Alpin Express', 'Gletscherbrücke']
        );
    }

    /**
     * @param string $name
     * @param int $number
     * @param string[] $stopNames
     */
    private function addLine(string $name, int $number, array $stopNames)
    {
        $doctrine = $this->container->get('doctrine');
        $manager = $doctrine->getManager();
        $repository = $manager->getRepository('SaasFeeBundle:Stop');

        $line = new Line();
        $line->setName($name);
        $line->setNumber($number);

        /**
         * @var LineStop[] $lineStops
         * @var Stop[] $stops
         */
        $lineStops = [];
        $stops = $repository->searchForStops($stopNames);

        foreach ($stops as $stop) {
            $lineStop = new LineStop();
            $lineStop->setLine($line);
            $lineStop->setStop($stop);
            for ($i = 0; $i < count($stopNames); $i++) {
                if ($stopNames[$i] == $stop->getName()) {
                    $lineStop->setStopOrder($i);
                    break;
                }
            }

            $manager->persist($lineStop);
            $lineStops[] = $lineStop;

            $stop->addLine($lineStop);
            $manager->persist($stop);
        }

        $line->setStops($lineStops);
        $manager->persist($line);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
