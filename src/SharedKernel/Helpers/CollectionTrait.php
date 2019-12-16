<?php


namespace Marcak\SharedKernel\Helpers;


use Traversable;

trait CollectionTrait
{
    /**
     * @var array
     */
    private $collection;

    /**
     * @var Traversable
     */
    private $iterator;

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        if ($this->iterator === null) {
            $this->iterator = new \ArrayIterator($this->collection);
        }

        return $this->iterator;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->collection[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->collection[$offset] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->collection[] = $value;
        } else {
            $this->collection[$offset] = $value;
        }
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->collection[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return \count($this->collection);
    }
}
