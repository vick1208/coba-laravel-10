<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class LoggingTest extends TestCase
{
    public function testLogging(){
        Log::info("This is Info");
        Log::warning("This is Warning");
        Log::error("This is Error");
        Log::critical("This is Critical");

        assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hello Info", ["user" => "khannedy"]);
        Log::info("Hello Info", ["user" => "khannedy"]);
        Log::info("Hello Info", ["user" => "khannedy"]);

        assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(["user" => "khannedy"]);

        Log::info("Hello Info");
        Log::info("Hello Info");
        Log::info("Hello Info");

        assertTrue(true);
    }
}
