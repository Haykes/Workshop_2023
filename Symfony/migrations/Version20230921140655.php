<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230921140655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patients CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE social_security_number social_security_number INT DEFAULT NULL, CHANGE referring_doctor referring_doctor VARCHAR(255) DEFAULT NULL, CHANGE pharmacy pharmacy VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patients CHANGE email email VARCHAR(255) NOT NULL, CHANGE phone phone VARCHAR(255) NOT NULL, CHANGE social_security_number social_security_number INT NOT NULL, CHANGE referring_doctor referring_doctor VARCHAR(255) NOT NULL, CHANGE pharmacy pharmacy VARCHAR(255) NOT NULL');
    }
}
