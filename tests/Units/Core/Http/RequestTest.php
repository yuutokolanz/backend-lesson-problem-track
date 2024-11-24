<?php

namespace Tests\Units\Core\HTTP;

use Core\Constants\Constants;
use Core\HTTP\Request;
use Tests\TestCase;

class RequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        require_once Constants::rootPath()->join('tests/Units/Core/HTTP/header_mock.php');
    }

    public function test_should_return_request_method(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/test';
        $request = new Request();
        $this->assertEquals('GET', $request->getMethod());
    }

    public function test_should_return_uri(): void
    {
        $_SERVER['REQUEST_URI'] = '/test';
        $request = new Request();
        $this->assertEquals('/test', $request->getUri());
    }

    public function test_should_return_params(): void
    {
        $_REQUEST = ['name' => 'test'];
        $request = new Request();
        $this->assertEquals(['name' => 'test'], $request->getParams());
    }

    public function test_should_return_header(): void
    {
        $request = new Request();
        $this->assertEquals(getallheaders(), $request->getHeaders());
    }
}
