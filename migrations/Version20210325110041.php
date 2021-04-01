<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325110041 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_CFF65260A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, offres_id INT DEFAULT NULL, offer_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age INT NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, niveau_etude VARCHAR(255) NOT NULL, experience INT NOT NULL, INDEX IDX_B66FFE926C83CD9F (offres_id), INDEX IDX_B66FFE9253C674EE (offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demandeur (id INT AUTO_INCREMENT NOT NULL, relation_id INT DEFAULT NULL, ref VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_665DA6133256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprsymfony_new_my_project_name_full (id INT AUTO_INCREMENT NOT NULL, offre_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_E9FD9DDB4CC8505A (offre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE926C83CD9F FOREIGN KEY (offres_id) REFERENCES demandeur (id)');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE9253C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE demandeur ADD CONSTRAINT FK_665DA6133256915B FOREIGN KEY (relation_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE entreprsymfony_new_my_project_name_full ADD CONSTRAINT FK_E9FD9DDB4CC8505A FOREIGN KEY (offre_id) REFERENCES offer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE926C83CD9F');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE9253C674EE');
        $this->addSql('ALTER TABLE entreprsymfony_new_my_project_name_full DROP FOREIGN KEY FK_E9FD9DDB4CC8505A');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260A76ED395');
        $this->addSql('ALTER TABLE demandeur DROP FOREIGN KEY FK_665DA6133256915B');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE demandeur');
        $this->addSql('DROP TABLE entreprsymfony_new_my_project_name_full');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE user');
    }
}
