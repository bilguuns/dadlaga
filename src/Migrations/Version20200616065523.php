<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200616065523 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bnr_banner DROP FOREIGN KEY FK_478EF0FA296135A7');
        $this->addSql('ALTER TABLE bnr_banner DROP FOREIGN KEY FK_478EF0FA2D234F6A');
        $this->addSql('ALTER TABLE bnr_banner DROP FOREIGN KEY FK_478EF0FA5C6EDA50');
        $this->addSql('ALTER TABLE bnr_banner DROP FOREIGN KEY FK_478EF0FADD842E46');
        $this->addSql('DROP INDEX UNIQ_478EF0FA296135A7 ON bnr_banner');
        $this->addSql('DROP INDEX UNIQ_478EF0FA2D234F6A ON bnr_banner');
        $this->addSql('DROP INDEX UNIQ_478EF0FA5C6EDA50 ON bnr_banner');
        $this->addSql('DROP INDEX UNIQ_478EF0FADD842E46 ON bnr_banner');
        $this->addSql('ALTER TABLE bnr_banner DROP position_id, DROP inserted_by_id, DROP approved_by_id, DROP responded_by_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bnr_banner ADD position_id INT DEFAULT NULL, ADD inserted_by_id INT DEFAULT NULL, ADD approved_by_id INT DEFAULT NULL, ADD responded_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bnr_banner ADD CONSTRAINT FK_478EF0FA296135A7 FOREIGN KEY (responded_by_id) REFERENCES cms_operator (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE bnr_banner ADD CONSTRAINT FK_478EF0FA2D234F6A FOREIGN KEY (approved_by_id) REFERENCES cms_operator (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE bnr_banner ADD CONSTRAINT FK_478EF0FA5C6EDA50 FOREIGN KEY (inserted_by_id) REFERENCES cms_operator (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE bnr_banner ADD CONSTRAINT FK_478EF0FADD842E46 FOREIGN KEY (position_id) REFERENCES bnr_position (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_478EF0FA296135A7 ON bnr_banner (responded_by_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_478EF0FA2D234F6A ON bnr_banner (approved_by_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_478EF0FA5C6EDA50 ON bnr_banner (inserted_by_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_478EF0FADD842E46 ON bnr_banner (position_id)');
    }
}
