<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920125320 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8442C414CE8 FOREIGN KEY (recurrence_id) REFERENCES recurrence (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8446B899279 FOREIGN KEY (patient_id) REFERENCES patients (id)');
        $this->addSql('ALTER TABLE patients ADD social_security_number INT NOT NULL, ADD referring_doctor VARCHAR(255) NOT NULL, ADD pharmacy VARCHAR(255) NOT NULL, ADD information VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE transmission ADD CONSTRAINT FK_7F87199FCD53EDB6 FOREIGN KEY (receiver_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transmission_image ADD CONSTRAINT FK_E1E618493DA5256D FOREIGN KEY (image_id) REFERENCES transmission (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F8442C414CE8');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F8446B899279');
        $this->addSql('ALTER TABLE transmission_image DROP FOREIGN KEY FK_E1E618493DA5256D');
        $this->addSql('ALTER TABLE patients DROP social_security_number, DROP referring_doctor, DROP pharmacy, DROP information');
        $this->addSql('ALTER TABLE transmission DROP FOREIGN KEY FK_7F87199FCD53EDB6');
    }
}
