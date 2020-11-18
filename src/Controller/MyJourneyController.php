<?php

namespace App\Controller;

use App\Entity\Journey;
use App\Form\JourneyFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MyJourneyController extends AbstractController
{
    /**
     * @Route("/my/journey", name="my_journey_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $journeys = $em
            ->getRepository(Journey::class)
            ->findBy(["owner" => $this->getUser()]);

        return $this->render("my_journey/index.html.twig", ["journeys" => $journeys]);
    }

    /**
     * @Route("/my/journey/add", name="my_journey_add")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function addAction(Request $request)
    {
        $journey = new Journey();

        $form = $this->createForm(JourneyFormType::class, $journey);

        if ($request->isMethod('post')){
            $form->handleRequest($request);

            $journey
                ->setOwner($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($journey);
            $em->flush();

            return $this->render('my_journey/index.html.twig');
        }


        return $this->render('my_journey/add.html.twig', ["form" => $form->createView()]);
    }

    /**
     * @Route("/my/journey/edit/{id}", name="my_journey_edit")
     *
     * @param Request $request
     * @param Journey $journey
     *
     * @return Response
     */
    public function editAction(Request $request, Journey $journey)
    {
        $form = $this->createForm(JourneyFormType::class, $journey);

        if ($request->isMethod('post')){
            $form->handleRequest($request);

            $journey
                ->setOwner($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($journey);
            $em->flush();

            return $this->render('my_journey/index.html.twig');
        }


        return $this->render('my_journey/add.html.twig', ["form" => $form->createView()]);
    }


}
