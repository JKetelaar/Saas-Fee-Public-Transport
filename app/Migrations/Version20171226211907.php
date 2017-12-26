<?php

namespace SaasFee\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use SaasFeeBundle\Entity\Line;
use SaasFeeBundle\Entity\Stop;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171226211907 extends AbstractMigration implements ContainerAwareInterface
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
        $manager  = $doctrine->getManager();

        $this->addLines();

        $manager->flush();
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

    private function addLines()
    {
        $this->addLine('Intersport', 1, ['Royal', 'Allalin', 'Central', 'Dorfplats']);
    }

    private function addLine(string $name, int $number, array $stopNames){
        $doctrine = $this->container->get('doctrine');
        $manager  = $doctrine->getManager();
        $repository = $manager->getRepository('SaasFeeBundle:Stop');

        $line = new Line();
        $line->setName($name);
        $line->setNumber($number);

        /** @var Stop[] $stops */
        $stops = $repository->searchForStops($stopNames);
        foreach ($stops as $stop){
            $stop->addLine($line);
            $manager->persist($stop);
        }

        $line->setStops($stops);
        $manager->persist($line);
    }
}
