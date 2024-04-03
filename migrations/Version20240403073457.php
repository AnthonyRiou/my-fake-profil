<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240403073457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, ville_id_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, profession VARCHAR(255) NOT NULL, intro VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_497B315EF0C17188 (ville_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs_groupes (utilisateurs_id INT NOT NULL, groupes_id INT NOT NULL, INDEX IDX_59950F8C1E969C5 (utilisateurs_id), INDEX IDX_59950F8C305371B (groupes_id), PRIMARY KEY(utilisateurs_id, groupes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE villes (id INT AUTO_INCREMENT NOT NULL, pays_id_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_19209FD874FAEB6C (pays_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315EF0C17188 FOREIGN KEY (ville_id_id) REFERENCES villes (id)');
        $this->addSql('ALTER TABLE utilisateurs_groupes ADD CONSTRAINT FK_59950F8C1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateurs_groupes ADD CONSTRAINT FK_59950F8C305371B FOREIGN KEY (groupes_id) REFERENCES groupes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE villes ADD CONSTRAINT FK_19209FD874FAEB6C FOREIGN KEY (pays_id_id) REFERENCES pays (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315EF0C17188');
        $this->addSql('ALTER TABLE utilisateurs_groupes DROP FOREIGN KEY FK_59950F8C1E969C5');
        $this->addSql('ALTER TABLE utilisateurs_groupes DROP FOREIGN KEY FK_59950F8C305371B');
        $this->addSql('ALTER TABLE villes DROP FOREIGN KEY FK_19209FD874FAEB6C');
        $this->addSql('DROP TABLE groupes');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE utilisateurs_groupes');
        $this->addSql('DROP TABLE villes');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
