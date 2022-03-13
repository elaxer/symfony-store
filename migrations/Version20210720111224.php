<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210720111224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание индексов для таблиц Продукта, Категории, Подкатегории, Изображений';
    }

    public function isTransactional(): bool
    {
        return false;
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE INDEX CONCURRENTLY categories__id__index ON categories (id)');
        $this->addSql('CREATE INDEX CONCURRENTLY images__id__index ON images (id)');
        $this->addSql('CREATE INDEX CONCURRENTLY images__product_id__index ON images (product_id)');
        $this->addSql('CREATE INDEX CONCURRENTLY products__id__index ON products (id)');
        $this->addSql('CREATE INDEX CONCURRENTLY products__subcategory_id__index ON products (subcategory_id)');
        $this->addSql('CREATE INDEX CONCURRENTLY subcategories__id__index ON subcategories (id)');
        $this->addSql('CREATE INDEX CONCURRENTLY subcategories__category_id__index ON subcategories (category_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX CONCURRENTLY categories__id__index');
        $this->addSql('DROP INDEX CONCURRENTLY images__id__index');
        $this->addSql('DROP INDEX CONCURRENTLY images__product_id__index');
        $this->addSql('DROP INDEX CONCURRENTLY products__id__index');
        $this->addSql('DROP INDEX CONCURRENTLY products__subcategory_id__index');
        $this->addSql('DROP INDEX CONCURRENTLY subcategories__id__index');
        $this->addSql('DROP INDEX CONCURRENTLY subcategories__category_id__index');
    }
}
