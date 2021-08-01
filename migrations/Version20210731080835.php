<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210731080835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Добавляет к таблицам images, products поля created_at, updated_at';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE images ADD create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE images ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE products ADD create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE products ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE products DROP create_at');
        $this->addSql('ALTER TABLE products DROP updated_at');
        $this->addSql('ALTER TABLE images DROP create_at');
        $this->addSql('ALTER TABLE images DROP updated_at');
    }
}
