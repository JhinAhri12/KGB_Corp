<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mission
 *
 * @ORM\Table(name="mission", uniqueConstraints={@ORM\UniqueConstraint(name="id_agent", columns={"id_agent", "id_contact", "id_cible", "id_type_mission", "id_statut", "id_specialite"}), @ORM\UniqueConstraint(name="id_planque", columns={"id_planque"})}, indexes={@ORM\Index(name="id_contact", columns={"id_contact"}), @ORM\Index(name="mission_ibfk_7", columns={"id_type_mission"}), @ORM\Index(name="id_statut", columns={"id_statut"}), @ORM\Index(name="FK_mission_nationalite", columns={"pays"}), @ORM\Index(name="id_specialite", columns={"id_specialite"}), @ORM\Index(name="id_cible", columns={"id_cible"}), @ORM\Index(name="IDX_9067F23CC80EDDAD", columns={"id_agent"})})
 * @ORM\Entity
 */
class Mission
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
     * @ORM\Column(name="titre", type="string", length=20, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_de_code", type="string", length=20, nullable=false)
     */
    private $nomDeCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateDebut = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=false)
     */
    private $dateFin;

    /**
     * @var \Specialite
     *
     * @ORM\ManyToOne(targetEntity="Specialite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_specialite", referencedColumnName="id")
     * })
     */
    private $idSpecialite;

    /**
     * @var \Contact
     *
     * @ORM\ManyToOne(targetEntity="Contact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contact", referencedColumnName="id")
     * })
     */
    private $idContact;

    /**
     * @var \Planque
     *
     * @ORM\ManyToOne(targetEntity="Planque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_planque", referencedColumnName="id")
     * })
     */
    private $idPlanque;

    /**
     * @var \TypeMission
     *
     * @ORM\ManyToOne(targetEntity="TypeMission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_mission", referencedColumnName="id")
     * })
     */
    private $idTypeMission;

    /**
     * @var \Statut
     *
     * @ORM\ManyToOne(targetEntity="Statut")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_statut", referencedColumnName="id")
     * })
     */
    private $idStatut;

    /**
     * @var \Agent
     *
     * @ORM\ManyToOne(targetEntity="Agent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_agent", referencedColumnName="id")
     * })
     */
    private $idAgent;

    /**
     * @var \Cible
     *
     * @ORM\ManyToOne(targetEntity="Cible")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cible", referencedColumnName="id")
     * })
     */
    private $idCible;

    /**
     * @var \Nationalite
     *
     * @ORM\ManyToOne(targetEntity="Nationalite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pays", referencedColumnName="Id")
     * })
     */
    private $pays;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getNomDeCode(): ?string
    {
        return $this->nomDeCode;
    }

    public function setNomDeCode(string $nomDeCode): self
    {
        $this->nomDeCode = $nomDeCode;

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

    public function getIdSpecialite(): ?Specialite
    {
        return $this->idSpecialite;
    }

    public function setIdSpecialite(?Specialite $idSpecialite): self
    {
        $this->idSpecialite = $idSpecialite;

        return $this;
    }

    public function getIdContact(): ?Contact
    {
        return $this->idContact;
    }

    public function setIdContact(?Contact $idContact): self
    {
        $this->idContact = $idContact;

        return $this;
    }

    public function getIdPlanque(): ?Planque
    {
        return $this->idPlanque;
    }

    public function setIdPlanque(?Planque $idPlanque): self
    {
        $this->idPlanque = $idPlanque;

        return $this;
    }

    public function getIdTypeMission(): ?TypeMission
    {
        return $this->idTypeMission;
    }

    public function setIdTypeMission(?TypeMission $idTypeMission): self
    {
        $this->idTypeMission = $idTypeMission;

        return $this;
    }

    public function getIdStatut(): ?Statut
    {
        return $this->idStatut;
    }

    public function setIdStatut(?Statut $idStatut): self
    {
        $this->idStatut = $idStatut;

        return $this;
    }

    public function getIdAgent(): ?Agent
    {
        return $this->idAgent;
    }

    public function setIdAgent(?Agent $idAgent): self
    {
        $this->idAgent = $idAgent;

        return $this;
    }

    public function getIdCible(): ?Cible
    {
        return $this->idCible;
    }

    public function setIdCible(?Cible $idCible): self
    {
        $this->idCible = $idCible;

        return $this;
    }

    public function getPays(): ?Nationalite
    {
        return $this->pays;
    }

    public function setPays(?Nationalite $pays): self
    {
        $this->pays = $pays;

        return $this;
    }


}
