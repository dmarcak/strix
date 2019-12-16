<?php

namespace Marcak\Strix\Domain\Dto;

/**
 * Class Distance
 *
 * @package Marcak\Strix\Domain\Dto
 */
final class Distance
{
    /**
     * @var float
     */
    private $value;

    /**
     * Distance constructor.
     *
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
