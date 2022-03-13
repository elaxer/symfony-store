<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OrderCredentialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Контактные данные от незарегестрированного клиента
 */
#[ORM\Entity(repositoryClass: OrderCredentialRepository::class)]
#[ORM\Table(name: 'order_credentials')]
#[ORM\HasLifecycleCallbacks]
final class OrderCredential
{
    use CustomerCredentialTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
