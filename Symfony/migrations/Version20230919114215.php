<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230919114215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE patients (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, postcode VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE treatment (id INT AUTO_INCREMENT NOT NULL, treatment_type_id INT NOT NULL, patient_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_98013C31BD8A4E5F (treatment_type_id), INDEX IDX_98013C316B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE treatment_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE treatment ADD CONSTRAINT FK_98013C31BD8A4E5F FOREIGN KEY (treatment_type_id) REFERENCES treatment_type (id)');
        $this->addSql('ALTER TABLE treatment ADD CONSTRAINT FK_98013C316B899279 FOREIGN KEY (patient_id) REFERENCES patients (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE treatment DROP FOREIGN KEY FK_98013C31BD8A4E5F');
        $this->addSql('ALTER TABLE treatment DROP FOREIGN KEY FK_98013C316B899279');
        $this->addSql('DROP TABLE patients');
        $this->addSql('DROP TABLE treatment');
        $this->addSql('DROP TABLE treatment_type');
    }
}
