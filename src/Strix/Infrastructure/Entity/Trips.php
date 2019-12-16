<?php

namespace Marcak\Strix\Infrastructure\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trips
 *
 * @ORM\Table(name="trips")
 * @ORM\Entity
 */
class Trips
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="measure_interval", type="integer", nullable=false)
     */
    private $measureInterval;

    /**
     * @var TripMeasures[]
     *
     * @ORM\OneToMany(mappedBy="trip", targetEntity="Marcak\Strix\Infrastructure\Entity\TripMeasures")
     */
    private $measures;

    /**
     * Trips constructor.
     */
    public function __construct()
    {
        $this->measures = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMeasureInterval(): int
    {
        return $this->measureInterval;
    }

    /**
     * @return TripMeasures[]
     */
    public function getMeasures(): Collection
    {
        return $this->measures;
    }
}
