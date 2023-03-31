<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Form\FactureType;
use App\Form\LigneFactureType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
    /**
     * @Route("/facture/create", name="facture_create")
     */
    public function create(Request $request): Response
    {
        $facture = new Facture();

        $form = $this->createFormBuilder($facture)
            ->add('dateFacture', DateType::class)
            ->add('numeroFacture', IntegerType::class)
            ->add('identifiantClient', IntegerType::class)
            ->add('ligneFacture', CollectionType::class, [
                'entry_type' => LigneFactureType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])

            ->add('save', SubmitType::class, ['label' => 'Create Facture'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facture = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();

            return $this->redirectToRoute('facture_index');
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $ligneFacture = $form->get('ligneFacture')->getData();

            foreach ($ligneFacture as $ligneFacture) {
                $facture->addLigneFacture($ligneFacture);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();

            return $this->redirectToRoute('facture_index');
        }

        return $this->render('facture/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
