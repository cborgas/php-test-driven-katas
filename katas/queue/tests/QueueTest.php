<?php

use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use PHPUnit\Framework\Attributes\Test;
use Queue\Queue;

class QueueTest extends \PHPUnit\Framework\TestCase
{
    #[Test]
    #[DoesNotPerformAssertions]
    public function can_create_queue(): void
    {
        $queue = new Queue([]);
    }

    #[Test]
    public function can_create_queue_with_item(): void
    {
        $queue = new Queue(['apple']);
        $this->assertEquals('apple', $queue->peek());
    }

    #[Test]
    public function peek_throws_exception_for_empty_queue(): void
    {
        $queue = new Queue();
        $this->expectException(UnderflowException::class);
        $queue->peek();
    }

    #[Test]
    public function can_pop_twice_from_queue(): void
    {
        $queue = new Queue(['apple', 'orange', 'banana']);
        $queue->pop();
        $this->assertEquals('orange', $queue->pop());
    }

    #[Test]
    public function pop_throws_exception_for_empty_queue(): void
    {
        $queue = new Queue();
        $this->expectException(UnderflowException::class);
        $queue->pop();
    }

    #[Test]
    public function can_peek_and_pop(): void
    {
        $queue = new Queue(['apple', 'orange', 'banana']);
        $queue->pop();
        $queue->pop();
        $this->assertEquals('banana', $queue->peek());
        $this->assertEquals('banana', $queue->pop());
    }
    
    #[Test]
    public function can_push_and_pop(): void
    {
        $queue = new Queue(['a', 'b', 'c']);
        $queue->push('d');

        foreach (range(1, 3) as $i) {
            $queue->pop();
        }

        $this->assertEquals('d', $queue->pop());
    }
}