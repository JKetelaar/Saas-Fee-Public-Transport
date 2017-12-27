<?php

namespace SaasFee\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171227204657 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plan ADD line_stop_id INT DEFAULT NULL, DROP line, DROP stop');
        $this->addSql('ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7D8CA6875A FOREIGN KEY (line_stop_id) REFERENCES line_stop (id)');
        $this->addSql('CREATE INDEX IDX_DD5A5B7D8CA6875A ON plan (line_stop_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7D8CA6875A');
        $this->addSql('DROP INDEX IDX_DD5A5B7D8CA6875A ON plan');
        $this->addSql('ALTER TABLE plan ADD line LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:object)\', ADD stop LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:object)\', DROP line_stop_id');
    }
}
