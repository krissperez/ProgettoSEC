<?php

namespace App\Entity;

use App\Repository\ProvincesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvincesRepository::class)]
class Provinces
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2)]
    private ?string $codice = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\OneToMany(targetEntity: ZipCode::class, mappedBy: 'codice_provincia')]
    private Collection $zipCodes;

    public function __construct()
    {
        $this->zipCodes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodice(): ?string
    {
        return $this->codice;
    }

    public function setCodice(string $codice): static
    {
        $this->codice = $codice;

        return $this;
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

    /**
     * @return Collection<int, ZipCode>
     */
    public function getZipCodes(): Collection
    {
        return $this->zipCodes;
    }

    public function addZipCode(ZipCode $zipCode): static
    {
        if (!$this->zipCodes->contains($zipCode)) {
            $this->zipCodes->add($zipCode);
            $zipCode->setCodiceProvincia($this);
        }

        return $this;
    }

    public function removeZipCode(ZipCode $zipCode): static
    {
        if ($this->zipCodes->removeElement($zipCode)) {
            // set the owning side to null (unless already changed)
            if ($zipCode->getCodiceProvincia() === $this) {
                $zipCode->setCodiceProvincia(null);
            }
        }

        return $this;
    }
}
