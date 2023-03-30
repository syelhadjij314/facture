<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330185442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture ADD lignes_facture VARCHAR(255) NOT NULL, DROP id, DROP PRIMARY KEY, ADD PRIMARY KEY (lignes_facture)');
        $this->addSql('ALTER TABLE ligne_facture ADD facture VARCHAR(255) NOT NULL, DROP id, DROP PRIMARY KEY, ADD PRIMARY KEY (facture)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture ADD id INT AUTO_INCREMENT NOT NULL, DROP lignes_facture, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE ligne_facture ADD id INT AUTO_INCREMENT NOT NULL, DROP facture, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
