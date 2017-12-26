<?php

namespace SaasFee\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171226211831 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE line (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D114B4F696901F54 (number), UNIQUE INDEX UNIQ_D114B4F65E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stop_line (stop_id INT NOT NULL, line_id INT NOT NULL, INDEX IDX_3BF276E93902063D (stop_id), INDEX IDX_3BF276E94D7B7542 (line_id), PRIMARY KEY(stop_id, line_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stop_line ADD CONSTRAINT FK_3BF276E93902063D FOREIGN KEY (stop_id) REFERENCES stop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stop_line ADD CONSTRAINT FK_3BF276E94D7B7542 FOREIGN KEY (line_id) REFERENCES line (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stop_line DROP FOREIGN KEY FK_3BF276E94D7B7542');
        $this->addSql('DROP TABLE line');
        $this->addSql('DROP TABLE stop_line');
    }
}
