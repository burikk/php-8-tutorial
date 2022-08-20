<?php

namespace App\Model\Fields;

class Checkbox extends Boolean
{
    public function render(): string
    {
        return 'this is checkbox';
    }
}