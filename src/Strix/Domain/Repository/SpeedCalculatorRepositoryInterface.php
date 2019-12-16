<?php


namespace Marcak\Strix\Domain\Repository;


use Marcak\Strix\Domain\Dto\TripCollection;

/**
 * Interface SpeedCalculatorRepositoryInterface
 *
 * @package Marcak\Strix\Domain\Repository
 */
interface SpeedCalculatorRepositoryInterface
{
    /**
     * @return TripCollection
     */
    public function findAll(): TripCollection;
}
