<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfig()
    {
        $firstName = config('contoh.author.first');
        $lastName = config('contoh.author.last');
        $email = config('contoh.email');
        $app = config('app.name');

        self::assertEquals('Laravel',$app);
        self::assertEquals('Vicky',$firstName);
        self::assertEquals('Susanto',$lastName);
        self::assertEquals('vickyhuang808@gmail.com',$email);
    }
}
