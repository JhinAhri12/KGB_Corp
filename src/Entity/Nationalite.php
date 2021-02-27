<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nationalite
 *
 * @ORM\Table(name="nationalite")
 * @ORM\Entity
 */
class Nationalite
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Description", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
