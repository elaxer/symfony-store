<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210731101839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создает таблицы order_credentials, order_products, orders';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE order_credentials (id INT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(12) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE order_products (id INT NOT NULL, order_id INT NOT NULL, product_id INT NOT NULL, quantity INT NOT NULL, price NUMERIC(12, 2) NOT NULL, create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE orders (id INT NOT NULL, credential_id INT DEFAULT NULL, is_pickup BOOLEAN NOT NULL, comment TEXT NOT NULL, create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE order_products ADD CONSTRAINT FK_ORDER_PRODUCTS_ORDER FOREIGN KEY (order_id) REFERENCES orders (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_products ADD CONSTRAINT FK_ORDER_PRODUCTS_PRODUCT FOREIGN KEY (product_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_ORDER_ORDER_CREDENTIAL FOREIGN KEY (credential_id) REFERENCES order_credentials (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders DROP CONSTRAINT FK_ORDER_ORDER_CREDENTIAL');
        $this->addSql('ALTER TABLE order_products DROP CONSTRAINT FK_ORDER_PRODUCTS_ORDER');
        $this->addSql('ALTER TABLE order_products DROP CONSTRAINT FK_ORDER_PRODUCTS_PRODUCT');
        $this->addSql('DROP TABLE order_credentials');
        $this->addSql('DROP TABLE order_products');
        $this->addSql('DROP TABLE orders');
    }
}
