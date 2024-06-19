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

    #[ORM\ManyToOne(inversedBy: 'caps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Province $code_provincia = null;

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

    public function getCodeProvincia(): ?Province
    {
        return $this->code_provincia;
    }

    public function setCodeProvincia(?Province $code_provincia): static
    {
        $this->code_provincia = $code_provincia;

        return $this;
    }
}