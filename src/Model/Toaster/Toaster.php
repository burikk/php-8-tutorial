<?php

namespace App\Model\Toaster;

class Toaster
{
    //set to protected because we don't want access them from outside the class
    //we want to have access to them in child class, like a ToasterPro
    protected array $slices = [];
    protected int $size = 2;

    public function addSlice(string $slice) {
        if (count($this->slices) < $this->size) {
            $this->slices[] = $slice;
        }
    }

    public function toast()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1) . ':Toasting ' . $slice . PHP_EOL;
        }
    }
}