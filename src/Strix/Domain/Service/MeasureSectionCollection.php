<?php

namespace Marcak\Strix\Domain\Service;

use Marcak\SharedKernel\Helpers\CollectionTrait;

/**
 * Class MeasureSectionCollection
 *
 * @package Marcak\Strix\Domain\Service
 */
final class MeasureSectionCollection implements \Countable, \ArrayAccess, \IteratorAggregate
{
    use CollectionTrait;

    /**
     * MeasureSectionCollection constructor.
     *
     * @param MeasureSection ...$sections
     */
    public function __construct(MeasureSection ...$sections)
    {
        $this->collection = $sections;
    }

    /**
     * @return MeasureSection|null
     */
    public function getSectionWithMaximumAverageSpeed(): ?MeasureSection
    {
        /** @var MeasureSection|null $maximumSpeedSection */
        $maximumSpeedSection = null;

        foreach ($this->collection as $measureSection) {
            $averageSpeed = $measureSection->getAverageSpeed();

            if ($maximumSpeedSection === null || $maximumSpeedSection->getAverageSpeed() < $averageSpeed) {
                $maximumSpeedSection = $measureSection;
            }
        }

        return $maximumSpeedSection;
    }
}
