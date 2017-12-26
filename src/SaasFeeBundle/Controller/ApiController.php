<?php
/**
 * @author JKetelaar
 */

namespace SaasFeeBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ApiController
 * @package SaasFeeBundle\Controller
 *
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @param Request $request
     *
     * @Route("/lines", name="get_lines")
     * @return JsonResponse
     */
    public function linesAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('SaasFeeBundle:Line');
        $lines = $repository->findAll();
        $response = [];
        foreach ($lines as $line) {
            $stops = [];
            foreach ($line->getStops() as $stop) {
                $stops[] = [
                    'name' => $stop->getStop()->getName(),
                    'lat' => $stop->getStop()->getLatitude(),
                    'lon' => $stop->getStop()->getLongitude(),
                    'order' => $stop->getStopOrder(),
                ];
            }
            $response[] = ['name' => $line->getName(), 'line' => 'Line '.$line->getNumber(), 'stops' => $stops];
        }

        return new JsonResponse($response);
    }
}
