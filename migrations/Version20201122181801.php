<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201122181801 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE firm_address');
        $this->addSql('ALTER TABLE address ADD firm_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F8189AF7860 FOREIGN KEY (firm_id) REFERENCES firm (id)');
        $this->addSql('CREATE INDEX IDX_D4E6F8189AF7860 ON address (firm_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE firm_address (firm_id INT NOT NULL, address_id INT NOT NULL, INDEX IDX_D497C5F989AF7860 (firm_id), INDEX IDX_D497C5F9F5B7AF75 (address_id), PRIMARY KEY(firm_id, address_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE firm_address ADD CONSTRAINT FK_D497C5F989AF7860 FOREIGN KEY (firm_id) REFERENCES firm (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE firm_address ADD CONSTRAINT FK_D497C5F9F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F8189AF7860');
        $this->addSql('DROP INDEX IDX_D4E6F8189AF7860 ON address');
        $this->addSql('ALTER TABLE address DROP firm_id');
    }
}
