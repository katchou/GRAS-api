<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UserProfile", mappedBy="user", cascade={"persist", "remove"})
     */
    private $profile;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PtitDej", mappedBy="user", orphanRemoval=true)
     */
    private $ptitDejs;

    public function __construct()
    {
        $this->ptitDejs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getProfile(): ?UserProfile
    {
        return $this->profile;
    }

    public function setProfile(UserProfile $profile): self
    {
        $this->profile = $profile;

        // set the owning side of the relation if necessary
        if ($this !== $profile->getUser()) {
            $profile->setUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|PtitDej[]
     */
    public function getPtitDejs(): Collection
    {
        return $this->ptitDejs;
    }

    public function addPtitDej(PtitDej $ptitDej): self
    {
        if (!$this->ptitDejs->contains($ptitDej)) {
            $this->ptitDejs[] = $ptitDej;
            $ptitDej->setUser($this);
        }

        return $this;
    }

    public function removePtitDej(PtitDej $ptitDej): self
    {
        if ($this->ptitDejs->contains($ptitDej)) {
            $this->ptitDejs->removeElement($ptitDej);
            // set the owning side to null (unless already changed)
            if ($ptitDej->getUser() === $this) {
                $ptitDej->setUser(null);
            }
        }

        return $this;
    }
}
