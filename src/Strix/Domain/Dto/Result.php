<?php

namespace Marcak\Strix\Domain\Dto;

/**
 * Class Result
 *
 * @package Marcak\Strix\Domain\Dto
 */
final class Result
{
    /**
     * @var string
     */
    private $tripName;

    /**
     * @var float
     */
    private $distance;

    /**
     * @var float
     */
    private $interval;

    /**
     * @var int
     */
    private $averageSpeed;

    /**
     * Trip constructor.
     *
     * @param string $tripName
     * @param float $distance
     * @param float $interval
     * @param int $averageSpeed
     */
    public function __construct(string $tripName, float $distance, float $interval, int $averageSpeed)
    {
        $this->tripName = $tripName;
        $this->distance = $distance;
        $this->interval = $interval;
        $this->averageSpeed = $averageSpeed;
    }

    /**
     * @return string
     */
    public function getTripName(): string
    {
        return $this->tripName;
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
    public function getInterval(): float
    {
        return $this->interval;
    }

    /**
     * @return int
     */
    public function getAverageSpeed(): int
    {
        return $this->averageSpeed;
    }
}
