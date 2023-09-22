<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230922114838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tour (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, date DATE NOT NULL, appointment_time TIME NOT NULL, is_completed TINYINT(1) NOT NULL, INDEX IDX_6AD1F9696B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F9696B899279 FOREIGN KEY (patient_id) REFERENCES patients (id)');
        $this->addSql('ALTER TABLE patients CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F9696B899279');
        $this->addSql('DROP TABLE tour');
        $this->addSql('ALTER TABLE patients CHANGE email email VARCHAR(255) NOT NULL, CHANGE phone phone VARCHAR(255) NOT NULL');
    }
}
