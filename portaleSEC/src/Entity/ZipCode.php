<?php

namespace App\Entity;

use App\Repository\ZipCodeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZipCodeRepository::class)]
class ZipCode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $comune = null;

    #[ORM\ManyToOne(inversedBy: 'zipCodes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Provinces $codice_provincia = null;

    #[ORM\OneToOne(mappedBy: 'id_zipCode', cascade: ['persist', 'remove'])]
    private ?AgentsZipCodes $agentsZipCodes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComune(): ?string
    {
        return $this->comune;
    }

    public function setComune(string $comune): static
    {
        $this->comune = $comune;

        return $this;
    }

    public function getCodiceProvincia(): ?Provinces
    {
        return $this->codice_provincia;
    }

    public function setCodiceProvincia(?Provinces $codice_provincia): static
    {
        $this->codice_provincia = $codice_provincia;

        return $this;
    }

    public function getAgentsZipCodes(): ?AgentsZipCodes
    {
        return $this->agentsZipCodes;
    }

    public function setAgentsZipCodes(AgentsZipCodes $agentsZipCodes): static
    {
        // set the owning side of the relation if necessary
        if ($agentsZipCodes->getIdZipCode() !== $this) {
            $agentsZipCodes->setIdZipCode($this);
        }

        $this->agentsZipCodes = $agentsZipCodes;

        return $this;
    }
}
