<?php

namespace App\Entity;

use App\Repository\PomiarTetnaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PomiarTetnaRepository::class)]
class PomiarTetna
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $uzytkownik_id = null;

    #[ORM\Column]
    private ?int $tetno = null;

    #[ORM\Column]
    private ?\DateTime $data_pomiaru = null;

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

    public function getTetno(): ?int
    {
        return $this->tetno;
    }

    public function setTetno(int $tetno): static
    {
        $this->tetno = $tetno;

        return $this;
    }

    public function getDataPomiaru(): ?\DateTime
    {
        return $this->data_pomiaru;
    }

    public function setDataPomiaru(\DateTime $data_pomiaru): static
    {
        $this->data_pomiaru = $data_pomiaru;

        return $this;
    }
}
