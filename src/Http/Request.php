<?php

declare(strict_types=1);

namespace LitePHP\Http;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class Request implements RequestInterface
{
    private string $path;

    private string $httpMethod;
    
    public const METHOD_HEAD = 'HEAD';
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_PATCH = 'PATCH';
    public const METHOD_DELETE = 'DELETE';
    public const METHOD_PURGE = 'PURGE';
    public const METHOD_OPTIONS = 'OPTIONS';
    public const METHOD_TRACE = 'TRACE';
    public const METHOD_CONNECT = 'CONNECT';

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

    public function getRequestTarget(): string
    {
        
    }

    public function withRequestTarget(string $requestTarget): RequestInterface
    {
        
    }

    /**
     * Set the Http method from the request
     *
     * @return void
     */
    public function setMethod(): void
    {
        $this->httpMethod = $_SERVER['REQUEST_METHOD'];
    }

    public function getMethod(): string
    {
        return $this->httpMethod;
    }

    public function withMethod(string $method): RequestInterface
    {
        
    }

    public function getUri(): UriInterface
    {
        
    }

    public function withUri(UriInterface $uri, bool $preserveHost = false): RequestInterface
    {
        
    }

    public function getProtocolVersion(): string
    {
        
    }

    public function withProtocolVersion(string $version): MessageInterface
    {
        
    }

    public function getHeaders(): array
    {
        
    }

    public function hasHeader(string $name): bool
    {
        
    }

    public function getHeader(string $name): array
    {
        
    }
    
    public function getHeaderLine(string $name): string
    {
        
    }

    public function withHeader(string $name, $value): MessageInterface
    {
        
    }

    public function withAddedHeader(string $name, $value): MessageInterface
    {
        
    }

    public function withoutHeader(string $name): MessageInterface
    {
        
    }

    public function getBody(): StreamInterface
    {
        
    }

    public function withBody(StreamInterface $body): MessageInterface
    {
        
    }
}