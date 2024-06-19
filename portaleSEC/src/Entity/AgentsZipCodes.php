<?php

namespace App\Entity;

use App\Repository\AgentsZipCodesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgentsZipCodesRepository::class)]
class AgentsZipCodes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'agentsZipCodes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Agents $id_agente = null;

    #[ORM\OneToOne(inversedBy: 'agentsZipCodes', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?ZipCode $id_zipCode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAgente(): ?Agents
    {
        return $this->id_agente;
    }

    public function setIdAgente(?Agents $id_agente): static
    {
        $this->id_agente = $id_agente;

        return $this;
    }

    public function getIdZipCode(): ?ZipCode
    {
        return $this->id_zipCode;
    }

    public function setIdZipCode(ZipCode $id_zipCode): static
    {
        $this->id_zipCode = $id_zipCode;

        return $this;
    }
}
