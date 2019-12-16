<?php

namespace Marcak\Strix\Domain\Service;

use Marcak\Strix\Domain\Dto\Distance;
use Marcak\Strix\Domain\Dto\DistanceCollection;
use Marcak\Strix\Domain\Dto\Trip;
use Marcak\Strix\Domain\Dto\Result;
use Marcak\Strix\Domain\Dto\ResultCollection;
use Marcak\Strix\Domain\Repository\SpeedCalculatorRepositoryInterface;

class TripMaximumAverageSpeedCalculator
{
    /**
     * @var SpeedCalculatorRepositoryInterface
     */
    private $repository;

    /**
     * MaximumAverageSpeedCalculator constructor.
     *
     * @param SpeedCalculatorRepositoryInterface $repository
     */
    public function __construct(SpeedCalculatorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function calculateTrips(): ResultCollection
    {
        $results = new ResultCollection();
        $trips = $this->repository->findAll();

        /** @var Trip $trip */
        foreach ($trips as $trip) {
            $distances = $trip->getDistances();

            $tripName = $trip->getName();
            $measureInterval = $trip->getMeasureInterval();
            $distance = 0;
            $averageSpeed = 0;

            if (count($distances) > 1) {
                $sections = $this->extractSections($distances, $measureInterval);
                $sectionWithMaximumSpeed = $sections->getSectionWithMaximumAverageSpeed();

                $distance = $distances->last()->getValue();
                $averageSpeed = \floor($sectionWithMaximumSpeed->getAverageSpeed());
            }

            $results[] = new Result($tripName, $distance, $measureInterval, $averageSpeed);
        }

        return $results;
    }

    /**
     * @param DistanceCollection $distances
     * @param float $interval
     * @return MeasureSectionCollection
     */
    private function extractSections(DistanceCollection $distances, float $interval): MeasureSectionCollection
    {
        $sections = new MeasureSectionCollection();

        /** @var Distance $lastDistance */
        foreach ($distances as $key => $lastDistance) {
            if (!isset($distances[$key + 1])) {
                break;
            }

            $startDistance = $lastDistance->getValue();
            $stopDistance = $distances[$key + 1]->getValue();
            $averageSpeed = (3600 * \abs($startDistance - $stopDistance)) / $interval;

            $sections[] = new MeasureSection($startDistance, $startDistance, $averageSpeed);
        }

        return $sections;
    }
}
