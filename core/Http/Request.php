<?php

declare(strict_types=1);

namespace Core\Http;

class Request
{
    private string $path;
    private string $httpMethod;

    public function __construct()
    {
        $this->setPath();
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(): void
    {
        $request_uri = trim($_SERVER['REQUEST_URI']);
        $script_path = str_replace('index.php', '', trim($_SERVER['SCRIPT_NAME']));
        $query_string = trim(str_replace($script_path, '', $request_uri));
        $this->path = $query_string;
    }

    public function getParams(): array
    {
        return explode('/', $this->path);
    }

    public function getHttpMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}