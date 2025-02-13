<?php

use PHPUnit\Framework\TestCase;
use Collect\Collect; // Убедитесь, что класс правильно подключен

class CollectTest extends TestCase {

    public function testPop()
    {
        $collect = new Collect([123, 98, 5]);
        $collect->pop();
        $this->assertSame([123, 98], $collect->toArray());
    }

    public function testSplice()
    {
        $collect = new Collect(['a', 'b', 'c', 'd', 'e']);
        // Исправленный вызов splice: удаляем 2 элемента начиная с индекса 1
        $collect->splice(1, 2);
        $this->assertSame(['a', 'd', 'e'], $collect->toArray());
    }

    public function testKeys()
    {
        $collect = new Collect(['qwe' => 1, 'asd' => 2]);
        // Приведение к массиву на случай, если keys() возвращает объект Collect
        $this->assertSame(['qwe', 'asd'], array_values($collect->keys()->toArray()));
    }

    public function testFirst()
    {
        $collect = new Collect(['qwe' => 1, 'asd' => 2]);
        $this->assertSame(1, $collect->first());
    }
}
