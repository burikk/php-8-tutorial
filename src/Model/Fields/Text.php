<?php

namespace App\Model\Fields;

class Text extends Field
{
    public function render(): string
    {
        return 'this is text field';
    }
}