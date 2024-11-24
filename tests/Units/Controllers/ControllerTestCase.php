<?php

namespace Tests\Units\Controllers;

use Tests\TestCase;

abstract class ControllerTestCase extends TestCase
{
    public function get(string $action, string $controller): string
    {
        $controller = new $controller();

        ob_start();
        try {
            $controller->$action();
            return ob_get_contents();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            ob_end_clean();
        }
    }
}
