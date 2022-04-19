<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419112003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE products_categories_products (products_categories_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_A7A34105931BBDCF (products_categories_id), INDEX IDX_A7A341056C8A81A9 (products_id), PRIMARY KEY(products_categories_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_categories_products ADD CONSTRAINT FK_A7A34105931BBDCF FOREIGN KEY (products_categories_id) REFERENCES products_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_categories_products ADD CONSTRAINT FK_A7A341056C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE products_categories_products');
    }
}
