<?php

namespace SaasFee\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use SaasFeeBundle\Entity\Stop;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171226204548 extends AbstractMigration implements ContainerAwareInterface
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

        foreach ($this->getStops() as $stop){
            $manager->persist($stop);
        }

        $manager->flush();
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $doctrine = $this->container->get('doctrine');
        $manager  = $doctrine->getManager();

        foreach ($this->getStops() as $stop){
            $manager->remove($stop);
        }

        $manager->flush();
    }

    /**
     * @return Stop[]
     */
    public function getStops(): array {
        $stops = [
            [
                'name' => 'Royal',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Allalin',
                'latitude' => 0,
                'longitude' => 0,
            ]
        ];

        foreach ($stops as $item){
            $stop = new Stop();
            $stop->setName($item['name']);
            $stop->setLatitude($item['latitude']);
            $stop->setLongitude($item['longitude']);

            $stops[] = $stop;
        }

        return $stops;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
