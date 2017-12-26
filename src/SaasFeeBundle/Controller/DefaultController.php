<?php
/**
 * @author JKetelaar
 */
namespace SaasFeeBundle\Controller;

use SaasFeeBundle\Entity\Stop;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package SaasFeeBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

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
        foreach ($lines as $line){
            $stops = [];
            foreach ($line->getStops() as $stop){
                $stops[] = ['name' => $stop->getStop()->getName(), 'lat' => $stop->getStop()->getLatitude(), 'lon' => $stop->getStop()->getLongitude()];
            }
            $response[] = ['name' => $line->getName(), 'line' => 'Line ' . $line->getNumber(), 'stops' => $stops];
        }

        return new JsonResponse($response);
    }
}
