<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


Class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     */

    public function index() : Response
    {
        return $this->render('wild/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }


    /**
     * @Route("/wild/show/{page<[a-z0-9-]+$>}", name="wild_show", defaults={"page"="Aucune série sélectionnée, veuillez choisir une série"})
     * @param string $page
     * @return Response
     */

    public function show(string $page): Response
    {
        $page = str_replace('-', ' ', $page);
        $page = ucwords($page);
        return $this->render('wild/show.html.twig', ['page' => $page]);
    }
}


