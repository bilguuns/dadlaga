<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610002813 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bnr_company ADD banner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bnr_company ADD CONSTRAINT FK_2C9176DE684EC833 FOREIGN KEY (banner_id) REFERENCES bnr_banner (id)');
        $this->addSql('CREATE INDEX IDX_2C9176DE684EC833 ON bnr_company (banner_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bnr_company DROP FOREIGN KEY FK_2C9176DE684EC833');
        $this->addSql('DROP INDEX IDX_2C9176DE684EC833 ON bnr_company');
        $this->addSql('ALTER TABLE bnr_company DROP banner_id');
    }
}
