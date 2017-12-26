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
        $manager = $doctrine->getManager();

        foreach ($this->getStops() as $stop) {
            $manager->persist($stop);
        }

        $manager->flush();
    }

    /**
     * @return Stop[]
     */
    public function getStops(): array
    {
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
            ],
            [
                'name' => 'Central',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Alfa',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Felsenegg',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Sunmatte',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Grossus Moos',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Kantonsstrasse',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Post',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Alpin Express',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Alphitta',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Etoile',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Dorfplats',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'All In',
                'latitude' => 0,
                'longitude' => 0,
            ],
            [
                'name' => 'Atlantic',
                'latitude' => 0,
                'longitude' => 0,
            ],
        ];
        $stopObjects = [];

        foreach ($stops as $item) {
            $stop = new Stop();
            $stop->setName($item['name']);
            $stop->setLatitude($item['latitude']);
            $stop->setLongitude($item['longitude']);

            $stopObjects[] = $stop;
        }

        return $stopObjects;
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $doctrine = $this->container->get('doctrine');
        $manager = $doctrine->getManager();

        foreach ($this->getStops() as $stop) {
            $manager->remove($stop);
        }

        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
