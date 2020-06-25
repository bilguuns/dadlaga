<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625071349 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE go_go_work_type CHANGE price price NUMERIC(13, 2) NOT NULL');
        $this->addSql('ALTER TABLE go_go_work CHANGE arrearge arrearge NUMERIC(13, 2) NOT NULL, CHANGE payment payment NUMERIC(13, 2) NOT NULL, CHANGE price price NUMERIC(13, 2) NOT NULL, CHANGE sale sale NUMERIC(13, 2) NOT NULL, CHANGE noat noat NUMERIC(13, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE bnr_position CHANGE price price NUMERIC(13, 2) NOT NULL');
        $this->addSql('ALTER TABLE bnr_banner CHANGE arrearage arrearage NUMERIC(13, 2) NOT NULL, CHANGE paid paid NUMERIC(13, 2) NOT NULL, CHANGE sale sale NUMERIC(13, 2) NOT NULL, CHANGE price price NUMERIC(13, 2) NOT NULL, CHANGE payment payment NUMERIC(13, 2) NOT NULL, CHANGE noat noat NUMERIC(13, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bnr_banner CHANGE arrearage arrearage NUMERIC(10, 0) NOT NULL, CHANGE paid paid NUMERIC(10, 0) NOT NULL, CHANGE sale sale NUMERIC(10, 0) NOT NULL, CHANGE price price NUMERIC(10, 0) NOT NULL, CHANGE payment payment NUMERIC(10, 0) NOT NULL, CHANGE noat noat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bnr_position CHANGE price price NUMERIC(10, 0) NOT NULL');
        $this->addSql('ALTER TABLE go_go_work CHANGE arrearge arrearge NUMERIC(10, 0) NOT NULL, CHANGE payment payment NUMERIC(10, 0) NOT NULL, CHANGE sale sale VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE price price NUMERIC(10, 0) NOT NULL, CHANGE noat noat NUMERIC(10, 0) DEFAULT NULL');
        $this->addSql('ALTER TABLE go_go_work_type CHANGE price price NUMERIC(10, 0) NOT NULL');
    }
}
