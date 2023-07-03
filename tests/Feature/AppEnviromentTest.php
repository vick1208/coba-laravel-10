<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class AppEnviromentTest extends TestCase
{
    public function testAppEnv()
    {

        if(App::environment(['testing', 'prod', 'dev'])){
            // kode program kita
            assertTrue(true);
        }
    }
}
