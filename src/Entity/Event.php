<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $publish = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $prerequisites = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $startAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $endAt = null;

    /**
     * @var Collection<int, Volunteer>
     */
    #[ORM\OneToMany(targetEntity: Volunteer::class, mappedBy: 'event')]
    private Collection $volunteer;

    /**
     * @var Collection<int, Organization>
     */
    #[ORM\ManyToMany(targetEntity: Organization::class, inversedBy: 'events')]
    private Collection $organization;

    #[ORM\ManyToOne(inversedBy: 'events')]
    private ?Project $project = null;

    public function __construct()
    {
        $this->volunteer = new ArrayCollection();
        $this->organization = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isPublish(): ?bool
    {
        return $this->publish;
    }

    public function setPublish(bool $publish): static
    {
        $this->publish = $publish;

        return $this;
    }

    public function getPrerequisites(): ?string
    {
        return $this->prerequisites;
    }

    public function setPrerequisites(?string $prerequisites): static
    {
        $this->prerequisites = $prerequisites;

        return $this;
    }

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->startAt;
    }

    public function setStartAt(\DateTimeImmutable $startAt): static
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTimeImmutable $endAt): static
    {
        $this->endAt = $endAt;

        return $this;
    }

    /**
     * @return Collection<int, Volunteer>
     */
    public function getVolunteer(): Collection
    {
        return $this->volunteer;
    }

    public function addVolunteer(Volunteer $volunteer): static
    {
        if (!$this->volunteer->contains($volunteer)) {
            $this->volunteer->add($volunteer);
            $volunteer->setEvent($this);
        }

        return $this;
    }

    public function removeVolunteer(Volunteer $volunteer): static
    {
        if ($this->volunteer->removeElement($volunteer)) {
            // set the owning side to null (unless already changed)
            if ($volunteer->getEvent() === $this) {
                $volunteer->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Organization>
     */
    public function getOrganization(): Collection
    {
        return $this->organization;
    }

    public function addOrganization(Organization $organization): static
    {
        if (!$this->organization->contains($organization)) {
            $this->organization->add($organization);
        }

        return $this;
    }

    public function removeOrganization(Organization $organization): static
    {
        $this->organization->removeElement($organization);

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): static
    {
        $this->project = $project;

        return $this;
    }
}
