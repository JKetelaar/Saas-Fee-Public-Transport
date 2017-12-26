<?php

namespace SaasFee\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171226224406 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE line_stop (id INT AUTO_INCREMENT NOT NULL, stop_id INT DEFAULT NULL, line_id INT DEFAULT NULL, stopOrder INT NOT NULL, INDEX IDX_321BE56F3902063D (stop_id), INDEX IDX_321BE56F4D7B7542 (line_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, line LONGTEXT NOT NULL COMMENT \'(DC2Type:object)\', stop LONGTEXT NOT NULL COMMENT \'(DC2Type:object)\', time TIME NOT NULL, dayType VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE line_stop ADD CONSTRAINT FK_321BE56F3902063D FOREIGN KEY (stop_id) REFERENCES stop (id)');
        $this->addSql('ALTER TABLE line_stop ADD CONSTRAINT FK_321BE56F4D7B7542 FOREIGN KEY (line_id) REFERENCES line (id)');
        $this->addSql('DROP TABLE stop_line');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stop_line (stop_id INT NOT NULL, line_id INT NOT NULL, INDEX IDX_3BF276E93902063D (stop_id), INDEX IDX_3BF276E94D7B7542 (line_id), PRIMARY KEY(stop_id, line_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stop_line ADD CONSTRAINT FK_3BF276E93902063D FOREIGN KEY (stop_id) REFERENCES stop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stop_line ADD CONSTRAINT FK_3BF276E94D7B7542 FOREIGN KEY (line_id) REFERENCES line (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE line_stop');
        $this->addSql('DROP TABLE plan');
    }
}
