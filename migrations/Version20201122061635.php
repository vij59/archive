<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201122061635 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE firm (id INT AUTO_INCREMENT NOT NULL, legal_form_id INT NOT NULL, name VARCHAR(255) NOT NULL, siren BIGINT NOT NULL, immatriculation_city VARCHAR(255) NOT NULL, immatriculation_date DATETIME NOT NULL, capital BIGINT NOT NULL, INDEX IDX_560581FD98CD0513 (legal_form_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE firm_address (firm_id INT NOT NULL, address_id INT NOT NULL, INDEX IDX_D497C5F989AF7860 (firm_id), INDEX IDX_D497C5F9F5B7AF75 (address_id), PRIMARY KEY(firm_id, address_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE firm ADD CONSTRAINT FK_560581FD98CD0513 FOREIGN KEY (legal_form_id) REFERENCES legal_form (id)');
        $this->addSql('ALTER TABLE firm_address ADD CONSTRAINT FK_D497C5F989AF7860 FOREIGN KEY (firm_id) REFERENCES firm (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE firm_address ADD CONSTRAINT FK_D497C5F9F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE firm_address DROP FOREIGN KEY FK_D497C5F989AF7860');
        $this->addSql('DROP TABLE firm');
        $this->addSql('DROP TABLE firm_address');
    }
}
