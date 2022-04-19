<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419113602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE associated_products (id INT AUTO_INCREMENT NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE associated_products_products (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, associated_product_id INT NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2BAEF08A4584665A (product_id), INDEX IDX_2BAEF08AAE33471B (associated_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE associated_products_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, meta_description VARCHAR(255) NOT NULL, meta_keyword VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, locale VARCHAR(5) NOT NULL, INDEX IDX_77D2F0D92C2AC5D3 (translatable_id), UNIQUE INDEX associated_products_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE associated_products_products ADD CONSTRAINT FK_2BAEF08A4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE associated_products_products ADD CONSTRAINT FK_2BAEF08AAE33471B FOREIGN KEY (associated_product_id) REFERENCES associated_products (id)');
        $this->addSql('ALTER TABLE associated_products_translation ADD CONSTRAINT FK_77D2F0D92C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES associated_products (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE associated_products_products DROP FOREIGN KEY FK_2BAEF08AAE33471B');
        $this->addSql('ALTER TABLE associated_products_translation DROP FOREIGN KEY FK_77D2F0D92C2AC5D3');
        $this->addSql('DROP TABLE associated_products');
        $this->addSql('DROP TABLE associated_products_products');
        $this->addSql('DROP TABLE associated_products_translation');
    }
}
