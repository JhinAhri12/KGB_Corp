<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agent
 *
 * @ORM\Table(name="agent", indexes={@ORM\Index(name="FK_agent_nationalite", columns={"id_nationalite"}), @ORM\Index(name="FK_agent_specialite", columns={"id_specialite"})})
 * @ORM\Entity
 */
class Agent
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
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_naissance", type="datetime", nullable=false)
     */
    private $dateDeNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="code_identification", type="string", length=20, nullable=false)
     */
    private $codeIdentification;

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
     * @var \Nationalite
     *
     * @ORM\ManyToOne(targetEntity="Nationalite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nationalite", referencedColumnName="Id")
     * })
     */
    private $idNationalite;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getCodeIdentification(): ?string
    {
        return $this->codeIdentification;
    }

    public function setCodeIdentification(string $codeIdentification): self
    {
        $this->codeIdentification = $codeIdentification;

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

    public function getIdNationalite(): ?Nationalite
    {
        return $this->idNationalite;
    }

    public function setIdNationalite(?Nationalite $idNationalite): self
    {
        $this->idNationalite = $idNationalite;

        return $this;
    }


}
