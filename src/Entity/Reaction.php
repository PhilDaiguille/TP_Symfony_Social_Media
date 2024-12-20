<?php

namespace App\Entity;

use App\Repository\ReactionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReactionRepository::class)]
class Reaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\ManyToOne(inversedBy: 'reactions')]
    private ?User $reactionUser = null;

    #[ORM\ManyToOne(inversedBy: 'reactions')]
    private ?Post $reactionPost = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getReactionUser(): ?User
    {
        return $this->reactionUser;
    }

    public function setReactionUser(?User $reactionUser): static
    {
        $this->reactionUser = $reactionUser;

        return $this;
    }

    public function getReactionPost(): ?Post
    {
        return $this->reactionPost;
    }

    public function setReactionPost(?Post $reactionPost): static
    {
        $this->reactionPost = $reactionPost;

        return $this;
    }
}
