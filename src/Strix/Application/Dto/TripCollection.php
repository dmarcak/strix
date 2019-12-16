<?php

namespace Marcak\Strix\Application\Dto;

use Marcak\SharedKernel\Helpers\CollectionTrait;

/**
 * Class TripCollection
 *
 * @package Marcak\Strix\Application\Dto
 */
final class TripCollection implements \Countable, \ArrayAccess, \IteratorAggregate
{
    use CollectionTrait;

    /**
     * TripCollection constructor.
     *
     * @param Trip ...$trips
     */
    public function __construct(Trip ...$trips)
    {
        $this->collection = $trips;
    }
}
