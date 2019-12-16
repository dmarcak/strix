<?php

namespace Marcak\Strix\Domain\Dto;

use Marcak\SharedKernel\Helpers\CollectionTrait;

/**
 * Class TripCollection
 *
 * @package Marcak\Strix\Domain\Dto
 */
final class TripCollection implements \Countable, \ArrayAccess, \IteratorAggregate
{
    use CollectionTrait;

    /**
     * TripCollection constructor.
     *
     * @param Trip[] $trips
     */
    public function __construct(Trip ...$trips)
    {
        $this->collection = $trips;
    }
}
