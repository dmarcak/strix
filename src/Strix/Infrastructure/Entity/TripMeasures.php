<?php

namespace Marcak\Strix\Infrastructure\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TripMeasures
 *
 * @ORM\Table(name="trip_measures")
 * @ORM\Entity
 */
class TripMeasures
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="trip_id", type="integer", nullable=false)
     */
    private $tripId;

    /**
     * @var string
     *
     * @ORM\Column(name="distance", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $distance;

    /**
     * @var Trips
     *
     * @ORM\ManyToOne(inversedBy="measures", targetEntity="Marcak\Strix\Infrastructure\Entity\Trips")
     */
    private $trip;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTripId(): int
    {
        return $this->tripId;
    }

    /**
     * @return string
     */
    public function getDistance(): string
    {
        return $this->distance;
    }

    /**
     * @return Trips
     */
    public function getTrip(): Trips
    {
        return $this->trip;
    }
}
