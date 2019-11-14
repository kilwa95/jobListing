<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{


    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 1; $i++) {
            $candidat = new User();
            $candidat->setEmail($faker->email);
            $candidat->setPhone("064358066");
            $candidat->setAdresse($faker->address);
            $candidat->setFirstName($faker->firstName);
            $candidat->setLastName($faker->lastName);
            $candidat->setRoles((array)"ROLE_CANDIDAT");
            $candidat->setPassword($this->passwordEncoder->encodePassword(
                $candidat,
                'engage'
            ));

            $manager->persist($candidat);
            $manager->flush();
        }


        for ($i = 0; $i < 1; $i++) {
            $candidat = new User();
            $candidat->setEmail($faker->email);
            $candidat->setFirstName($faker->firstName);
            $candidat->setLastName($faker->lastName);
            $candidat->setPhone("064358066");
            $candidat->setAdresse($faker->address);
            $candidat->setRoles((array)"ROLE_RECRETEUR");
            $candidat->setPassword($this->passwordEncoder->encodePassword(
                $candidat,
                'engage'
            ));

            $manager->persist($candidat);
            $manager->flush();
        }


        $admin = new User();
        $admin->setEmail("khaled@gmail.com");
        $admin->setFirstName("khaled");
        $admin->setLastName("abd");
        $admin->setRoles((array)"ROLE_ADMIN");
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'admin95'
        ));

        $manager->persist($admin);
        $manager->flush();


    }

}
