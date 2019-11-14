<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Niveux;
use App\Entity\Offre;
use App\Entity\TypeEmploi;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OffreFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 1; $i++) {
            $emploi1= new TypeEmploi();
            $emploi1->setNom(" Full time");
            $manager->persist($emploi1);
            $manager->flush();
        }

        for ($i = 0; $i < 1; $i++) {
            $emploi2= new TypeEmploi();
            $emploi2->setNom(" NTERN");
            $manager->persist($emploi2);
            $manager->flush();
        }

        for ($i = 0; $i < 1; $i++) {
            $emploi3= new TypeEmploi();
            $emploi3->setNom(" PART TIME");
            $manager->persist($emploi3);
            $manager->flush();
        }


        for ($i = 0; $i < 10; $i++) {
            $ville= new Ville();
            $ville->setVille($faker->city);
            $manager->persist($ville);
            $manager->flush();
        }







        for ($i = 0; $i < 1; $i++) {
            $cateory1 = new Category();
            $cateory1->setNom("Development");
            $manager->persist( $cateory1);
            $manager->flush();
        }
        for ($i = 0; $i < 1; $i++) {
            $cateory2 = new Category();
            $cateory2->setNom("Accounting");
            $manager->persist( $cateory2);
            $manager->flush();
        }

        for ($i = 0; $i < 1; $i++) {
            $cateory3 = new Category();
            $cateory3->setNom("Technology");
            $manager->persist( $cateory3);
            $manager->flush();
        }

        for ($i = 0; $i < 1; $i++) {
            $cateory4 = new Category();
            $cateory4->setNom("Media & News");
            $manager->persist( $cateory4);
            $manager->flush();
        }
        for ($i = 0; $i < 1; $i++) {
            $cateory5 = new Category();
            $cateory5->setNom("Medical");
            $manager->persist( $cateory5);
            $manager->flush();
        }

        for ($i = 0; $i < 1; $i++) {
            $cateory6 = new Category();
            $cateory6->setNom("Goverment");
            $manager->persist( $cateory6);
            $manager->flush();
        }



        for ($i = 0; $i <10; $i++) {
            $offre = new Offre();
            $offre->setCategory($cateory1);
            $offre->setTypeEmploi($emploi1);
            $offre->setDescription($faker->realText(200));
            $offre->setIntiuleDePost($faker->jobTitle);
            $offre->setLieu($faker->country);
            $offre->setTaille("PME");
            $offre->setNomEntreprise($faker->company);
            $offre->setPublishedAt($faker->dateTimeBetween('-100 days', '-1 days'));
            $manager->persist($offre);
            $manager->flush();


        }

        for ($i = 0; $i <10; $i++) {
            $offre = new Offre();
            $offre->setCategory($cateory2);
            $offre->setTypeEmploi($emploi2);
            $offre->setDescription($faker->realText(200));
            $offre->setIntiuleDePost($faker->jobTitle);
            $offre->setLieu($faker->country);
            $offre->setTaille("PME");
            $offre->setNomEntreprise($faker->company);
            $offre->setPublishedAt($faker->dateTimeBetween('-100 days', '-1 days'));
            $manager->persist($offre);
            $manager->flush();


        }
        for ($i = 0; $i <10; $i++) {
            $offre = new Offre();
            $offre->setCategory($cateory3);
            $offre->setTypeEmploi($emploi3);
            $offre->setDescription($faker->realText(200));
            $offre->setIntiuleDePost($faker->jobTitle);
            $offre->setLieu($faker->country);
            $offre->setTaille("PME");
            $offre->setNomEntreprise($faker->company);
            $offre->setPublishedAt($faker->dateTimeBetween('-100 days', '-1 days'));
            $manager->persist($offre);
            $manager->flush();


        }

        for ($i = 0; $i <10; $i++) {
            $offre = new Offre();
            $offre->setCategory($cateory4);
            $offre->setTypeEmploi($emploi1);
            $offre->setDescription($faker->realText(200));
            $offre->setIntiuleDePost($faker->jobTitle);
            $offre->setLieu($faker->country);
            $offre->setTaille("PME");
            $offre->setNomEntreprise($faker->company);
            $offre->setPublishedAt($faker->dateTimeBetween('-100 days', '-1 days'));
            $manager->persist($offre);
            $manager->flush();


        }
        for ($i = 0; $i <10; $i++) {
            $offre = new Offre();
            $offre->setCategory($cateory5);
            $offre->setTypeEmploi($emploi2);
            $offre->setDescription($faker->realText(200));
            $offre->setIntiuleDePost($faker->jobTitle);
            $offre->setLieu($faker->country);
            $offre->setTaille("PME");
            $offre->setNomEntreprise($faker->company);
            $offre->setPublishedAt($faker->dateTimeBetween('-100 days', '-1 days'));
            $manager->persist($offre);
            $manager->flush();


        }
        for ($i = 0; $i <10; $i++) {
            $offre = new Offre();
            $offre->setCategory($cateory6);
            $offre->setTypeEmploi($emploi3);
            $offre->setDescription($faker->realText(200));
            $offre->setIntiuleDePost($faker->jobTitle);
            $offre->setLieu($faker->country);
            $offre->setTaille("PME");
            $offre->setNomEntreprise($faker->company);
            $offre->setPublishedAt($faker->dateTimeBetween('-100 days', '-1 days'));
            $manager->persist($offre);
            $manager->flush();


        }
    }


}
