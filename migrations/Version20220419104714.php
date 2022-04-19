<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419104714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products ADD pharmacode VARCHAR(255) NOT NULL, ADD gtin VARCHAR(255) NOT NULL, ADD price INT NOT NULL, ADD prevent_image_update TINYINT(1) NOT NULL, ADD has360 TINYINT(1) NOT NULL, ADD has_back_image TINYINT(1) NOT NULL, ADD has_info_patient TINYINT(1) NOT NULL, ADD has_info_pro TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE products_translation ADD meta_description VARCHAR(255) NOT NULL, ADD meta_keyword VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP pharmacode, DROP gtin, DROP price, DROP prevent_image_update, DROP has360, DROP has_back_image, DROP has_info_patient, DROP has_info_pro');
        $this->addSql('ALTER TABLE products_translation DROP meta_description, DROP meta_keyword');
    }
}
