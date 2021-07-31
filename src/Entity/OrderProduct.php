<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OrderProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Информация о заказанном товаре
 */
#[ORM\Entity(repositoryClass: OrderProductRepository::class)]
#[ORM\Table(name: 'order_products')]
#[ORM\Index(name: 'order_products__order_id__index', columns: ['order_id'])]
#[ORM\Index(name: 'order_products__product_id__index', columns: ['product_id'])]
#[ORM\HasLifecycleCallbacks]
final class OrderProduct
{
    use TimestampTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'orderProducts')]
    #[ORM\JoinColumn(name: 'order_id', nullable: false)]
    private ?Order $order;

    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: 'product_id', nullable: false)]
    private ?Product $product;

    #[ORM\Column(type: 'integer')]
    private ?int $quantity;

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private ?string $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }
}
