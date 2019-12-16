<?php

namespace Marcak\Strix\Domain\Dto;

/**
 * Class Trip
 *
 * @package Marcak\Strix\Domain\Dto
 */
final class Trip
{
    /**
     * @var
     */
    private $name;

    /**
     * @var float
     */
    private $measureInterval;

    /**
     * @var DistanceCollection
     */
    private $distances;

    /**
     * Trip constructor.
     *
     * @param $name
     * @param float $measureInterval
     * @param DistanceCollection $distances
     */
    public function __construct($name, float $measureInterval, DistanceCollection $distances)
    {
        $this->name = $name;
        $this->measureInterval = $measureInterval;
        $this->distances = $distances;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getMeasureInterval(): float
    {
        return $this->measureInterval;
    }

    /**
     * @return DistanceCollection
     */
    public function getDistances(): DistanceCollection
    {
        return $this->distances;
    }
}
