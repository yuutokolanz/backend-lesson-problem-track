<?php

namespace Tests;

use PHPUnit\Framework\TestCase as FrameworkTestCase;

require '/var/www/core/debug/functions.php';

class TestCase extends FrameworkTestCase
{
  public function setup(): void {
    echo "I";
    $this->clearDatabase();
  }

  public function tearDown() : void {
    echo "F";
    $this->clearDatabase();
  }

  private function clearDatabase() {
    $file = '/var/www/database/'. $_ENV["DB_NAME"];
    if (file_exists($file)) unlink($file);
  }
}
