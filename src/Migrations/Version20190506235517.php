<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190506235517 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commande_article (id INT AUTO_INCREMENT NOT NULL, articles_id INT NOT NULL, commande_id INT NOT NULL, quantite VARCHAR(255) NOT NULL, INDEX IDX_F4817CC61EBAF6CC (articles_id), INDEX IDX_F4817CC682EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande_article ADD CONSTRAINT FK_F4817CC61EBAF6CC FOREIGN KEY (articles_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE commande_article ADD CONSTRAINT FK_F4817CC682EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('DROP TABLE article_commande');
        $this->addSql('ALTER TABLE categorie ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commande DROP quantite');
        $this->addSql('ALTER TABLE membre ADD adresse_livraison LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD adresse_facturation LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE role roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article_commande (article_id INT NOT NULL, commande_id INT NOT NULL, INDEX IDX_3B0252167294869C (article_id), INDEX IDX_3B02521682EA2E54 (commande_id), PRIMARY KEY(article_id, commande_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article_commande ADD CONSTRAINT FK_3B0252167294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_commande ADD CONSTRAINT FK_3B02521682EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE commande_article');
        $this->addSql('ALTER TABLE categorie DROP image');
        $this->addSql('ALTER TABLE commande ADD quantite INT NOT NULL');
        $this->addSql('ALTER TABLE membre ADD role LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', DROP roles, DROP adresse_livraison, DROP adresse_facturation');
    }
}
