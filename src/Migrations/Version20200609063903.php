<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200609063903 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE go_go_work ADD type_id INT DEFAULT NULL, ADD company_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL, ADD responded_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE go_go_work ADD CONSTRAINT FK_A097F802C54C8C93 FOREIGN KEY (type_id) REFERENCES go_go_work_type (id)');
        $this->addSql('ALTER TABLE go_go_work ADD CONSTRAINT FK_A097F802979B1AD6 FOREIGN KEY (company_id) REFERENCES bnr_company (id)');
        $this->addSql('ALTER TABLE go_go_work ADD CONSTRAINT FK_A097F802A76ED395 FOREIGN KEY (user_id) REFERENCES cms_operator (id)');
        $this->addSql('ALTER TABLE go_go_work ADD CONSTRAINT FK_A097F802296135A7 FOREIGN KEY (responded_by_id) REFERENCES cms_operator (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A097F802C54C8C93 ON go_go_work (type_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A097F802979B1AD6 ON go_go_work (company_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A097F802A76ED395 ON go_go_work (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A097F802296135A7 ON go_go_work (responded_by_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE go_go_work DROP FOREIGN KEY FK_A097F802C54C8C93');
        $this->addSql('ALTER TABLE go_go_work DROP FOREIGN KEY FK_A097F802979B1AD6');
        $this->addSql('ALTER TABLE go_go_work DROP FOREIGN KEY FK_A097F802A76ED395');
        $this->addSql('ALTER TABLE go_go_work DROP FOREIGN KEY FK_A097F802296135A7');
        $this->addSql('DROP INDEX UNIQ_A097F802C54C8C93 ON go_go_work');
        $this->addSql('DROP INDEX UNIQ_A097F802979B1AD6 ON go_go_work');
        $this->addSql('DROP INDEX UNIQ_A097F802A76ED395 ON go_go_work');
        $this->addSql('DROP INDEX UNIQ_A097F802296135A7 ON go_go_work');
        $this->addSql('ALTER TABLE go_go_work DROP type_id, DROP company_id, DROP user_id, DROP responded_by_id');
    }
}
