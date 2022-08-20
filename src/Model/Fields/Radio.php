<?php

namespace App\Model\Fields;

class Radio extends Boolean
{
    public function render(): string
    {
        return 'this is radio';
    }
}