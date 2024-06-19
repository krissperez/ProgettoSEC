<?php

namespace App\Entity;

use App\Repository\AgentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgentsRepository::class)]
class Agents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $cognome = null;

    #[ORM\OneToMany(targetEntity: AgentsZipCodes::class, mappedBy: 'id_agente')]
    private Collection $agentsZipCodes;

    #[ORM\OneToMany(targetEntity: Clients::class, mappedBy: 'id_agente')]
    private Collection $clients;

    public function __construct()
    {
        $this->agentsZipCodes = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCognome(): ?string
    {
        return $this->cognome;
    }

    public function setCognome(string $cognome): static
    {
        $this->cognome = $cognome;

        return $this;
    }

    /**
     * @return Collection<int, AgentsZipCodes>
     */
    public function getAgentsZipCodes(): Collection
    {
        return $this->agentsZipCodes;
    }

    public function addAgentsZipCode(AgentsZipCodes $agentsZipCode): static
    {
        if (!$this->agentsZipCodes->contains($agentsZipCode)) {
            $this->agentsZipCodes->add($agentsZipCode);
            $agentsZipCode->setIdAgente($this);
        }

        return $this;
    }

    public function removeAgentsZipCode(AgentsZipCodes $agentsZipCode): static
    {
        if ($this->agentsZipCodes->removeElement($agentsZipCode)) {
            // set the owning side to null (unless already changed)
            if ($agentsZipCode->getIdAgente() === $this) {
                $agentsZipCode->setIdAgente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Clients>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Clients $client): static
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->setIdAgente($this);
        }

        return $this;
    }

    public function removeClient(Clients $client): static
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getIdAgente() === $this) {
                $client->setIdAgente(null);
            }
        }

        return $this;
    }
}
