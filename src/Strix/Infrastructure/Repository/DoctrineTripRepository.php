<?php

namespace Marcak\Strix\Infrastructure\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Marcak\Strix\Domain\Dto\TripCollection;
use Marcak\Strix\Domain\Repository\SpeedCalculatorRepositoryInterface;
use Marcak\Strix\Infrastructure\Entity\Factory\TripFactory;

class DoctrineTripRepository implements SpeedCalculatorRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * DoctrineTripRepository constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): TripCollection
    {
        $qb = $this->entityManager->createQueryBuilder();
        $query = $qb->select('t')
            ->from('Strix:Trips', 't')
            ->getQuery();

        $result = $query->execute();

        $trips = new TripCollection();

        foreach ($result as $tripEntity) {
            $trips[] = TripFactory::createFromTripEntity($tripEntity);
        }

        return $trips;
    }
}
