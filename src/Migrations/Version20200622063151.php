<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200622063151 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE go_go_work DROP INDEX UNIQ_A097F802296135A7, ADD INDEX IDX_A097F802296135A7 (responded_by_id)');
        $this->addSql('ALTER TABLE go_go_work DROP INDEX UNIQ_A097F802979B1AD6, ADD INDEX IDX_A097F802979B1AD6 (company_id)');
        $this->addSql('ALTER TABLE go_go_work DROP INDEX UNIQ_A097F802A76ED395, ADD INDEX IDX_A097F802A76ED395 (user_id)');
        $this->addSql('ALTER TABLE go_go_work DROP INDEX UNIQ_A097F802C54C8C93, ADD INDEX IDX_A097F802C54C8C93 (type_id)');
        $this->addSql('ALTER TABLE go_go_work DROP contact_name');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE go_go_work DROP INDEX IDX_A097F802C54C8C93, ADD UNIQUE INDEX UNIQ_A097F802C54C8C93 (type_id)');
        $this->addSql('ALTER TABLE go_go_work DROP INDEX IDX_A097F802979B1AD6, ADD UNIQUE INDEX UNIQ_A097F802979B1AD6 (company_id)');
        $this->addSql('ALTER TABLE go_go_work DROP INDEX IDX_A097F802A76ED395, ADD UNIQUE INDEX UNIQ_A097F802A76ED395 (user_id)');
        $this->addSql('ALTER TABLE go_go_work DROP INDEX IDX_A097F802296135A7, ADD UNIQUE INDEX UNIQ_A097F802296135A7 (responded_by_id)');
        $this->addSql('ALTER TABLE go_go_work ADD contact_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
