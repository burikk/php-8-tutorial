<?php

declare(strict_types=1);

namespace App\Model\Fields;

abstract class Field
{
    public function __construct(protected string $name)
    {
    }

    abstract protected function render(): string;
}