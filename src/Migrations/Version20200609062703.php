<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200609062703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bnr_banner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, url VARCHAR(100) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, inserted_date DATETIME NOT NULL, clicked_count INT NOT NULL, order_num INT NOT NULL, href_url VARCHAR(100) NOT NULL, playtime INT NOT NULL, status INT NOT NULL, approved_at DATETIME NOT NULL, show_mode INT NOT NULL, arrearage INT NOT NULL, comment VARCHAR(255) NOT NULL, condition0 VARCHAR(100) NOT NULL, contact_email VARCHAR(100) NOT NULL, contact_name VARCHAR(100) NOT NULL, contact_phone VARCHAR(100) NOT NULL, paid INT NOT NULL, pay_mode VARCHAR(100) NOT NULL, sale INT NOT NULL, price INT NOT NULL, day INT NOT NULL, payment INT NOT NULL, dialog LONGBLOB NOT NULL, dlg_width INT NOT NULL, dlg_height INT NOT NULL, canvas_url VARCHAR(100) NOT NULL, is_new INT NOT NULL, video_url VARCHAR(100) NOT NULL, default_img VARCHAR(100) NOT NULL, display_time VARCHAR(100) NOT NULL, swiffy_body VARCHAR(100) NOT NULL, self_tab INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE bnr_banner');
    }
}
