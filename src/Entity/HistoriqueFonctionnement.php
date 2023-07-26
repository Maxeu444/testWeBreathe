<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * HistoriqueFonctionnement
 *
 * @ORM\Table(name="historique_fonctionnement", indexes={@ORM\Index(name="module_id", columns={"module_id"})})
 * @ORM\Entity
 */
class HistoriqueFonctionnement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=20, nullable=false)
     */
    private $etat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="taux_remplissage", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $tauxRemplissage;

    /**
 * @var \App\Entity\Modules|null
 *
 * @ORM\ManyToOne(targetEntity="App\Entity\Modules")
 * @ORM\JoinColumns({
 *   @ORM\JoinColumn(name="module_id", referencedColumnName="id")
 * })
 */
private $module;


        /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_heure", type="datetime", nullable=false)
     */
    private $dateHeure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->dateHeure;
    }

    public function setDateHeure(\DateTimeInterface $dateHeure): self
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getTauxRemplissage(): ?string
    {
        return $this->tauxRemplissage;
    }

    public function setTauxRemplissage(?string $tauxRemplissage): static
    {
        $this->tauxRemplissage = $tauxRemplissage;

        return $this;
    }

    public function getModule(): ?Modules
    {
        return $this->module;
    }

    public function setModule(?Modules $module): static
    {
        $this->module = $module;

        return $this;
    }

}
