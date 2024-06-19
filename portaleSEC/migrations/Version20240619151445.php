<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240619151445 extends AbstractMigration
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
        $this->addSql('ALTER TABLE agenti_cap CHANGE id_agente id_agente INT NOT NULL, CHANGE id_cap id_cap INT NOT NULL');
        $this->addSql('ALTER TABLE clienti ADD id_agente_id INT NOT NULL, DROP id_agente, CHANGE partita_iva partita_iva VARCHAR(11) DEFAULT NULL, CHANGE settore_attivita settore_attivita VARCHAR(255) NOT NULL, CHANGE data_acquisizione data_acquisizione DATETIME NOT NULL');
        $this->addSql('ALTER TABLE clienti ADD CONSTRAINT FK_FDAAD70E85D0C4B8 FOREIGN KEY (id_agente_id) REFERENCES agenti (id)');
        $this->addSql('CREATE INDEX IDX_FDAAD70E85D0C4B8 ON clienti (id_agente_id)');
        $this->addSql('ALTER TABLE utenti CHANGE email email VARCHAR(255) NOT NULL, CHANGE username username VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cap DROP FOREIGN KEY FK_993387B16DB054DD');
        $this->addSql('DROP TABLE cap');
        $this->addSql('ALTER TABLE agenti_cap CHANGE id_agente id_agente INT DEFAULT NULL, CHANGE id_cap id_cap INT DEFAULT NULL');
        $this->addSql('ALTER TABLE clienti DROP FOREIGN KEY FK_FDAAD70E85D0C4B8');
        $this->addSql('DROP INDEX IDX_FDAAD70E85D0C4B8 ON clienti');
        $this->addSql('ALTER TABLE clienti ADD id_agente INT DEFAULT NULL, DROP id_agente_id, CHANGE partita_iva partita_iva VARCHAR(255) DEFAULT NULL, CHANGE settore_attivita settore_attivita VARCHAR(50) DEFAULT NULL, CHANGE data_acquisizione data_acquisizione DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE utenti CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL');
    }
}
