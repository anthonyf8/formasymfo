<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250409075901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE event_organization (event_id INT NOT NULL, organization_id INT NOT NULL, INDEX IDX_2CFD698F71F7E88B (event_id), INDEX IDX_2CFD698F32C8A3DE (organization_id), PRIMARY KEY(event_id, organization_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE event_organization ADD CONSTRAINT FK_2CFD698F71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE event_organization ADD CONSTRAINT FK_2CFD698F32C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE event_organization DROP FOREIGN KEY FK_2CFD698F71F7E88B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE event_organization DROP FOREIGN KEY FK_2CFD698F32C8A3DE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE event_organization
        SQL);
    }
}
