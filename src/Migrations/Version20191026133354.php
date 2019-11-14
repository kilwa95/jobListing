<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191026133354 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE candidat_offre (candidat_id INT NOT NULL, offre_id INT NOT NULL, INDEX IDX_6F6BEA1D8D0EB82 (candidat_id), INDEX IDX_6F6BEA1D4CC8505A (offre_id), PRIMARY KEY(candidat_id, offre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat_offre ADD CONSTRAINT FK_6F6BEA1D8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidat_offre ADD CONSTRAINT FK_6F6BEA1D4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre ADD recreteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FC7B368DA FOREIGN KEY (recreteur_id) REFERENCES recreuteur (id)');
        $this->addSql('CREATE INDEX IDX_AF86866FC7B368DA ON offre (recreteur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE candidat_offre');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FC7B368DA');
        $this->addSql('DROP INDEX IDX_AF86866FC7B368DA ON offre');
        $this->addSql('ALTER TABLE offre DROP recreteur_id');
    }
}
