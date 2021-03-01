<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210301070835 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE akseswa (id INT AUTO_INCREMENT NOT NULL, moun_id INT DEFAULT NULL, kategory_akseswa_id INT NOT NULL, non VARCHAR(30) NOT NULL, kantite INT NOT NULL, UNIQUE INDEX UNIQ_6C68926EFD64BC79 (moun_id), INDEX IDX_6C68926EBA96F7F (kategory_akseswa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity10 (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity11 (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity11_entity15 (entity11_id INT NOT NULL, entity15_id INT NOT NULL, INDEX IDX_91DCC4B69E1D2CFD (entity11_id), INDEX IDX_91DCC4B6117FBBAA (entity15_id), PRIMARY KEY(entity11_id, entity15_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity12 (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity13 (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity14 (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity15 (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE imaj (id INT AUTO_INCREMENT NOT NULL, moun_id INT DEFAULT NULL, source VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F6E4ED465F8A7F73 (source), INDEX IDX_F6E4ED46FD64BC79 (moun_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kategory_akseswa (id INT AUTO_INCREMENT NOT NULL, non VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kay (id INT AUTO_INCREMENT NOT NULL, moun_id INT DEFAULT NULL, direksyon VARCHAR(50) NOT NULL, kod VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_EEFC6EAD13792FFA (kod), INDEX IDX_EEFC6EADFD64BC79 (moun_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moun (id INT AUTO_INCREMENT NOT NULL, manman_id INT DEFAULT NULL, user_id INT DEFAULT NULL, sexe_id INT NOT NULL, siyati VARCHAR(50) NOT NULL, laj INT NOT NULL, INDEX IDX_53C1BD33DE2C3BAB (manman_id), INDEX IDX_53C1BD33A76ED395 (user_id), INDEX IDX_53C1BD33448F3B3C (sexe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moun_nasyonalite (moun_id INT NOT NULL, nasyonalite_id INT NOT NULL, INDEX IDX_F3A9F67FFD64BC79 (moun_id), INDEX IDX_F3A9F67FC1681F36 (nasyonalite_id), PRIMARY KEY(moun_id, nasyonalite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nasyonalite (id INT AUTO_INCREMENT NOT NULL, non VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sexe (id INT AUTO_INCREMENT NOT NULL, sexe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE simpleForm (id INT AUTO_INCREMENT NOT NULL, non VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, age INT NOT NULL, drinks TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testUniqueAndNullable (id INT AUTO_INCREMENT NOT NULL, entity13_id INT DEFAULT NULL, column2 TIME DEFAULT NULL, column3 TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_D1172611DA128127 (column3), INDEX IDX_D11726113414E476 (entity13_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(60) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE akseswa ADD CONSTRAINT FK_6C68926EFD64BC79 FOREIGN KEY (moun_id) REFERENCES moun (id)');
        $this->addSql('ALTER TABLE akseswa ADD CONSTRAINT FK_6C68926EBA96F7F FOREIGN KEY (kategory_akseswa_id) REFERENCES kategory_akseswa (id)');
        $this->addSql('ALTER TABLE entity11_entity15 ADD CONSTRAINT FK_91DCC4B69E1D2CFD FOREIGN KEY (entity11_id) REFERENCES entity11 (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entity11_entity15 ADD CONSTRAINT FK_91DCC4B6117FBBAA FOREIGN KEY (entity15_id) REFERENCES entity15 (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE imaj ADD CONSTRAINT FK_F6E4ED46FD64BC79 FOREIGN KEY (moun_id) REFERENCES moun (id)');
        $this->addSql('ALTER TABLE kay ADD CONSTRAINT FK_EEFC6EADFD64BC79 FOREIGN KEY (moun_id) REFERENCES moun (id)');
        $this->addSql('ALTER TABLE moun ADD CONSTRAINT FK_53C1BD33DE2C3BAB FOREIGN KEY (manman_id) REFERENCES moun (id)');
        $this->addSql('ALTER TABLE moun ADD CONSTRAINT FK_53C1BD33A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE moun ADD CONSTRAINT FK_53C1BD33448F3B3C FOREIGN KEY (sexe_id) REFERENCES sexe (id)');
        $this->addSql('ALTER TABLE moun_nasyonalite ADD CONSTRAINT FK_F3A9F67FFD64BC79 FOREIGN KEY (moun_id) REFERENCES moun (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE moun_nasyonalite ADD CONSTRAINT FK_F3A9F67FC1681F36 FOREIGN KEY (nasyonalite_id) REFERENCES nasyonalite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE testUniqueAndNullable ADD CONSTRAINT FK_D11726113414E476 FOREIGN KEY (entity13_id) REFERENCES entity13 (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entity11_entity15 DROP FOREIGN KEY FK_91DCC4B69E1D2CFD');
        $this->addSql('ALTER TABLE testUniqueAndNullable DROP FOREIGN KEY FK_D11726113414E476');
        $this->addSql('ALTER TABLE entity11_entity15 DROP FOREIGN KEY FK_91DCC4B6117FBBAA');
        $this->addSql('ALTER TABLE akseswa DROP FOREIGN KEY FK_6C68926EBA96F7F');
        $this->addSql('ALTER TABLE akseswa DROP FOREIGN KEY FK_6C68926EFD64BC79');
        $this->addSql('ALTER TABLE imaj DROP FOREIGN KEY FK_F6E4ED46FD64BC79');
        $this->addSql('ALTER TABLE kay DROP FOREIGN KEY FK_EEFC6EADFD64BC79');
        $this->addSql('ALTER TABLE moun DROP FOREIGN KEY FK_53C1BD33DE2C3BAB');
        $this->addSql('ALTER TABLE moun_nasyonalite DROP FOREIGN KEY FK_F3A9F67FFD64BC79');
        $this->addSql('ALTER TABLE moun_nasyonalite DROP FOREIGN KEY FK_F3A9F67FC1681F36');
        $this->addSql('ALTER TABLE moun DROP FOREIGN KEY FK_53C1BD33448F3B3C');
        $this->addSql('ALTER TABLE moun DROP FOREIGN KEY FK_53C1BD33A76ED395');
        $this->addSql('DROP TABLE akseswa');
        $this->addSql('DROP TABLE entity10');
        $this->addSql('DROP TABLE entity11');
        $this->addSql('DROP TABLE entity11_entity15');
        $this->addSql('DROP TABLE entity12');
        $this->addSql('DROP TABLE entity13');
        $this->addSql('DROP TABLE entity14');
        $this->addSql('DROP TABLE entity15');
        $this->addSql('DROP TABLE imaj');
        $this->addSql('DROP TABLE kategory_akseswa');
        $this->addSql('DROP TABLE kay');
        $this->addSql('DROP TABLE moun');
        $this->addSql('DROP TABLE moun_nasyonalite');
        $this->addSql('DROP TABLE nasyonalite');
        $this->addSql('DROP TABLE sexe');
        $this->addSql('DROP TABLE simpleForm');
        $this->addSql('DROP TABLE testUniqueAndNullable');
        $this->addSql('DROP TABLE user');
    }
}
