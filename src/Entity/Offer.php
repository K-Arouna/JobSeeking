<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\Demandeur;
use App\Entity\User;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 */
class Offer
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
    private $libelle;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\OneToMany(targetEntity=Cv::class, mappedBy="offer")
     */
    private $cv;

    /**
     * @ORM\OneToMany(targetEntity=EntreprsymfonyNewMyProjectNameFull::class, mappedBy="Offre")
     */
    private $entreprsymfonyNewMyProjectNameFulls;

    public function __construct()
    {
        $this->cv = new ArrayCollection();
        $this->entreprsymfonyNewMyProjectNameFulls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return Collection|Cv[]
     */
    public function getCv(): Collection
    {
        return $this->cv;
    }

    public function addCv(Cv $cv): self
    {
        if (!$this->cv->contains($cv)) {
            $this->cv[] = $cv;
            $cv->setOffer($this);
        }

        return $this;
    }

    public function removeCv(Cv $cv): self
    {
        if ($this->cv->removeElement($cv)) {
            // set the owning side to null (unless already changed)
            if ($cv->getOffer() === $this) {
                $cv->setOffer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EntreprsymfonyNewMyProjectNameFull[]
     */
    public function getEntreprsymfonyNewMyProjectNameFulls(): Collection
    {
        return $this->entreprsymfonyNewMyProjectNameFulls;
    }

    public function addEntreprsymfonyNewMyProjectNameFull(EntreprsymfonyNewMyProjectNameFull $entreprsymfonyNewMyProjectNameFull): self
    {
        if (!$this->entreprsymfonyNewMyProjectNameFulls->contains($entreprsymfonyNewMyProjectNameFull)) {
            $this->entreprsymfonyNewMyProjectNameFulls[] = $entreprsymfonyNewMyProjectNameFull;
            $entreprsymfonyNewMyProjectNameFull->setOffre($this);
        }

        return $this;
    }

    public function removeEntreprsymfonyNewMyProjectNameFull(EntreprsymfonyNewMyProjectNameFull $entreprsymfonyNewMyProjectNameFull): self
    {
        if ($this->entreprsymfonyNewMyProjectNameFulls->removeElement($entreprsymfonyNewMyProjectNameFull)) {
            // set the owning side to null (unless already changed)
            if ($entreprsymfonyNewMyProjectNameFull->getOffre() === $this) {
                $entreprsymfonyNewMyProjectNameFull->setOffre(null);
            }
        }

        return $this;
    }
}
