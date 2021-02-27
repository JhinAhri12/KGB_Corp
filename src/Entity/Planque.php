<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planque
 *
 * @ORM\Table(name="planque", uniqueConstraints={@ORM\UniqueConstraint(name="code", columns={"code"})}, indexes={@ORM\Index(name="FK_planque_type_planque", columns={"id_type_planque"})})
 * @ORM\Entity
 */
class Planque
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
     * @var int
     *
     * @ORM\Column(name="code", type="integer", nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=40, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=20, nullable=false)
     */
    private $pays;

    /**
     * @var \TypePlanque
     *
     * @ORM\ManyToOne(targetEntity="TypePlanque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_planque", referencedColumnName="id")
     * })
     */
    private $idTypePlanque;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getIdTypePlanque(): ?TypePlanque
    {
        return $this->idTypePlanque;
    }

    public function setIdTypePlanque(?TypePlanque $idTypePlanque): self
    {
        $this->idTypePlanque = $idTypePlanque;

        return $this;
    }


}
