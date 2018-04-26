<?php

namespace GC\MainBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use GC\MainBundle\Entity\Dentist;

class ImportFromCsvCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:import-from-csv')

            // the short description shown while running "php bin/console list"
            ->setDescription('Import dentists from a csv file.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('mdr')

            ->addArgument('file')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var EntityManager $em */
        $em = $this->getContainer()->get('doctrine')->getManager();

        /** @var EntityRepository $repo */
        $repo = $this->getContainer()->get('doctrine')->getRepository(Dentist::class);

        $output->writeln(['Csv Import', '============', '',]);

        $output->writeln('Deleting existing objects...');
        $dentists = $repo->findAll();
        foreach ($dentists as $dentist)
        {
            $em->remove($dentist);
        }
        $em->flush();

        $file = $input->getArgument('file');

        $row = 0;
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                if ($row % 50 == 0)
                    $output->write($row . '... ');

                if ($row > 0)
                {
                    $dentist = new Dentist();

                    $dentist->setFirstname($data[1]);
                    $dentist->setLastname($data[2]);
                    $dentist->setEmail($data[3]);
                    if ($data[4] == 'Male')
                        $dentist->setGender(1);
                    else
                        $dentist->setGender(0);
                    $dentist->setAddress($data[5]);
                    $dentist->setCity($data[6]);
                    $dentist->setPhone($data[7]);
                    $dentist->setImage($data[8]);

                    $openings = json_decode($data[9], true);
                    if (!is_null($openings))
                    {
                        $openings = $openings[0];
                        $dentist->setHasOpenings(1);

                        $days = [['Monday', 'mon'],
                                 ['Tuesday', 'tue'],
                                 ['Wednesday', 'wed'],
                                 ['Thursday', 'thu'],
                                 ['Friday', 'fri'],
                                 ['Saturday', 'sat'],
                                 ['Sunday', 'sun']
                                ];

                        foreach ($days as $day)
                        {
                            if (array_key_exists($day[1], $openings))
                            {
                                $opening = explode(':', $openings[$day[1]]['open']);
                                $closing = explode(':', $openings[$day[1]]['close']);
                                $dentist->{'set' . $day[0] . 'Opened'}(1);
                                $dentist->{'set' . $day[0] . 'Opening'}($opening[0] * 100 + $opening[1]);
                                $dentist->{'set' . $day[0] . 'Closing'}($closing[0] * 100 + $closing[1]);
                            }
                            else
                            {
                                $dentist->{'set' . $day[0] . 'Opened'}(0);
                            }
                        }
                    }
                    else
                    {
                        $dentist->setMondayOpened(0);
                        $dentist->setTuesdayOpened(0);
                        $dentist->setWednesdayOpened(0);
                        $dentist->setThursdayOpened(0);
                        $dentist->setFridayOpened(0);
                        $dentist->setSaturdayOpened(0);
                        $dentist->setSundayOpened(0);
                        $dentist->setHasOpenings(0);
                    }

                    $dentist->setSpecialty($data[10]);

                    $em->persist($dentist);
                    $em->flush();
                }

                $row++;
            }
            fclose($handle);
            $output->write("\n");
        }

        $output->writeln(['', '============', 'Done']);
    }
}