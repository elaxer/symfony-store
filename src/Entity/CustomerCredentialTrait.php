<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Контактные данные клиента
 */
trait CustomerCredentialTrait
{
    #[ORM\Column(name: 'full_name', type: 'string', length: 255)]
    private ?string $fullName;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $email;

    #[ORM\Column(name: 'phone_number', type: 'string', length: 12)]
    private ?string $phoneNumber;

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = str_replace(['+', '-', ' ', '(', ')'], '', $phoneNumber);

        return $this;
    }
}
