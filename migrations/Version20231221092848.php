<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221092848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE match_group (id INT AUTO_INCREMENT NOT NULL, team1_id INT DEFAULT NULL, team2_id INT DEFAULT NULL, INDEX IDX_D3AA3B64E72BCFA4 (team1_id), INDEX IDX_D3AA3B64F59E604A (team2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE match_group ADD CONSTRAINT FK_D3AA3B64E72BCFA4 FOREIGN KEY (team1_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE match_group ADD CONSTRAINT FK_D3AA3B64F59E604A FOREIGN KEY (team2_id) REFERENCES teams (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE match_group DROP FOREIGN KEY FK_D3AA3B64E72BCFA4');
        $this->addSql('ALTER TABLE match_group DROP FOREIGN KEY FK_D3AA3B64F59E604A');
        $this->addSql('DROP TABLE match_group');
    }
}
