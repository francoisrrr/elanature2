<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190506084229 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article ADD photos LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP photo, DROP poids, DROP date_peremption, DROP ingredients');
        $this->addSql('ALTER TABLE categorie ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commande_article DROP FOREIGN KEY FK_F4817CC67294869C');
        $this->addSql('DROP INDEX IDX_F4817CC67294869C ON commande_article');
        $this->addSql('ALTER TABLE commande_article CHANGE article_id articles_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande_article ADD CONSTRAINT FK_F4817CC61EBAF6CC FOREIGN KEY (articles_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_F4817CC61EBAF6CC ON commande_article (articles_id)');
        $this->addSql('ALTER TABLE membre ADD adresses LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article ADD photo VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD poids DOUBLE PRECISION NOT NULL, ADD date_peremption DATETIME NOT NULL, ADD ingredients LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, DROP photos');
        $this->addSql('ALTER TABLE categorie DROP image');
        $this->addSql('ALTER TABLE commande_article DROP FOREIGN KEY FK_F4817CC61EBAF6CC');
        $this->addSql('DROP INDEX IDX_F4817CC61EBAF6CC ON commande_article');
        $this->addSql('ALTER TABLE commande_article CHANGE articles_id article_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande_article ADD CONSTRAINT FK_F4817CC67294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_F4817CC67294869C ON commande_article (article_id)');
        $this->addSql('ALTER TABLE membre DROP adresses');
    }
}
