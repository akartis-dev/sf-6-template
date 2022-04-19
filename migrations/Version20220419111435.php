<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419111435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE products_categories (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_E8ACBE76727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_categories_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, meta_description VARCHAR(255) NOT NULL, meta_keyword VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, locale VARCHAR(5) NOT NULL, INDEX IDX_1ED44FAC2C2AC5D3 (translatable_id), UNIQUE INDEX products_categories_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_categories ADD CONSTRAINT FK_E8ACBE76727ACA70 FOREIGN KEY (parent_id) REFERENCES products_categories (id)');
        $this->addSql('ALTER TABLE products_categories_translation ADD CONSTRAINT FK_1ED44FAC2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES products_categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_categories DROP FOREIGN KEY FK_E8ACBE76727ACA70');
        $this->addSql('ALTER TABLE products_categories_translation DROP FOREIGN KEY FK_1ED44FAC2C2AC5D3');
        $this->addSql('DROP TABLE products_categories');
        $this->addSql('DROP TABLE products_categories_translation');
    }
}
