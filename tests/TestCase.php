<?php

namespace Tests;

use PHPUnit\Framework\TestCase as FrameworkTestCase;

require_once dirname(__DIR__) . '/core/constants/general.php';
require ROOT_PATH . '/core/debug/functions.php';

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
    $file = DATABASE_PATH . $_ENV["DB_NAME"];
    if (file_exists($file)) unlink($file);
  }
}
