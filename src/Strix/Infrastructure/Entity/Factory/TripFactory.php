<?php

namespace Marcak\Strix\Infrastructure\Entity\Factory;

use Marcak\Strix\Domain\Dto\DistanceCollection;
use Marcak\Strix\Domain\Dto\Trip;
use Marcak\Strix\Infrastructure\Entity\TripMeasures;
use Marcak\Strix\Infrastructure\Entity\Trips;

/**
 * Class TripFactory
 *
 * @package Marcak\Strix\Infrastructure\Entity\Factory
 */
class TripFactory
{
    /**
     * @param Trips $entity
     * @return Trip
     */
    public static function createFromTripEntity(Trips $entity): Trip
    {
        $distances = new DistanceCollection();

        /** @var TripMeasures $measure */
        foreach($entity->getMeasures() as $measure) {
            $distances[] = DistanceFactory::createFromTripMeasureEntity($measure);
        }

        return new Trip(
            $entity->getName(),
            $entity->getMeasureInterval(),
            $distances
        );
    }
}
