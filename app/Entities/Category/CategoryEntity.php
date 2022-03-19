<?php

namespace App\Entities\Category;

interface CategoryEntity
{
    public function getId(): int;

    public function getName(): string;

    public function getSlug(): string;
}
