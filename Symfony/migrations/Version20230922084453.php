<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230922084453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tour ADD patient_id INT DEFAULT NULL, ADD appointment_time TIME NOT NULL, ADD is_completed TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F9696B899279 FOREIGN KEY (patient_id) REFERENCES patients (id)');
        $this->addSql('CREATE INDEX IDX_6AD1F9696B899279 ON tour (patient_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F9696B899279');
        $this->addSql('DROP INDEX IDX_6AD1F9696B899279 ON tour');
        $this->addSql('ALTER TABLE tour DROP patient_id, DROP appointment_time, DROP is_completed');
    }
}
