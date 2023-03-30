<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330185147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_facture ADD facture_id INT NOT NULL, ADD description VARCHAR(255) NOT NULL, ADD quantite INT NOT NULL, ADD montant DOUBLE PRECISION NOT NULL, ADD montant_tva DOUBLE PRECISION NOT NULL, ADD total_tva DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_facture DROP facture_id, DROP description, DROP quantite, DROP montant, DROP montant_tva, DROP total_tva');
    }
}
