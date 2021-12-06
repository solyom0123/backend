<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122133603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE games CHANGE js_code js_code LONGTEXT NOT NULL, CHANGE html_code html_code LONGTEXT NOT NULL, CHANGE css_code css_code LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE games CHANGE js_code js_code LONGBLOB NOT NULL, CHANGE html_code html_code LONGBLOB NOT NULL, CHANGE css_code css_code LONGBLOB NOT NULL');
    }
}
