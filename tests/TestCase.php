<?php

namespace Tests;

use Core\Constants\Constants;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

class TestCase extends FrameworkTestCase
{
    public function setup(): void
    {
        echo "I";
        $this->clearDatabase();
    }

    public function tearDown(): void
    {
        echo "F";
        $this->clearDatabase();
    }

    private function clearDatabase(): void
    {
        $file = Constants::databasePath()->join($_ENV["DB_NAME"]);
        if (file_exists($file)) {
            unlink($file);
        }
    }
}
