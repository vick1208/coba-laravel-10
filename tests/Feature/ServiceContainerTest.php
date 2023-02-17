<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testDep(){
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("Foo",$foo1->foo());
        self::assertEquals('Foo',$foo2->foo());
        self::assertNotSame($foo1,$foo2);
    }

    public function testBind()
    {
        // $person = $this->app->make(Person::class); // new Person()
        // self::assertNotNull($person);

        $this->app->bind(Person::class, function ($app){
            return new Person("Eko", "Khannedy");
        });

        $person1 = $this->app->make(Person::class); // closure() // new Person("Eko", "Khannedy");
        $person2 = $this->app->make(Person::class); // closure() // new Person("Eko", "Khannedy");

        self::assertEquals('Eko', $person1->firstName);
        self::assertEquals('Eko', $person2->firstName);
        self::assertNotSame($person1, $person2);
    }
}
