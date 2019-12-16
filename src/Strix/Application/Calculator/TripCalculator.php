<?php

namespace Marcak\Strix\Application\Calculator;


use Marcak\Strix\Application\Dto\Factory\TripCollectionFactory;
use Marcak\Strix\Application\Dto\TripCollection;
use Marcak\Strix\Domain\Service\TripMaximumAverageSpeedCalculator;

/**
 * Class MaximumAverageSpeedCalculator
 *
 * @package Marcak\Strix\Application\Calculator
 */
class TripCalculator
{
    /**
     * @var TripMaximumAverageSpeedCalculator
     */
    private $calculator;

    /**
     * MaximumAverageSpeedCalculator constructor.
     *
     * @param TripMaximumAverageSpeedCalculator $calculator
     */
    public function __construct(TripMaximumAverageSpeedCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * @return TripCollection
     */
    public function getTrips(): TripCollection
    {
        return TripCollectionFactory::createFromResultCollection(
            $this->calculator->calculateTrips()
        );
    }
}
