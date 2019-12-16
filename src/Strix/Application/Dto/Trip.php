<?php

namespace Marcak\Strix\Application\Dto;

final class Trip
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $distance;

    /**
     * @var float
     */
    private $measureInterval;

    /**
     * @var int
     */
    private $averageSpeed;

    /**
     * Trip constructor.
     *
     * @param string $name
     * @param float $distance
     * @param float $measureInterval
     * @param int $averageSpeed
     */
    public function __construct(string $name, float $distance, float $measureInterval, int $averageSpeed)
    {
        $this->name = $name;
        $this->distance = $distance;
        $this->measureInterval = $measureInterval;
        $this->averageSpeed = $averageSpeed;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @return float
     */
    public function getMeasureInterval(): float
    {
        return $this->measureInterval;
    }

    /**
     * @return int
     */
    public function getAverageSpeed(): int
    {
        return $this->averageSpeed;
    }
}
