<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Offre;
use App\Entity\TypeEmploi;
use App\Entity\Ville;
use App\Service\UploaderHelper;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;

class OffreFixtures extends Fixture
{


    private $uploaderHelper;

    public function __construct(UploaderHelper $uploaderHelper)
    {
        $this->uploaderHelper = $uploaderHelper;
    }

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
            $cateogrys[] = $cateory1;
        }
        for ($i = 0; $i < 1; $i++) {
            $cateory2 = new Category();
            $cateory2->setNom("Accounting");
            $manager->persist( $cateory2);
            $manager->flush();
            $cateogrys[] = $cateory2;
        }

        for ($i = 0; $i < 1; $i++) {
            $cateory3 = new Category();
            $cateory3->setNom("Technology");
            $manager->persist( $cateory3);
            $manager->flush();
            $cateogrys[] = $cateory3;
        }

        for ($i = 0; $i < 1; $i++) {
            $cateory4 = new Category();
            $cateory4->setNom("Media & News");
            $manager->persist( $cateory4);
            $manager->flush();
            $cateogrys[] = $cateory4;
        }
        for ($i = 0; $i < 1; $i++) {
            $cateory5 = new Category();
            $cateory5->setNom("Medical");
            $manager->persist( $cateory5);
            $manager->flush();
            $cateogrys[] = $cateory5;
        }

        for ($i = 0; $i < 1; $i++) {
            $cateory6 = new Category();
            $cateory6->setNom("Goverment");
            $manager->persist( $cateory6);
            $manager->flush();
            $cateogrys[] = $cateory6;
        }



        for ($i = 0; $i <10; $i++) {
            $offre = new Offre();
            $cat = $cateogrys[mt_rand(0,count($cateogrys)-1)];
            $offre->setCategory($cat);
           // $offre->setImage($faker->image(__DIR__.'/images','109','69'));
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
            $cat = $cateogrys[mt_rand(0,count($cateogrys)-1)];
            $offre->setCategory($cat);
            //$imageFile=$faker->image('null','109','69');

            //$fs = new Filesystem();
            //$targetPath = sys_get_temp_dir().'/'.$imageFile;
            //$fs->copy(__DIR__.'/images/'.$imageFile, $targetPath, true);
            //$image = $this->uploaderHelper->uploadOffreImage(new File($targetPath));

            //$offre->setImage($faker->image(__DIR__.'/images','109','69'));
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
            $cat = $cateogrys[mt_rand(0,count($cateogrys)-1)];
            $offre->setCategory($cat);
            //$offre->setImage($faker->image(__DIR__.'/images','109','69'));
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
            $cat = $cateogrys[mt_rand(0,count($cateogrys)-1)];
            $offre->setCategory($cat);
            $offre->setTypeEmploi($emploi1);
            //$offre->setImage($faker->image(__DIR__.'/images','109','69'));
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
            $cat = $cateogrys[mt_rand(0,count($cateogrys)-1)];
            $offre->setCategory($cat);
            $offre->setTypeEmploi($emploi2);
            //$offre->setImage($faker->image(__DIR__.'/images','109','69'));
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
            $cat = $cateogrys[mt_rand(0,count($cateogrys)-1)];
            $offre->setCategory($cat);
            $offre->setTypeEmploi($emploi3);
            //$offre->setImage($faker->image(__DIR__.'/images','109','69'));
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
