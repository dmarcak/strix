<?php

namespace Marcak\Strix\Domain\Dto;

use Marcak\SharedKernel\Helpers\CollectionTrait;

/**
 * Class DistanceCollection
 *
 * @package Marcak\Strix\Application\Dto
 */
final class DistanceCollection implements \Countable, \ArrayAccess, \IteratorAggregate
{
    use CollectionTrait;

    /**
     * DistanceCollection constructor.
     *
     * @param Distance ...$distances
     */
    public function __construct(Distance ...$distances)
    {
        $this->collection = $distances;
    }

    public function last(): ?Distance
    {
        if (empty($this->collection)) {
            return null;
        }

        return \end($this->collection);
    }
}
