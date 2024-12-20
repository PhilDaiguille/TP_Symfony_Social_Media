<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241220140550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD publisher_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD post_comment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C40C86FCE FOREIGN KEY (publisher_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CDB1174D2 FOREIGN KEY (post_comment_id) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9474526C40C86FCE ON comment (publisher_id)');
        $this->addSql('CREATE INDEX IDX_9474526CDB1174D2 ON comment (post_comment_id)');
        $this->addSql('ALTER TABLE post ADD publisher_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D40C86FCE FOREIGN KEY (publisher_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D40C86FCE ON post (publisher_id)');
        $this->addSql('ALTER TABLE reaction ADD reaction_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reaction ADD reaction_post_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT FK_A4D707F769B304F4 FOREIGN KEY (reaction_user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT FK_A4D707F78554D44D FOREIGN KEY (reaction_post_id) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A4D707F769B304F4 ON reaction (reaction_user_id)');
        $this->addSql('CREATE INDEX IDX_A4D707F78554D44D ON reaction (reaction_post_id)');
        $this->addSql('ALTER TABLE tag ADD post_tag_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B7838AF08774 FOREIGN KEY (post_tag_id) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_389B7838AF08774 ON tag (post_tag_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE post DROP CONSTRAINT FK_5A8A6C8D40C86FCE');
        $this->addSql('DROP INDEX IDX_5A8A6C8D40C86FCE');
        $this->addSql('ALTER TABLE post DROP publisher_id');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C40C86FCE');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CDB1174D2');
        $this->addSql('DROP INDEX IDX_9474526C40C86FCE');
        $this->addSql('DROP INDEX IDX_9474526CDB1174D2');
        $this->addSql('ALTER TABLE comment DROP publisher_id');
        $this->addSql('ALTER TABLE comment DROP post_comment_id');
        $this->addSql('ALTER TABLE reaction DROP CONSTRAINT FK_A4D707F769B304F4');
        $this->addSql('ALTER TABLE reaction DROP CONSTRAINT FK_A4D707F78554D44D');
        $this->addSql('DROP INDEX IDX_A4D707F769B304F4');
        $this->addSql('DROP INDEX IDX_A4D707F78554D44D');
        $this->addSql('ALTER TABLE reaction DROP reaction_user_id');
        $this->addSql('ALTER TABLE reaction DROP reaction_post_id');
        $this->addSql('ALTER TABLE tag DROP CONSTRAINT FK_389B7838AF08774');
        $this->addSql('DROP INDEX IDX_389B7838AF08774');
        $this->addSql('ALTER TABLE tag DROP post_tag_id');
    }
}
