<?php

namespace Tests\Unit\Models;

use App\Models\Problem;
use Tests\TestCase as TestsTestCase;

class ProblemTest extends TestsTestCase
{
  public function test_can_set_title()
  {
    $problem = new Problem(title: "Problem 1");

    $this->assertEquals('Problem 1', $problem->getTitle());
  }

  public function test_should_create_new_problem(){
    $problem = new Problem(title: 'Problem 1');

    $this->assertTrue($problem->save());
    $this->assertCount(1, Problem::all());
  }
}
