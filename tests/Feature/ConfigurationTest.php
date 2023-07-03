<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class ConfigurationTest extends TestCase
{
    public function testConfig()
    {
        $firstName = config('contoh.author.first');
        $lastName = config('contoh.author.last');
        $email = config('contoh.email');
        $app = config('app.name');

        assertEquals('Laravel',$app);
        assertEquals('Vicky',$firstName);
        assertEquals('Susanto',$lastName);
        assertEquals('vickyhuang808@gmail.com',$email);
    }
}
