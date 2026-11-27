<?php

namespace App\Entity;

use App\Repository\UdostepnienieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UdostepnienieRepository::class)]
class Udostepnienie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $wlasciciel_id = null;

    #[ORM\Column]
    private ?int $odbiorca_id = null;

    #[ORM\Column(length: 255)]
    private ?string $status_zgody = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getWlascicielId(): ?int
    {
        return $this->wlasciciel_id;
    }

    public function setWlascicielId(int $wlasciciel_id): static
    {
        $this->wlasciciel_id = $wlasciciel_id;

        return $this;
    }

    public function getOdbiorcaId(): ?int
    {
        return $this->odbiorca_id;
    }

    public function setOdbiorcaId(int $odbiorca_id): static
    {
        $this->odbiorca_id = $odbiorca_id;

        return $this;
    }

    public function getStatusZgody(): ?string
    {
        return $this->status_zgody;
    }

    public function setStatusZgody(string $status_zgody): static
    {
        $this->status_zgody = $status_zgody;

        return $this;
    }
}
