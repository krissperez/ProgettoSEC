<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ragione_sociale = null;

    #[ORM\Column(length: 11)]
    private ?string $partita_iva = null;

    #[ORM\Column(length: 255)]
    private ?string $indirizzo = null;

    #[ORM\Column(length: 255)]
    private ?string $provincia = null;

    #[ORM\ManyToOne(inversedBy: 'clients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ZipCode $cap = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $pec = null;

    #[ORM\ManyToOne(inversedBy: 'clients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Agents $id_agente = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $data_acquisizione = null;

    #[ORM\Column(length: 255)]
    private ?string $telefono = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRagioneSociale(): ?string
    {
        return $this->ragione_sociale;
    }

    public function setRagioneSociale(string $ragione_sociale): static
    {
        $this->ragione_sociale = $ragione_sociale;

        return $this;
    }

    public function getPartitaIva(): ?string
    {
        return $this->partita_iva;
    }

    public function setPartitaIva(string $partita_iva): static
    {
        $this->partita_iva = $partita_iva;

        return $this;
    }

    public function getIndirizzo(): ?string
    {
        return $this->indirizzo;
    }

    public function setIndirizzo(string $indirizzo): static
    {
        $this->indirizzo = $indirizzo;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): static
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getCap(): ?ZipCode
    {
        return $this->cap;
    }

    public function setCap(?ZipCode $cap): static
    {
        $this->cap = $cap;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPec(): ?string
    {
        return $this->pec;
    }

    public function setPec(string $pec): static
    {
        $this->pec = $pec;

        return $this;
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

    public function getDataAcquisizione(): ?\DateTimeInterface
    {
        return $this->data_acquisizione;
    }

    public function setDataAcquisizione(\DateTimeInterface $data_acquisizione): static
    {
        $this->data_acquisizione = $data_acquisizione;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
    }
}
