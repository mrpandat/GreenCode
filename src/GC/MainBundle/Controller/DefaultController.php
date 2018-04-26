<?php

namespace GC\MainBundle\Controller;

use GC\MainBundle\Entity\Dentist;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GC\MainBundle\Repository\DentistRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    const AVAILABLE_OPEN_DAYS = array(
        'mon' => 'monday',
        'tue' => 'tuesday',
        'wed' => 'wednesday',
        'thu' => 'thursday',
        'fri' => 'friday',
        'sat' => 'saturday',
        'sun' => 'sunday'
    );

    const AVAILABLE_SPECIALIZATIONS = array(
        'dph' => 'Dental Public Health',
        'end' => 'Endodontics',
        'omp' => 'Oral and Maxillofacial Pathology',
        'omr' => 'Oral and Maxillofacial Radiology',
        'oms' => 'Oral and Maxillofacial Surgery',
        'odo' => 'Orthodontics and Dentofacial Orthopedics',
        'pd'  => 'Pediatric Dentistry',
        'per' => 'Periodontics',
        'pro' => 'Prosthodontics'
    );

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('GCMainBundle:Default:index.html.twig');
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchAction(Request $request)
    {
        $query          = $request->query->get('q');
        $page           = intval($request->query->get('p', 1));
        $openDays       = $request->query->get('days');
        $specialization = $request->query->get('spec');

        $page = $page > 0 ? $page : 1;

        $openDays = $openDays && is_array($openDays) ? $openDays : array();

        $openDays = !empty($openDays) ? array_values(
            array_intersect_key(self::AVAILABLE_OPEN_DAYS, array_flip($openDays))
        ) : array();

        $specializations = self::AVAILABLE_SPECIALIZATIONS;

        $specialization = is_string($specialization) ? $specialization : null;
        $specialization = isset($specializations[$specialization]) ? $specialization : null;

        $dentistRepository = $this->getDoctrine()->getRepository(Dentist::class);

        $results = $dentistRepository->searchFromCriteria($this->get('memcache.default'), $query, $page, $openDays,
            $specialization);

        $resultsCount = $this->get('memcache.default')->get($query . '-' . $page . '-' . implode(';',
                $openDays) . '-' . $specialization . '-count');

        $maxPage = ceil($resultsCount / DentistRepository::RESULTS_PER_PAGE);

        $dentists = $this->get('session')->get('dentists');
        if (!$dentists)
            $dentists = array();

        return $this->render('GCMainBundle:Default:search.html.twig', compact(
            'results', 'resultsCount', 'query', 'page', 'maxPage', 'dentists'
        ));
    }

    /**
     * @param Request $request
     *
     * @param         $dentist_id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction(Request $request, $dentist_id)
    {
        $dentistRepository = $this->getDoctrine()->getRepository(Dentist::class);

        $dentist = $this->get('memcache.default')->get($dentist_id);
        if ($dentist === false) {
            $dentist = $dentistRepository->find($dentist_id);
            if (!$dentist || !$dentist->getId())
                throw new NotFoundHttpException();
            $this->get('memcache.default')->set($dentist_id, $dentist, 0, 345600);
        }

        $dentists = $this->get('session')->get('dentists');
        if (!$dentists)
            $dentists = array();

        if (!isset($dentists[$dentist->getId()]))
            $dentists[$dentist->getId()] = $dentist->getFirstname() . ' ' . $dentist->getLastname();

        $this->get('session')->set('dentists', $dentists);

        return $this->render('GCMainBundle:Default:detail.html.twig', array(
            'dentist' => $dentist
        ));
    }
}
