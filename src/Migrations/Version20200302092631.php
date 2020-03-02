<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200302092631 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE tlt_quiz ADD categories_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tlt_quiz ADD CONSTRAINT FK_AE8854D1A21214B7 FOREIGN KEY (categories_id) REFERENCES tlt_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_AE8854D1A21214B7 ON tlt_quiz (categories_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tlt_quiz DROP CONSTRAINT FK_AE8854D1A21214B7');
        $this->addSql('DROP INDEX IDX_AE8854D1A21214B7');
        $this->addSql('ALTER TABLE tlt_quiz DROP categories_id');
    }
}
