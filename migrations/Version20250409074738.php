<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250409074738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE volunteer ADD event_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE volunteer ADD CONSTRAINT FK_5140DEDB71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5140DEDB71F7E88B ON volunteer (event_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE volunteer DROP FOREIGN KEY FK_5140DEDB71F7E88B
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_5140DEDB71F7E88B ON volunteer
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE volunteer DROP event_id
        SQL);
    }
}
