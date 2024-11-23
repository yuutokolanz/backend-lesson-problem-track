<?php

namespace Tests\Unit\Controllers;

use App\Controllers\ProblemsController;
use App\Models\Problem;
use Tests\Units\Controllers\ControllerTestCase;

class ProblemsControllerTest extends ControllerTestCase
{
    public function test_list_all_problems(): void
    {
        $problems[] = new Problem(title: 'Problem 1');
        $problems[] = new Problem(title: 'Problem 2');
        foreach ($problems as $problem) {
            $problem->save();
        }

        $controller = new ProblemsController();

        $response = $this->get(action: 'index', controller: 'App\Controllers\ProblemsController');

        foreach ($problems as $problem) {
            $this->assertMatchesRegularExpression("/{$problem->getTitle()}/", $response);
        }
    }
}
