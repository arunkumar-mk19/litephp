<?php

declare(strict_types=1);

namespace LitePHP\Router;

class Route
{
    protected array $routes = [];

    protected array $methods;

    public function get(string $path, callable|array $action): self
    {
        $this->routes[] = ['method' => 'GET', 'path' => $path, 'action' => $action];

        return $this;
    }
    
    public function post(string $path, callable|array $action): self
    {
        $this->routes[] = ['method' => 'POST', 'path' => $path, 'action' => $action];
        
        return $this;
    }

    public function resolve(): void
    {
        # code...
    }
}
