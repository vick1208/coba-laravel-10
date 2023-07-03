<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class EnviromentTest extends TestCase
{
   public function testGetEnv(){
    $youtube = env('YOUTUBE');

    assertEquals('Programmer Zaman Now',$youtube);
   }
   public function testDefaultEnv(){
    $author = Env::get('AUTHOR','Eko');

    assertEquals('Eko',$author);
   }
}
