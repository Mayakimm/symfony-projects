<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241125131411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_menus (order_id INT NOT NULL, menus_id INT NOT NULL, INDEX IDX_F1EB7C328D9F6D38 (order_id), INDEX IDX_F1EB7C3214041B84 (menus_id), PRIMARY KEY(order_id, menus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_menus ADD CONSTRAINT FK_F1EB7C328D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_menus ADD CONSTRAINT FK_F1EB7C3214041B84 FOREIGN KEY (menus_id) REFERENCES menus (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_menus DROP FOREIGN KEY FK_F1EB7C328D9F6D38');
        $this->addSql('ALTER TABLE order_menus DROP FOREIGN KEY FK_F1EB7C3214041B84');
        $this->addSql('DROP TABLE order_menus');
    }
}
