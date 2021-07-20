<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720111021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание таблиц для сущности Продукта, Категории Продукта, Подкатегории Продукта, Изображения Продукта';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE images (id INT NOT NULL, product_id INT NOT NULL, filename VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE products (id INT NOT NULL, subcategory_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price NUMERIC(12, 2) NOT NULL, discount_price NUMERIC(12, 2) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE subcategories (id INT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_IMAGE_PRODUCT FOREIGN KEY (product_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_PRODUCT_SUBCATEGORY FOREIGN KEY (subcategory_id) REFERENCES subcategories (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subcategories ADD CONSTRAINT FK_SUBCATEGORY_CATEGORY FOREIGN KEY (category_id) REFERENCES categories (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subcategories DROP CONSTRAINT FK_SUBCATEGORY_CATEGORY');
        $this->addSql('ALTER TABLE images DROP CONSTRAINT FK_IMAGE_PRODUCT');
        $this->addSql('ALTER TABLE products DROP CONSTRAINT FK_PRODUCT_SUBCATEGORY');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE subcategories');
    }
}
