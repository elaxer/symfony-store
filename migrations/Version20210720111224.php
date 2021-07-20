<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
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
        $this->addSql('CREATE INDEX categories__id__index ON categories (id)');
        $this->addSql('CREATE INDEX images__id__index ON images (id)');
        $this->addSql('CREATE INDEX images__product_id__index ON images (product_id)');
        $this->addSql('CREATE INDEX products__id__index ON products (id)');
        $this->addSql('CREATE INDEX products__subcategory_id__index ON products (subcategory_id)');
        $this->addSql('CREATE INDEX subcategories__id__index ON subcategories (id)');
        $this->addSql('CREATE INDEX subcategories__category_id__index ON subcategories (category_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX categories__id__index');
        $this->addSql('DROP INDEX images__id__index');
        $this->addSql('DROP INDEX images__product_id__index');
        $this->addSql('DROP INDEX products__id__index');
        $this->addSql('DROP INDEX products__subcategory_id__index');
        $this->addSql('DROP INDEX subcategories__id__index');
        $this->addSql('DROP INDEX subcategories__category_id__index');
    }
}
