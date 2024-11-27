<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nationalite = null;

    /**
     * @var Collection<int, Book>
     */
//    #[ORM\OneToMany(targetEntity: Book::class, mappedBy: 'author')]
//    private Collection $books;

    /**
     * @var Collection<int, Book>
     */
    #[ORM\OneToMany(targetEntity: Book::class, mappedBy: 'author')]
    private Collection $books;


    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(?string $nationalite): static
    {
        $this->nationalite = $nationalite;

        return $this;
    }


    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBooks2(): Collection
    {
        return $this->books2;
    }

    public function addBooks2(Book $books2): static
    {
        if (!$this->books2->contains($books2)) {
            $this->books2->add($books2);
            $books2->setAuthorId($this);
        }

        return $this;
    }

    public function removeBooks2(Book $books2): static
    {
        if ($this->books2->removeElement($books2)) {
            // set the owning side to null (unless already changed)
            if ($books2->getAuthorId() === $this) {
                $books2->setAuthorId(null);
            }
        }

        return $this;
    }
}
