<?php

declare(strict_types=1);

namespace InvoiceApp\Http;

use Psr\Http\Message\ServerRequestInterface;

final class Request implements ServerRequestInterface
{
    public function getProtocolVersion() {}
    public function withProtocolVersion($version) {}
    public function getHeaders() {}
    public function hasHeader($name) {}
    public function getHeader($name) {}
    public function getHeaderLine($name) {}
    public function withHeader($name, $value) {}
    public function withAddedHeader($name, $value) {}
    public function withoutHeader($name) {}
    public function getBody() {}
    public function withBody(\Psr\Http\Message\StreamInterface $body) {}
    public function getRequestTarget() {}
    public function withRequestTarget($requestTarget) {}
    public function getMethod() {}
    public function withMethod($method) {}
    public function getUri() {}
    public function withUri(\Psr\Http\Message\UriInterface $uri, $preserveHost = false) {}
    public function getServerParams() {}
    public function getCookieParams() {}
    public function withCookieParams(array $cookies) {}
    public function getQueryParams() {}
    public function withQueryParams(array $query) {}
    public function getUploadedFiles() {}
    public function withUploadedFiles(array $uploadedFiles) {}
    public function getParsedBody() {}
    public function withParsedBody($data) {}
    public function getAttributes() {}
    public function getAttribute($name, $default = null) {
        if ($name === 'name') {
            return $_GET['name'] ?? null;
        }
        return null;
    }
    public function withAttribute($name, $value) {}
    public function withoutAttribute($name) {}
}