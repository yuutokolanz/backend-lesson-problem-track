<?php

namespace Tests\Units\Models;

use App\Models\Problem;
use Tests\TestCase as TestsTestCase;

class ProblemTest extends TestsTestCase
{
    public function test_can_set_title(): void
    {
        $problem = new Problem(title: "Problem 1");

        $this->assertEquals('Problem 1', $problem->getTitle());
    }

    public function test_should_create_new_problem(): void
    {
        $problem = new Problem(title: 'Problem 1');

        $this->assertTrue($problem->save());
        $this->assertCount(1, Problem::all());
    }
}
