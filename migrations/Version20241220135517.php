<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241220135517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_tags DROP CONSTRAINT fk_a6e9f32d4b89032c');
        $this->addSql('ALTER TABLE post_tags DROP CONSTRAINT fk_a6e9f32dbad26311');
        $this->addSql('ALTER TABLE tag_post DROP CONSTRAINT fk_b485d33bbad26311');
        $this->addSql('ALTER TABLE tag_post DROP CONSTRAINT fk_b485d33b4b89032c');
        $this->addSql('DROP TABLE post_tags');
        $this->addSql('DROP TABLE tag_post');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT fk_9474526cdb1174d2');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT fk_9474526c5f0ebbff');
        $this->addSql('DROP INDEX idx_9474526c5f0ebbff');
        $this->addSql('DROP INDEX idx_9474526cdb1174d2');
        $this->addSql('ALTER TABLE comment DROP post_comment_id');
        $this->addSql('ALTER TABLE comment DROP user_comment_id');
        $this->addSql('ALTER TABLE post DROP CONSTRAINT fk_5a8a6c8d9a8664a6');
        $this->addSql('DROP INDEX idx_5a8a6c8d9a8664a6');
        $this->addSql('ALTER TABLE post DROP post_user_id');
        $this->addSql('ALTER TABLE reaction DROP CONSTRAINT fk_a4d707f72827b8e4');
        $this->addSql('ALTER TABLE reaction DROP CONSTRAINT fk_a4d707f76d7cfb5e');
        $this->addSql('DROP INDEX idx_a4d707f76d7cfb5e');
        $this->addSql('DROP INDEX idx_a4d707f72827b8e4');
        $this->addSql('ALTER TABLE reaction DROP user_reaction_id');
        $this->addSql('ALTER TABLE reaction DROP post_reaction_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE post_tags (post_id INT NOT NULL, tag_id INT NOT NULL, PRIMARY KEY(post_id, tag_id))');
        $this->addSql('CREATE INDEX idx_a6e9f32dbad26311 ON post_tags (tag_id)');
        $this->addSql('CREATE INDEX idx_a6e9f32d4b89032c ON post_tags (post_id)');
        $this->addSql('CREATE TABLE tag_post (tag_id INT NOT NULL, post_id INT NOT NULL, PRIMARY KEY(tag_id, post_id))');
        $this->addSql('CREATE INDEX idx_b485d33b4b89032c ON tag_post (post_id)');
        $this->addSql('CREATE INDEX idx_b485d33bbad26311 ON tag_post (tag_id)');
        $this->addSql('ALTER TABLE post_tags ADD CONSTRAINT fk_a6e9f32d4b89032c FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE post_tags ADD CONSTRAINT fk_a6e9f32dbad26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tag_post ADD CONSTRAINT fk_b485d33bbad26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tag_post ADD CONSTRAINT fk_b485d33b4b89032c FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD post_comment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD user_comment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526cdb1174d2 FOREIGN KEY (post_comment_id) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526c5f0ebbff FOREIGN KEY (user_comment_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9474526c5f0ebbff ON comment (user_comment_id)');
        $this->addSql('CREATE INDEX idx_9474526cdb1174d2 ON comment (post_comment_id)');
        $this->addSql('ALTER TABLE post ADD post_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT fk_5a8a6c8d9a8664a6 FOREIGN KEY (post_user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_5a8a6c8d9a8664a6 ON post (post_user_id)');
        $this->addSql('ALTER TABLE reaction ADD user_reaction_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reaction ADD post_reaction_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT fk_a4d707f72827b8e4 FOREIGN KEY (user_reaction_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT fk_a4d707f76d7cfb5e FOREIGN KEY (post_reaction_id) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_a4d707f76d7cfb5e ON reaction (post_reaction_id)');
        $this->addSql('CREATE INDEX idx_a4d707f72827b8e4 ON reaction (user_reaction_id)');
    }
}
