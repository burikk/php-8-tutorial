<?php

declare(strict_types=1);

namespace App;

class View
{
    public function __construct(protected string $view, protected array $params = [])
    {
    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    public function render(): string
    {
        $path = VIEW_PATH . '/' . $this->view;
        if (! file_exists($path)) {
            throw new \Exception('View not found');
        }

        foreach($this->params as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include $path;

        return ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}