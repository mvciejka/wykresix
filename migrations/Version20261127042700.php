<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261127042700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pomiar_cisnienia (id INT AUTO_INCREMENT NOT NULL, uzytkownik_id INT NOT NULL, cisnienie_skurczowe INT NOT NULL, cisnienie_rozkurczowe INT NOT NULL, data_pomiaru DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE pomiar_tetna (id INT AUTO_INCREMENT NOT NULL, uzytkownik_id INT NOT NULL, tetno INT NOT NULL, data_pomiaru DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE przypomnienie (id INT AUTO_INCREMENT NOT NULL, uzytkownik_id INT NOT NULL, rodzaj_pomiaru VARCHAR(255) NOT NULL, godzina TIME NOT NULL, aktywne TINYINT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE udostepnienie (id INT AUTO_INCREMENT NOT NULL, wlasciciel_id INT NOT NULL, odbiorca_id INT NOT NULL, status_zgody VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE uzytkownik (id INT AUTO_INCREMENT NOT NULL, imie VARCHAR(255) NOT NULL, nazwisko VARCHAR(255) NOT NULL, haslo_hash VARCHAR(255) NOT NULL, rola VARCHAR(255) NOT NULL, status_konta VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pomiar_cisnienia');
        $this->addSql('DROP TABLE pomiar_tetna');
        $this->addSql('DROP TABLE przypomnienie');
        $this->addSql('DROP TABLE udostepnienie');
        $this->addSql('DROP TABLE uzytkownik');
    }
}
