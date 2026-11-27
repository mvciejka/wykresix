<?php

namespace App\Entity;

use App\Repository\PomiarCisnieniaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PomiarCisnieniaRepository::class)]
class PomiarCisnienia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $uzytkownik_id = null;

    #[ORM\Column]
    private ?int $cisnienie_skurczowe = null;

    #[ORM\Column]
    private ?int $cisnienie_rozkurczowe = null;

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

    public function getCisnienieSkurczowe(): ?int
    {
        return $this->cisnienie_skurczowe;
    }

    public function setCisnienieSkurczowe(int $cisnienie_skurczowe): static
    {
        $this->cisnienie_skurczowe = $cisnienie_skurczowe;

        return $this;
    }

    public function getCisnienieRozkurczowe(): ?int
    {
        return $this->cisnienie_rozkurczowe;
    }

    public function setCisnienieRozkurczowe(int $cisnienie_rozkurczowe): static
    {
        $this->cisnienie_rozkurczowe = $cisnienie_rozkurczowe;

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
