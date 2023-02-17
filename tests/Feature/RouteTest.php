<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testGet()
    {
        $this->get('/pzn')
        ->assertStatus(200)
        ->assertSeeText('Hello Programmer Zaman Now');
        $this->get('/home')
        ->assertStatus(200)
        ->assertSeeText('Ini homepage');
    }
}
