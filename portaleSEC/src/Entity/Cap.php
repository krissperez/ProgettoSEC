<?php

namespace App\Entity;

use App\Repository\CapRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapRepository::class)]
class Cap
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $comune = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Province $id_provincia = null;

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

    public function getIdProvincia(): ?Province
    {
        return $this->id_provincia;
    }

    public function setIdProvincia(?Province $id_provincia): static
    {
        $this->id_provincia = $id_provincia;

        return $this;
    }
}
