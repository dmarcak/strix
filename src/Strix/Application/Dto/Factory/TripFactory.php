<?php

namespace Marcak\Strix\Application\Dto\Factory;


use Marcak\Strix\Application\Dto\Trip;
use Marcak\Strix\Domain\Dto\Result;

/**
 * Class TripFactory
 *
 * @package Marcak\Strix\Application\Dto\Factory
 */
class TripFactory
{
    /**
     * @param Result $result
     * @return Trip
     */
    public static function createFromResult(Result $result): Trip
    {
        return new Trip(
            $result->getTripName(),
            $result->getDistance(),
            $result->getInterval(),
            $result->getAverageSpeed()
        );
    }
}
