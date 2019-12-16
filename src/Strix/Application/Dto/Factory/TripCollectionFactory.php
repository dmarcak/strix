<?php

namespace Marcak\Strix\Application\Dto\Factory;

use Marcak\Strix\Application\Dto\TripCollection;
use Marcak\Strix\Domain\Dto\ResultCollection;

/**
 * Class TripCollectionFactory
 *
 * @package Marcak\Strix\Application\Dto\Factory
 */
class TripCollectionFactory
{
    /**
     * @param ResultCollection $resultCollection
     * @return TripCollection
     */
    public static function createFromResultCollection(ResultCollection $resultCollection): TripCollection
    {
        $collection = new TripCollection();

        foreach($resultCollection as $result) {
            $collection[] = TripFactory::createFromResult($result);
        }

        return $collection;
    }
}
