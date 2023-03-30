<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FactureController extends AbstractController
{
    #[Route('/facture', name: 'app_facture')]

    public function index(): Response
    {
        $factures = $this->getDoctrine()->getRepository(Facture::class)->findAll();

        return $this->render('facture/index.html.twig', [
            'factures' => $factures,
        ]);
    }
}
