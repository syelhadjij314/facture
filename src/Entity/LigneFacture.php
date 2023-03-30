<?php

namespace App\Entity;

use App\Repository\LigneFactureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneFactureRepository::class)]
class LigneFacture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]



    private ?int $id = null;

    #[ORM\Column]
    private ?int $facture_id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column]
    private ?float $montant_tva = null;

    #[ORM\Column]
    private ?float $total_tva = null;

    #[ORM\ManyToOne(inversedBy: 'ligneFacture')]
    private ?facture $facture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactureId(): ?int
    {
        return $this->facture_id;
    }

    public function setFactureId(int $facture_id): self
    {
        $this->facture_id = $facture_id;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getMontantTva(): ?float
    {
        return $this->montant_tva;
    }

    public function setMontantTva(float $montant_tva): self
    {
        $this->montant_tva = $montant_tva;

        return $this;
    }

    public function getTotalTva(): ?float
    {
        return $this->total_tva;
    }

    public function setTotalTva(float $total_tva): self
    {
        $this->total_tva = $total_tva;

        return $this;
    }

    public function getFacture(): ?facture
    {
        return $this->facture;
    }

    public function setFacture(?facture $facture): self
    {
        $this->facture = $facture;

        return $this;
    }
}
