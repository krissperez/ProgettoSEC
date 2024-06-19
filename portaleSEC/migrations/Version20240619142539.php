<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240619142539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cap (id INT AUTO_INCREMENT NOT NULL, id_provincia_id INT NOT NULL, comune VARCHAR(255) NOT NULL, INDEX IDX_993387B16DB054DD (id_provincia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cap ADD CONSTRAINT FK_993387B16DB054DD FOREIGN KEY (id_provincia_id) REFERENCES province (id)');
        $this->addSql('DROP TABLE utenti');
        $this->addSql('ALTER TABLE agenti ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE province ADD deleted_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utenti (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(1000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cap DROP FOREIGN KEY FK_993387B16DB054DD');
        $this->addSql('DROP TABLE cap');
        $this->addSql('ALTER TABLE agenti DROP deleted_at');
        $this->addSql('ALTER TABLE province DROP deleted_at');
    }
}
