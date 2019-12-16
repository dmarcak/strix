<?php

namespace Marcak\Strix\Tests\Domain\Service;

use Marcak\Strix\Domain\Dto\Distance;
use Marcak\Strix\Domain\Dto\DistanceCollection;
use Marcak\Strix\Domain\Dto\Trip;
use Marcak\Strix\Domain\Dto\TripCollection;
use Marcak\Strix\Domain\Dto\Result;
use Marcak\Strix\Domain\Repository\SpeedCalculatorRepositoryInterface;
use Marcak\Strix\Domain\Service\TripMaximumAverageSpeedCalculator;
use PHPUnit\Framework\TestCase;

class MaximumAverageSpeedCalculatorTest extends TestCase
{
    public function testCalculateMaximumAverageSpeed()
    {
        $givenTrips = new TripCollection(
            new Trip(
                'Trip 1',
                15,
                new DistanceCollection(
                    new Distance(0.0),
                    new Distance(0.19),
                    new Distance(0.5),
                    new Distance(0.75),
                    new Distance(1.0),
                    new Distance(1.25),
                    new Distance(1.5),
                    new Distance(1.75),
                    new Distance(2.0),
                    new Distance(2.25)
                )
            )
        );

        $expectedTripName = 'Trip 1';
        $expectedDistance = 2.25;
        $expectedMeasureInterval = 15;
        $expectedAverageSpeed = 74;



        $repository = $this->getMockBuilder(SpeedCalculatorRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $repository->expects($this->once())
            ->method('findAll')
            ->willReturn($givenTrips);

        $calculator = new TripMaximumAverageSpeedCalculator($repository);
        $results = $calculator->calculateTrips();



        $this->assertCount(1, $results);
        $this->assertEquals($expectedTripName, $results[0]->getTripName());
        $this->assertEquals($expectedDistance, $results[0]->getDistance());
        $this->assertEquals($expectedMeasureInterval, $results[0]->getInterval());
        $this->assertEquals($expectedAverageSpeed, $results[0]->getAverageSpeed());
    }
}
