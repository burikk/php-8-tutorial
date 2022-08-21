<?php

namespace App\Model\Transaction;

use App\Model\Collection;
use Traversable;

class TransactionCollection extends Collection //implements \IteratorAggregate//\Iterator
{
//more control with \Iterator
//    public function current(): mixed
//    {
//        echo __METHOD__ . PHP_EOL;
//        return current($this->transactions);
//    }
//
//    public function next(): void
//    {
//        echo __METHOD__ . PHP_EOL;
//        next($this->transactions);
//    }
//
//    public function key(): mixed
//    {
//        echo __METHOD__ . PHP_EOL;
//        return key($this->transactions);
//    }
//
//    public function valid(): bool
//    {
//        echo __METHOD__ . PHP_EOL;
//        return current($this->transactions) !== false;
//    }
//
//    public function rewind(): void
//    {
//        echo __METHOD__ . PHP_EOL;
//        reset($this->transactions);
//    }
//less methods with \IteratorAggregate
//    public function getIterator(): Traversable
//    {
//        return new \ArrayIterator($this->transactions);
//    }
}