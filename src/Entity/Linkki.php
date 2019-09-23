<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LinkkiRepository")
 */
class Linkki
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $linkki;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $otsikko;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $avainsana;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $kuvaus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLinkki(): ?string
    {
        return $this->linkki;
    }

    public function setLinkki(string $linkki): self
    {
        $this->linkki = $linkki;

        return $this;
    }

    public function getOtsikko(): ?string
    {
        return $this->otsikko;
    }

    public function setOtsikko(string $otsikko): self
    {
        $this->otsikko = $otsikko;

        return $this;
    }

    public function getAvainsana(): ?string
    {
        return $this->avainsana;
    }

    public function setAvainsana(string $avainsana): self
    {
        $this->avainsana = $avainsana;

        return $this;
    }

    public function getKuvaus(): ?string
    {
        return $this->kuvaus;
    }

    public function setKuvaus(?string $kuvaus): self
    {
        $this->kuvaus = $kuvaus;

        return $this;
    }
}
