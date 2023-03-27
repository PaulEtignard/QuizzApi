<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]

class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("questions")]
    private ?string $insitutle = null;

    #[ORM\Column(type: Types::ARRAY)]
    #[Groups("questions")]
    private array $reponse = [];

    #[ORM\Column(length: 255)]
    #[Groups("questions")]
    private ?string $reponseCorrecte = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    private ?Theme $theme = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInsitutle(): ?string
    {
        return $this->insitutle;
    }

    public function setInsitutle(string $insitutle): self
    {
        $this->insitutle = $insitutle;

        return $this;
    }

    public function getReponse(): array
    {
        return $this->reponse;
    }

    public function setReponse(array $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getReponseCorrecte(): ?string
    {
        return $this->reponseCorrecte;
    }

    public function setReponseCorrecte(string $reponseCorrecte): self
    {
        $this->reponseCorrecte = $reponseCorrecte;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }
}
