<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230825004205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_menu DROP FOREIGN KEY FK_B54ACADD8CCD27AB');
        $this->addSql('ALTER TABLE menu_menu DROP FOREIGN KEY FK_B54ACADD95287724');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7294869C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A9312469DE2');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A937294869C');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93C4663E4');
        $this->addSql('DROP TABLE menu_menu');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE menu');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_menu (menu_source INT NOT NULL, menu_target INT NOT NULL, INDEX IDX_B54ACADD8CCD27AB (menu_source), INDEX IDX_B54ACADD95287724 (menu_target), PRIMARY KEY(menu_source, menu_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, user_id INT NOT NULL, content VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, INDEX IDX_9474526C7294869C (article_id), INDEX IDX_9474526CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, category_id INT DEFAULT NULL, page_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, menu_order INT DEFAULT NULL, is_visible TINYINT(1) NOT NULL, link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_7D053A9312469DE2 (category_id), INDEX IDX_7D053A937294869C (article_id), INDEX IDX_7D053A93C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE menu_menu ADD CONSTRAINT FK_B54ACADD8CCD27AB FOREIGN KEY (menu_source) REFERENCES menu (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu ADD CONSTRAINT FK_B54ACADD95287724 FOREIGN KEY (menu_target) REFERENCES menu (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A9312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A937294869C FOREIGN KEY (article_id) REFERENCES article (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93C4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
