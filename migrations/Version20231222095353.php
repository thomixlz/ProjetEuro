<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231222095353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE match_barrer DROP FOREIGN KEY FK_C101F3D5EAF9CA5F');
        $this->addSql('DROP INDEX IDX_C101F3D5EAF9CA5F ON match_barrer');
        $this->addSql('ALTER TABLE match_barrer DROP team_winner_id');
        $this->addSql('ALTER TABLE teams ADD wins INT DEFAULT NULL, ADD losses INT DEFAULT NULL, ADD draws INT DEFAULT NULL, ADD goals_scored INT DEFAULT NULL, ADD goals_conceded INT DEFAULT NULL, ADD points INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE match_barrer ADD team_winner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE match_barrer ADD CONSTRAINT FK_C101F3D5EAF9CA5F FOREIGN KEY (team_winner_id) REFERENCES teams (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C101F3D5EAF9CA5F ON match_barrer (team_winner_id)');
        $this->addSql('ALTER TABLE teams DROP wins, DROP losses, DROP draws, DROP goals_scored, DROP goals_conceded, DROP points');
    }
}
