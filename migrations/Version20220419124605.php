<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419124605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attribut_terms (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, is_custom TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2B8ECF294584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attribut_title (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, terms_id INT DEFAULT NULL, is_custom TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_881A88334584665A (product_id), INDEX IDX_881A883353742F27 (terms_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_attributs_terms (id INT AUTO_INCREMENT NOT NULL, attribut_terms_id INT NOT NULL, product_id INT NOT NULL, orders INT DEFAULT NULL, price INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2778AC8817BFDDD2 (attribut_terms_id), INDEX IDX_2778AC884584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attribut_terms ADD CONSTRAINT FK_2B8ECF294584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE attribut_title ADD CONSTRAINT FK_881A88334584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE attribut_title ADD CONSTRAINT FK_881A883353742F27 FOREIGN KEY (terms_id) REFERENCES attribut_terms (id)');
        $this->addSql('ALTER TABLE products_attributs_terms ADD CONSTRAINT FK_2778AC8817BFDDD2 FOREIGN KEY (attribut_terms_id) REFERENCES attribut_terms (id)');
        $this->addSql('ALTER TABLE products_attributs_terms ADD CONSTRAINT FK_2778AC884584665A FOREIGN KEY (product_id) REFERENCES products (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attribut_title DROP FOREIGN KEY FK_881A883353742F27');
        $this->addSql('ALTER TABLE products_attributs_terms DROP FOREIGN KEY FK_2778AC8817BFDDD2');
        $this->addSql('DROP TABLE attribut_terms');
        $this->addSql('DROP TABLE attribut_title');
        $this->addSql('DROP TABLE products_attributs_terms');
    }
}
