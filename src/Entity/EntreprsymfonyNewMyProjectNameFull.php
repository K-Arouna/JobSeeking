<?php

namespace App\Entity;

use App\Repository\EntreprsymfonyNewMyProjectNameFullRepository;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\Demandeur;
use App\Entity\User;
use App\Entity\Offer;

/**
 * @ORM\Entity(repositoryClass=EntreprsymfonyNewMyProjectNameFullRepository::class)
 */
class EntreprsymfonyNewMyProjectNameFull
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=offer::class, inversedBy="entreprsymfonyNewMyProjectNameFulls")
     */
    private $Offre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getOffre(): ?offer
    {
        return $this->Offre;
    }

    public function setOffre(?offer $Offre): self
    {
        $this->Offre = $Offre;

        return $this;
    }
}
