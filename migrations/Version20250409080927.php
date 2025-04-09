<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250409080927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE organization_project (organization_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_E26158AD32C8A3DE (organization_id), INDEX IDX_E26158AD166D1F9C (project_id), PRIMARY KEY(organization_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE organization_project ADD CONSTRAINT FK_E26158AD32C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE organization_project ADD CONSTRAINT FK_E26158AD166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE event ADD project_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3BAE0AA7166D1F9C ON event (project_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE volunteer ADD project_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE volunteer ADD CONSTRAINT FK_5140DEDB166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5140DEDB166D1F9C ON volunteer (project_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE organization_project DROP FOREIGN KEY FK_E26158AD32C8A3DE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE organization_project DROP FOREIGN KEY FK_E26158AD166D1F9C
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE organization_project
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7166D1F9C
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3BAE0AA7166D1F9C ON event
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE event DROP project_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE volunteer DROP FOREIGN KEY FK_5140DEDB166D1F9C
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_5140DEDB166D1F9C ON volunteer
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE volunteer DROP project_id
        SQL);
    }
}
