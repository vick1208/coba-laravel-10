<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotSame;
use function PHPUnit\Framework\assertSame;

class ServiceContainerTest extends TestCase
{
    public function testDep()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        assertEquals("Foo", $foo1->foo());
        assertEquals('Foo', $foo2->foo());
        assertNotSame($foo1, $foo2);
    }

    public function testBind()
    {
        $this->app->bind(Person::class, function ($app) {
            return new Person("Eko", "Khannedy");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Eko', $person1->firstName);
        self::assertEquals('Eko', $person2->firstName);
        self::assertNotSame($person1, $person2);
    }
    public function testSingleton()
    {
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Vicky", "Susanto");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        $person3 = $this->app->make(Person::class);
        $person4 = $this->app->make(Person::class);

        self::assertEquals('Vicky', $person1->firstName);
        self::assertEquals('Vicky', $person2->firstName);


        assertSame($person1, $person2);
        self::assertSame($person3, $person4);
    }

    public function testInstance()
    {
        $person = new Person("Vicky", "Susanto");
        $this->app->instance(Person::class, $person);
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        $person3 = $this->app->make(Person::class);
        $person4 = $this->app->make(Person::class);

        self::assertEquals('Vicky', $person1->firstName);
        self::assertEquals('Vicky', $person2->firstName);
        self::assertSame($person1, $person2);
    }
    public function testDependencyInjection()
    {

        $this->app->singleton(Foo::class,function ($app){
            return new Foo();
        });
        $this->app->singleton(Bar::class,function($app){
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo,$bar1->foo);

        self::assertSame($bar1,$bar2);
    }
}
