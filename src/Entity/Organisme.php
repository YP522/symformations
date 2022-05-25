<?php

namespace App\Entity;

use App\Repository\OrganismeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrganismeRepository::class)]
class Organisme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    private $numero_tel;

    #[ORM\Column(type: 'string', length: 255)]
    private $email_contact;

    #[ORM\OneToMany(mappedBy: 'organisme', targetEntity: Formation::class)]
    private $organisme;

    public function __construct()
    {
        $this->organisme = new ArrayCollection();
    }

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumeroTel(): ?string
    {
        return $this->numero_tel;
    }

    public function setNumeroTel(string $numero_tel): self
    {
        $this->numero_tel = $numero_tel;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->email_contact;
    }

    public function setEmailContact(string $email_contact): self
    {
        $this->email_contact = $email_contact;

        return $this;
    }

    /**
     * @return Collection<int, Formation>
     */
    public function getOrganisme(): Collection
    {
        return $this->organisme;
    }

    public function addOrganisme(Formation $organisme): self
    {
        if (!$this->organisme->contains($organisme)) {
            $this->organisme[] = $organisme;
            $organisme->setOrganisme($this);
        }

        return $this;
    }

    public function removeOrganisme(Formation $organisme): self
    {
        if ($this->organisme->removeElement($organisme)) {
            // set the owning side to null (unless already changed)
            if ($organisme->getOrganisme() === $this) {
                $organisme->setOrganisme(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }
}
