<?php

namespace App\Entity;

use App\Repository\PrzypomnienieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrzypomnienieRepository::class)]
class Przypomnienie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $uzytkownik_id = null;

    #[ORM\Column(length: 255)]
    private ?string $rodzaj_pomiaru = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $godzina = null;

    #[ORM\Column]
    private ?bool $aktywne = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUzytkownikId(): ?int
    {
        return $this->uzytkownik_id;
    }

    public function setUzytkownikId(int $uzytkownik_id): static
    {
        $this->uzytkownik_id = $uzytkownik_id;

        return $this;
    }

    public function getRodzajPomiaru(): ?string
    {
        return $this->rodzaj_pomiaru;
    }

    public function setRodzajPomiaru(string $rodzaj_pomiaru): static
    {
        $this->rodzaj_pomiaru = $rodzaj_pomiaru;

        return $this;
    }

    public function getGodzina(): ?\DateTime
    {
        return $this->godzina;
    }

    public function setGodzina(\DateTime $godzina): static
    {
        $this->godzina = $godzina;

        return $this;
    }

    public function isAktywne(): ?bool
    {
        return $this->aktywne;
    }

    public function setAktywne(bool $aktywne): static
    {
        $this->aktywne = $aktywne;

        return $this;
    }
}
