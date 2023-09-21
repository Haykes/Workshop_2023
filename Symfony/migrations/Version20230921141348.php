<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230921141348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE constant (id INT AUTO_INCREMENT NOT NULL, constant_type_id INT DEFAULT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_CB6AD5D8AAADD953 (constant_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE constant_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, datetime DATETIME NOT NULL, INDEX IDX_794381C66B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review_constant (review_id INT NOT NULL, constant_id INT NOT NULL, INDEX IDX_E8285CD33E2E969B (review_id), INDEX IDX_E8285CD3B4F3186F (constant_id), PRIMARY KEY(review_id, constant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE constant ADD CONSTRAINT FK_CB6AD5D8AAADD953 FOREIGN KEY (constant_type_id) REFERENCES constant_type (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C66B899279 FOREIGN KEY (patient_id) REFERENCES patients (id)');
        $this->addSql('ALTER TABLE review_constant ADD CONSTRAINT FK_E8285CD33E2E969B FOREIGN KEY (review_id) REFERENCES review (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review_constant ADD CONSTRAINT FK_E8285CD3B4F3186F FOREIGN KEY (constant_id) REFERENCES constant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE constant DROP FOREIGN KEY FK_CB6AD5D8AAADD953');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C66B899279');
        $this->addSql('ALTER TABLE review_constant DROP FOREIGN KEY FK_E8285CD33E2E969B');
        $this->addSql('ALTER TABLE review_constant DROP FOREIGN KEY FK_E8285CD3B4F3186F');
        $this->addSql('DROP TABLE constant');
        $this->addSql('DROP TABLE constant_type');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE review_constant');
    }
}
