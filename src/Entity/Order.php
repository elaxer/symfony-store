<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Информация о заказе
 */
#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: 'orders')]
#[ORM\Index(name: 'orders__credential_id__index', columns: ['credential_id'])]
#[ORM\HasLifecycleCallbacks]
final class Order
{
    use TimestampTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    //private ?string $city;

    #[ORM\Column(name: 'is_pickup', type: 'boolean')]
    private ?bool $isPickup;

    #[ORM\Column(type: 'text')]
    private ?string $comment;

    #[ORM\OneToOne(targetEntity: OrderCredential::class)]
    #[ORM\JoinColumn(name: 'credential_id', nullable: true)]
    private ?OrderCredential $credential;

    #[ORM\OneToMany(targetEntity: OrderProduct::class, mappedBy: 'order')]
    private Collection $orderProducts;

    public function __construct()
    {
        $this->orderProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsPickup(): ?bool
    {
        return $this->isPickup;
    }

    public function setIsPickup(?bool $isPickup): self
    {
        $this->isPickup = $isPickup;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return Collection|OrderProduct[]
     */
    public function getOrderProducts(): Collection
    {
        return $this->orderProducts;
    }

    public function addOrderProduct(OrderProduct $orderProduct): self
    {
        if (!$this->orderProducts->contains($orderProduct)) {
            $this->orderProducts[] = $orderProduct;
            $orderProduct->setOrder($this);
        }

        return $this;
    }

    public function removeOrderProduct(OrderProduct $orderProduct): self
    {
        if ($this->orderProducts->removeElement($orderProduct)) {
            // set the owning side to null (unless already changed)
            if ($orderProduct->getOrder() === $this) {
                $orderProduct->setOrder(null);
            }
        }

        return $this;
    }
}
