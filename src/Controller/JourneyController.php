<?php

namespace App\Controller;

use App\Entity\Journey;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class JourneyController extends AbstractController
{
    /**
     * @Route("/journey", name="journey_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $journeys = $em->getRepository(Journey::class)->findAll();

        return $this->render('journey/index.html.twig', ["journeys" => $journeys]);
    }
}
