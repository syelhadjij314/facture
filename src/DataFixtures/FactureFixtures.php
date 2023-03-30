<?php

namespace App\DataFixtures;

use App\Entity\Facture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FactureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 4; $i++) {
            $facture = new Facture();
            $facture->setDateFacture(new \DateTime());
            $facture->setNumeroFacture($i);
            $facture->setIdentifiantClient($i);
            $manager->persist($facture);
        }

        $manager->flush();
    }
}
