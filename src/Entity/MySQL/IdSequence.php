<?php
namespace App\Entity\MySQL;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IdSequenceRepository")
 * @ORM\Table(name="id_sequences")
 */

class IdSequence
{
    #[ORM\Id]
    #[ORM\Column(type: "string", length: 255)]
    private $sloc_code;

    #[ORM\Id]
    #[ORM\Column(type: "string", length: 255)]
    private $plant_code;

    #[ORM\Id]
    #[ORM\Column(type: "string", length: 255)]
    private $type;

    #[ORM\Id]
    #[ORM\Column(type: "string", length: 255)]
    private $custcode;

    #[ORM\Column(type: "integer")]
    private $id;

    // Getters and setters

    public function getSlocCode(): ?string
    {
        return $this->sloc_code;
    }

    public function setSlocCode(string $sloc_code): self
    {
        $this->sloc_code = $sloc_code;

        return $this;
    }

    public function getPlantCode(): ?string
    {
        return $this->plant_code;
    }

    public function setPlantCode(string $plant_code): self
    {
        $this->plant_code = $plant_code;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCustCode(): ?string
    {
        return $this->custcode;
    }

    public function setCustCode(string $custcode): self
    {
        $this->custcode = $custcode;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
