<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210905131104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE games (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, js_code LONGBLOB NOT NULL, html_code LONGBLOB NOT NULL, css_code LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, classroom_id INT NOT NULL, class_year_id INT NOT NULL, subject_id INT NOT NULL, date DATETIME NOT NULL, is_relevant TINYINT(1) NOT NULL, INDEX IDX_27BA704B6278D5A8 (classroom_id), INDEX IDX_27BA704B85B4995B (class_year_id), INDEX IDX_27BA704B23EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, classyear_id INT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, caretaker_name VARCHAR(255) NOT NULL, caretaker_phone_number VARCHAR(255) NOT NULL, caretaker_email VARCHAR(255) NOT NULL, is_male TINYINT(1) NOT NULL, birthday DATETIME NOT NULL, INDEX IDX_B723AF3376AE5B9C (classyear_id), UNIQUE INDEX UNIQ_B723AF33A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, classyear_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_FBCE3E7A76AE5B9C (classyear_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject_classroom (subject_id INT NOT NULL, classroom_id INT NOT NULL, INDEX IDX_A2CA4B723EDC87 (subject_id), INDEX IDX_A2CA4B76278D5A8 (classroom_id), PRIMARY KEY(subject_id, classroom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, is_male TINYINT(1) NOT NULL, birthday DATETIME NOT NULL, UNIQUE INDEX UNIQ_B0F6A6D5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher_subject (teacher_id INT NOT NULL, subject_id INT NOT NULL, INDEX IDX_360CB33B41807E1D (teacher_id), INDEX IDX_360CB33B23EDC87 (subject_id), PRIMARY KEY(teacher_id, subject_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, is_admin TINYINT(1) NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B6278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B85B4995B FOREIGN KEY (class_year_id) REFERENCES class_year (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B23EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3376AE5B9C FOREIGN KEY (classyear_id) REFERENCES class_year (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE subject ADD CONSTRAINT FK_FBCE3E7A76AE5B9C FOREIGN KEY (classyear_id) REFERENCES class_year (id)');
        $this->addSql('ALTER TABLE subject_classroom ADD CONSTRAINT FK_A2CA4B723EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subject_classroom ADD CONSTRAINT FK_A2CA4B76278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE teacher_subject ADD CONSTRAINT FK_360CB33B41807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teacher_subject ADD CONSTRAINT FK_360CB33B23EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B23EDC87');
        $this->addSql('ALTER TABLE subject_classroom DROP FOREIGN KEY FK_A2CA4B723EDC87');
        $this->addSql('ALTER TABLE teacher_subject DROP FOREIGN KEY FK_360CB33B23EDC87');
        $this->addSql('ALTER TABLE teacher_subject DROP FOREIGN KEY FK_360CB33B41807E1D');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33A76ED395');
        $this->addSql('ALTER TABLE teacher DROP FOREIGN KEY FK_B0F6A6D5A76ED395');
        $this->addSql('DROP TABLE games');
        $this->addSql('DROP TABLE history');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE subject_classroom');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE teacher_subject');
        $this->addSql('DROP TABLE user');
    }
}
