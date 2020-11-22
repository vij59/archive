<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201122081146 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE snapshot (id INT AUTO_INCREMENT NOT NULL, firm_id INT NOT NULL, name VARCHAR(255) NOT NULL, siren BIGINT NOT NULL, immatriculation_city VARCHAR(255) NOT NULL, immatriculation_date VARCHAR(255) NOT NULL, capital BIGINT NOT NULL, legal_form VARCHAR(255) NOT NULL, INDEX IDX_2C4D153589AF7860 (firm_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE snapshot_address (snapshot_id INT NOT NULL, address_id INT NOT NULL, INDEX IDX_363ABB3B7B39395E (snapshot_id), INDEX IDX_363ABB3BF5B7AF75 (address_id), PRIMARY KEY(snapshot_id, address_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE snapshot ADD CONSTRAINT FK_2C4D153589AF7860 FOREIGN KEY (firm_id) REFERENCES firm (id)');
        $this->addSql('ALTER TABLE snapshot_address ADD CONSTRAINT FK_363ABB3B7B39395E FOREIGN KEY (snapshot_id) REFERENCES snapshot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE snapshot_address ADD CONSTRAINT FK_363ABB3BF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE snapshot_address DROP FOREIGN KEY FK_363ABB3B7B39395E');
        $this->addSql('DROP TABLE snapshot');
        $this->addSql('DROP TABLE snapshot_address');
    }
}
