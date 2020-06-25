<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625070233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE go_go_work_type CHANGE price price NUMERIC(10, 0) NOT NULL');
        $this->addSql('ALTER TABLE go_go_work CHANGE arrearge arrearge NUMERIC(10, 0) NOT NULL, CHANGE payment payment NUMERIC(10, 0) NOT NULL, CHANGE price price NUMERIC(10, 0) NOT NULL, CHANGE total total NUMERIC(10, 0) DEFAULT NULL, CHANGE noat noat NUMERIC(10, 0) DEFAULT NULL');
        $this->addSql('ALTER TABLE bnr_position CHANGE price price NUMERIC(10, 0) NOT NULL');
        $this->addSql('ALTER TABLE bnr_banner CHANGE arrearage arrearage NUMERIC(10, 0) NOT NULL, CHANGE paid paid NUMERIC(10, 0) NOT NULL, CHANGE sale sale NUMERIC(10, 0) NOT NULL, CHANGE price price NUMERIC(10, 0) NOT NULL, CHANGE payment payment NUMERIC(10, 0) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bnr_banner CHANGE arrearage arrearage INT NOT NULL, CHANGE paid paid INT NOT NULL, CHANGE sale sale INT NOT NULL, CHANGE price price INT NOT NULL, CHANGE payment payment INT NOT NULL');
        $this->addSql('ALTER TABLE bnr_position CHANGE price price INT NOT NULL');
        $this->addSql('ALTER TABLE go_go_work CHANGE arrearge arrearge INT NOT NULL, CHANGE payment payment INT NOT NULL, CHANGE total total INT DEFAULT NULL, CHANGE price price INT NOT NULL, CHANGE noat noat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE go_go_work_type CHANGE price price INT NOT NULL');
    }
}
