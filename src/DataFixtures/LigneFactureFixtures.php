<?php

namespace App\DataFixtures;

use App\Entity\Facture;
use App\Entity\LigneFacture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;
use Doctrine\Persistence\ObjectManager;

class LigneFactureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $factures = $manager->getRepository(Facture::class)->findAll();

        foreach($factures as $facture) {
            $ligneFacture = new LigneFacture();
            $ligneFacture->setFacture($facture);
            $ligneFacture->setDescription('Lorem ipsum dolor sit amet');
            $ligneFacture->setQuantite(2);
            $ligneFacture->setMontant(10.99);
            $ligneFacture->setMontantTva(2.32);
            $ligneFacture->setTotalTva(25.30);

            $manager->persist($ligneFacture);
        }

        $manager->flush();
    }
}
