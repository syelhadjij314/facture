<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_facture = null;

    #[ORM\Column]
    private ?int $numero_facture = null;

    #[ORM\Column]
    private ?int $identifiant_client = null;

    #[ORM\OneToMany(mappedBy: 'facture', targetEntity: LigneFacture::class)]
    private Collection $ligneFacture;

    public function __construct()
    {
        $this->ligneFacture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFacture(): ?\DateTime
    {
        return $this->date_facture;
    }

    public function setDateFacture(\DateTime $date_facture): self
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getNumeroFacture(): ?int
    {
        return $this->numero_facture;
    }

    public function setNumeroFacture(int $numero_facture): self
    {
        $this->numero_facture = $numero_facture;

        return $this;
    }

    public function getIdentifiantClient(): ?int
    {
        return $this->identifiant_client;
    }

    public function setIdentifiantClient(int $identifiant_client): self
    {
        $this->identifiant_client = $identifiant_client;

        return $this;
    }

    /**
     * @return Collection<int, LigneFacture>
     */
    public function getLigneFacture(): Collection
    {
        return $this->ligneFacture;
    }

    public function addLigneFacture(LigneFacture $ligneFacture): self
    {
        if (!$this->ligneFacture->contains($ligneFacture)) {
            $this->ligneFacture->add($ligneFacture);
            $ligneFacture->setFacture($this);
        }

        return $this;
    }

    public function removeLigneFacture(LigneFacture $ligneFacture): self
    {
        if ($this->ligneFacture->removeElement($ligneFacture)) {
            // set the owning side to null (unless already changed)
            if ($ligneFacture->getFacture() === $this) {
                $ligneFacture->setFacture(null);
            }
        }

        return $this;
    }
}
