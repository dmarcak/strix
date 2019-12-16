<?php

namespace Marcak\Strix\UI\Cli;

use Marcak\Strix\Application\Calculator\TripCalculator;
use Marcak\Strix\Application\Dto\Trip;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CalculateCommand extends Command
{
    /**
     * @var TripCalculator
     */
    private $tripCalculator;

    /**
     * CalculateCommand constructor.
     *
     * @param TripCalculator $tripCalculator
     */
    public function __construct(TripCalculator $tripCalculator)
    {
        parent::__construct('app:trips');

        $this->tripCalculator = $tripCalculator;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $table = new Table($output);
            $table->setHeaders(['trip', 'distance', 'measure interval', 'avg speed']);

            /** @var Trip[] $result */
            $result = $this->tripCalculator->getTrips();

            foreach ($result as $trip) {
                $table->addRow([
                    $trip->getName(),
                    $trip->getDistance(),
                    $trip->getMeasureInterval(),
                    $trip->getAverageSpeed()
                ]);
            }

            $table->render();

        } catch (\Exception $exception) {
            $io->error($exception->getMessage());
        }

        return 0;
    }
}
