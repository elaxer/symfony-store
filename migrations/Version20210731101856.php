<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210731101856 extends AbstractMigration
{
    public function isTransactional(): bool
    {
        return false;
    }

    public function getDescription(): string
    {
        return 'Неблокирующие создания индексов для таблиц order_products и orders';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE INDEX CONCURRENTLY order_products__order_id__index ON order_products (order_id)');
        $this->addSql('CREATE INDEX CONCURRENTLY order_products__product_id__index ON order_products (product_id)');
        $this->addSql('CREATE INDEX CONCURRENTLY orders__credential_id__index ON orders (credential_id)');
        $this->addSql('CREATE UNIQUE INDEX CONCURRENTLY UNIQ_E52FFDEE2558A7A5 ON orders (credential_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX CONCURRENTLY order_products__order_id__index');
        $this->addSql('DROP INDEX CONCURRENTLY order_products__product_id__index');
        $this->addSql('DROP INDEX CONCURRENTLY orders__credential_id__index');
        $this->addSql('DROP INDEX CONCURRENTLY UNIQ_E52FFDEE2558A7A5');
    }
}
