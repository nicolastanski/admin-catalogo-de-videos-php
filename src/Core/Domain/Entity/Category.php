<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;

class Category
{
    use MethodsMagicsTrait;
    
    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true,
    ) {
        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function disable(): void
    {
        $this->isActive = false;
    }

    public function update(string $name, string $description = '')
    {
        $this->name = $name;
        $this->description = $description ?? $this->description;

        $this->validate();
    }

    public function validate()
    {
        DomainValidation::strMinLength($this->name);
        DomainValidation::strMaxLength($this->name);
        DomainValidation::strCanNullAndMaxLength($this->description);

        // if (empty($this->name)) {
        //     throw new EntityValidationException("Nome vazio");
        // }

        // if (strlen($this->name) > 255 || strlen($this->name) <= 2) {
        //     throw new EntityValidationException("Nome vazio");
        // }

        // if (!empty($this->description) && (strlen($this->description) > 255 || strlen($this->description) < 3)) {
        //     throw new EntityValidationException("Descrição vazio");
        // }
    }
}