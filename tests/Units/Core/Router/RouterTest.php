<?php

namespace Tests\Units\Core\Router;

use Core\Router\Route;
use Core\Router\Router;
use Tests\TestCase;

class RouterTest extends TestCase
{
    public function test_get_singleton_should_return_the_same_object(): void
    {
        $rOne = Router::getInstance();
        $rTwo = Router::getInstance();

        $this->assertSame($rOne, $rTwo);
    }

    public function test_should_not_be_able_to_clone_router(): void
    {
        $rOne = Router::getInstance();

        $this->expectException(\Error::class);
        $rTwo = clone $rOne;
    }

    public function test_should_not_be_able_to_instantiate_router(): void
    {
        $this->expectException(\Error::class);
        /** @phpstan-ignore-next-line */
        $r = new Router();
    }

    public function test_should_be_possible_to_add_route_to_router(): void
    {
        $router = Router::getInstance();
        $router->addRoute(new Route('GET', '/test', MockController::class, 'action'));

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/test';

        $output = $this->getOutput(function () use ($router) {
            $this->assertInstanceOf(MockController::class, $router->dispatch());
        });
        $this->assertEquals('Action Called', $output);
    }

    public function test_should_not_dispatch_if_route_does_not_match(): void
    {
        $router = Router::getInstance();
        $router->addRoute(new Route('GET', '/test', MockController::class, 'action'));

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/not-found';


        $output = $this->getOutput(function () use ($router) {
            $this->assertFalse($router->dispatch());
        });
        $this->assertEmpty($output);
    }

    public function test_should_return_a_route_after_add(): void
    {
        $router = Router::getInstance();
        $route = $router->addRoute(new Route('GET', '/test', MockController::class, 'action'));

        $this->assertInstanceOf(Route::class, $route);
    }

    public function test_should_get_route_path_by_name(): void
    {
        $router = Router::getInstance();
        $router->addRoute(new Route('GET', '/test', MockController::class, 'action'))->name('test');
        $router->addRoute(new Route('GET', '/test-1', MockController::class, 'action'))->name('test.one');

        $this->assertEquals('/test', $router->getRoutePathByName('test'));
        $this->assertEquals('/test-1', $router->getRoutePathByName('test.one'));
    }

    public function tes_should_return_an_exception_if_the_name_does_not_exist(): void
    {
        $router = Router::getInstance();
        $router->addRoute(new Route('GET', '/test', MockController::class, 'action'))->name('test');

        $this->expectException(\Exception::class);
        $router->getRoutePathByName('not-found');
    }
}
