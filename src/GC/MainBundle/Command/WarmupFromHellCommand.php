<?php

namespace GC\MainBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use GC\MainBundle\Entity\Dentist;

class WarmupFromHellCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:warmup-from-hell')
            // the short description shown while running "php bin/console list"
            ->setDescription('Warmup the cache.')
            ->addOption('dry-run')
            ->addOption('days')
            ->addOption('lol')
            ->addOption('pages')
            ->addArgument('base-url')
            ->addOption('silent')

            // the full command description shown when running the command with
            // the "--help" option
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var EntityManager $em */
        $em = $this->getContainer()->get('doctrine')->getManager();

        /** @var EntityRepository $repo */
        $repo = $this->getContainer()->get('doctrine')->getRepository(Dentist::class);

        $router = $this->getContainer()->get('router');

        $baseUrl = $input->getArgument('base-url');

        $urls = array('', $router->generate('gc_main_search'));

        $output->writeln(['Warmup form hell', '============', '',]);

        $days = ['mon', 'tue', 'wed', 'thu', 'wed'];

        $dentists = $repo->findAll();
        $query = '';
        $searchUrl = $router->generate('gc_main_search') . '?';

        /** @var Dentist $dentist */
        foreach ($dentists as $dentist)
        {
            $address = str_replace(' ', '%20', $dentist->getAddress());
            $city = str_replace(' ', '%20', $dentist->getCity());

            $queries = array();

            $urls[] = $router->generate('gc_main_detail', array('dentist_id' => $dentist->getId()));
            $queries[] = $searchUrl . 'q=' . $dentist->getFirstname();
            $queries[] = $searchUrl . 'q=' . $dentist->getLastname();
            $queries[] = $searchUrl . 'q=' . $dentist->getFirstname() . '%20' . $dentist->getLastname();
            if ($dentist->getSpecialty())
                $queries[] = $searchUrl . 'q=' . $dentist->getSpecialty();
            $queries[] = $searchUrl . 'q=' . $address;
            $queries[] = $searchUrl . 'q=' . $city;
            $queries[] = $searchUrl . 'q=' . $address . '%20' . $city;

            if ($input->getOption('days'))
            {
                foreach ($days as $day)
                {

                    $queries[] = $searchUrl . 'q=' . $dentist->getFirstname() . '&days[]=' . $day;
                    $queries[] = $searchUrl . 'q=' . $dentist->getLastname() . '&days[]=' . $day;
                    $queries[] = $searchUrl . 'q=' . $dentist->getFirstname() . '%20' . $dentist->getLastname() . '&days[]=' . $day;
                    if ($dentist->getSpecialty())
                        $queries[] = $searchUrl . 'q=' . $dentist->getSpecialty() . '&days[]=' . $day;;
                    $queries[] = $searchUrl . 'q=' . $address . '&days[]=' . $day;;
                    $queries[] = $searchUrl . 'q=' . $city . '&days[]=' . $day;;
                    $queries[] = $searchUrl . 'q=' . $address . '%20' . $city . '&days[]=' . $day;;
                }
            }

            if ($input->getOption('pages'))
            {
                foreach ($queries as $query)
                {
                    $urls[] = $query;
                    foreach (range(2, 5) as $n)
                    {
                        $urls[] = $query . '&p=' . $n;
                    }
                }
            }
        }

        if ($input->getOption('lol'))
        {
            for ($i = 97; $i <= 122; $i++)
            {
                $urls[] = $searchUrl . 'q=' . chr($i);
                for ($j = 97; $j <= 122; $j++)
                {
                    $urls[] = $searchUrl . 'q=' . chr($i) . chr($j);
                    for ($k = 97; $k <= 122; $k++)
                    {
                        $urls[] = $searchUrl . 'q=' . chr($i) . chr($j) . chr($k);
                    }
                }
            }
        }

        $output->writeln('Start: ' . date('H:i:s'));
        $output->writeln(count($urls) . ' urls to test');

        $curl = curl_init();

        $n = 0;
        foreach ($urls as $url)
        {
            $url = $baseUrl . $url;
            $url = str_replace(' ', '%20', $url);
            if ($input->getOption('dry-run'))
            {
                if (!$input->getOption('silent'))
                {
                    $output->writeln($url);
                }
            }
            else
            {
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_exec($curl);
                $info = curl_getinfo($curl);
                if (!$input->getOption('silent'))
                {
                    $output->writeln($url . '... ' . $info['http_code']);
                }
            }

            if ($n % 500 == 0)
            {
                $output->write($n . '... ');
            }
            $n++;
        }


        curl_close($curl);

        $output->writeln('');

        $output->writeln('End: ' . date('H:i:s'));

        $output->writeln(count($urls) . ' urls generated.');

        $output->writeln(['', '============', 'Done']);
    }
}
