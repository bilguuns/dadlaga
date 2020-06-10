<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610014106 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bnr_banner DROP FOREIGN KEY FK_478EF0FA979B1AD6');
        $this->addSql('DROP INDEX IDX_478EF0FA979B1AD6 ON bnr_banner');
        $this->addSql('ALTER TABLE bnr_banner DROP company_id');
        $this->addSql('ALTER TABLE bnr_company DROP FOREIGN KEY FK_2C9176DE684EC833');
        $this->addSql('DROP INDEX IDX_2C9176DE684EC833 ON bnr_company');
        $this->addSql('ALTER TABLE bnr_company DROP banner_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bnr_banner ADD company_id INT NOT NULL');
        $this->addSql('ALTER TABLE bnr_banner ADD CONSTRAINT FK_478EF0FA979B1AD6 FOREIGN KEY (company_id) REFERENCES bnr_company (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_478EF0FA979B1AD6 ON bnr_banner (company_id)');
        $this->addSql('ALTER TABLE bnr_company ADD banner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bnr_company ADD CONSTRAINT FK_2C9176DE684EC833 FOREIGN KEY (banner_id) REFERENCES bnr_banner (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2C9176DE684EC833 ON bnr_company (banner_id)');
    }
}
