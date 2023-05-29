<?php

namespace Core\UseCase\DTO\Category;

class CategoryUpdateOutputDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description = '',
        public bool $isActive = true,
        public string $created_at = '',
    ) {
        
    }

}