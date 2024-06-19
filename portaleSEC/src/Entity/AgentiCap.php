<?php

namespace App\Entity;

use App\Repository\AgentiCapRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgentiCapRepository::class)]
class AgentiCap
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_agente = null;

    #[ORM\Column]
    private ?int $id_cap = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAgente(): ?int
    {
        return $this->id_agente;
    }

    public function setIdAgente(int $id_agente): static
    {
        $this->id_agente = $id_agente;

        return $this;
    }

    public function getIdCap(): ?int
    {
        return $this->id_cap;
    }

    public function setIdCap(int $id_cap): static
    {
        $this->id_cap = $id_cap;

        return $this;
    }
}
