<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("theme")]
    private ?string $intitule = null;

    #[ORM\OneToMany(mappedBy: 'theme', targetEntity: Question::class)]
    #[Groups("questions")]
    private Collection $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection<int, question>
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
            $question->setTheme($this);
        }

        return $this;
    }

    public function removeQuestion(question $question): self
    {
        if ($this->questions->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getTheme() === $this) {
                $question->setTheme(null);
            }
        }

        return $this;
    }
}
