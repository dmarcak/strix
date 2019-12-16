<?php

namespace Marcak\Strix\Infrastructure\Entity\Factory;

use Marcak\Strix\Domain\Dto\Distance;
use Marcak\Strix\Infrastructure\Entity\TripMeasures;

/**
 * Class DistanceFactory
 *
 * @package Marcak\Strix\Infrastructure\Entity\Factory
 */
class DistanceFactory
{
    /**
     * @param TripMeasures $measure
     * @return Distance
     */
    public static function createFromTripMeasureEntity(TripMeasures $measure)
    {
        return new Distance(
            $measure->getDistance()
        );
    }
}
