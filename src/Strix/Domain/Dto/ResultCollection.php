<?php

namespace Marcak\Strix\Domain\Dto;

use Marcak\SharedKernel\Helpers\CollectionTrait;

/**
 * Class ResultCollection
 *
 * @package Marcak\Strix\Domain\Dto
 */
final class ResultCollection implements \Countable, \ArrayAccess, \IteratorAggregate
{
    use CollectionTrait;

    /**
     * TripCollection constructor.
     *
     * @param Result ...$results
     */
    public function __construct(Result ...$results)
    {
        $this->collection = $results;
    }
}
