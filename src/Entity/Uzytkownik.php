<?php

namespace App\Entity;

use App\Repository\UzytkownikRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UzytkownikRepository::class)]
class Uzytkownik
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $imie = null;

    #[ORM\Column(length: 255)]
    private ?string $nazwisko = null;

    #[ORM\Column(length: 255)]
    private ?string $haslo_hash = null;

    #[ORM\Column(length: 255)]
    private ?string $rola = null;

    #[ORM\Column(length: 255)]
    private ?string $status_konta = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getImie(): ?string
    {
        return $this->imie;
    }

    public function setImie(string $imie): static
    {
        $this->imie = $imie;

        return $this;
    }

    public function getNazwisko(): ?string
    {
        return $this->nazwisko;
    }

    public function setNazwisko(string $nazwisko): static
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    public function getHasloHash(): ?string
    {
        return $this->haslo_hash;
    }

    public function setHasloHash(string $haslo_hash): static
    {
        $this->haslo_hash = $haslo_hash;

        return $this;
    }

    public function getRola(): ?string
    {
        return $this->rola;
    }

    public function setRola(string $rola): static
    {
        $this->rola = $rola;

        return $this;
    }

    public function getStatusKonta(): ?string
    {
        return $this->status_konta;
    }

    public function setStatusKonta(string $status_konta): static
    {
        $this->status_konta = $status_konta;

        return $this;
    }
}
