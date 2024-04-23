<?php

namespace Tests\Unit;

use App\Repositories\GreetRepository;
use App\Services\GreetService;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $mock = mock(GreetRepository::class);
        $spy = spy(GreetRepository::class);
        $mock->shouldReceive('getName')->andReturn("hoge");
        $service = new GreetService($mock);
        $service2 = new GreetService($spy);
        $service2->greet();
        $spy->shouldHaveReceived('getName');
        $service->greet();
        $this->assertEquals("Hellohoge",$service->greet());
        $this->assertTrue(true);
    }
    /**
     * GreetServiceクラスのgreet()が期待する文字列を返すこと.
     *
     * @return void
     */
    public function test_greetService_greet_with_mock(): void
    {
        $mock = mock(GreetRepository::class);
        $mock->shouldReceive('getName')->andReturn("hoge");
        $service = new GreetService($mock);
        $this->assertEquals("Hellohoge",$service->greet());
    }

    // テストケース2：GreetRepository の実際の動作検証
    public function test_greetRepository_getName(): void
    {
        $spy = spy(GreetRepository::class);
        $service2 = new GreetService($spy);
        $service2->greet();
        $spy->shouldHaveReceived('getName');
    }
}
