<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Pays;
use App\Entity\Villes;
use App\Entity\Groupes;
use App\Entity\Utilisateurs;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // On stocke l'outil Faker dans une variable afin de pouvoir l'appeler
        $faker = Faker\Factory::create('fr_FR');
        
        // Pays
        for($i = 1; $i <= 15; $i++) {

            // Instanciation d'un nouveau Pays
            $country = new Pays();
            // Définition de la propriété "Nom" de l'entité Pays
            $country->setNom($faker->country);
            // Persistance des données grâce à ObjectManager
            $manager->persist($country);
            $this->addReference("country". $i, $country);
            }

        // Villes

        for($i = 0; $i <= 20; $i++) {

        // - Instanciation d'une nouvelle Ville
            $city = new Villes();
        //   - Définition des propriétés de chaque ville -> voir propriétés dans l'entité       Villes
            $city->setNom($faker->city);
            $id_country = $this->getReference("country".rand(1,14));
            $city->setPaysId($id_country);
        //    - Persistance de données   
            $manager->persist($city);
            $this->addReference("city". $i, $city);
        }



        // Groupes

        for($i = 0; $i <= 5; $i++) {

            // Instanciation d'un nouveau Groupe
            $group = new Groupes();
            // Définition de la propriété "Nom" de l'entité Groupe
            $group->setNom($faker->lastName);
            // - Persistance de données 
            $manager->persist($group);
            $this->addReference("group". $i, $group);
        }

        // Utilisateurs

        for($i = 0; $i <= 50; $i++) {
            // Instanciation d'un nouvel utilisateur
            $user = new Utilisateurs();
            // Définition des propriétés
            $user->setNom($faker->lastName)
                 ->setPrenom($faker->firstName)
                 ->setEmail($faker->safeEmail)
                 ->setDateNaissance($faker->dateTime)
                 ->setVilleId($this->getReference("city".rand(1,20)))
                 ->setProfession($faker->jobTitle)
                 ->setIntro($faker->sentence)
                 ->setDescription($faker->paragraph)
                 ->addGroupesId($this->getReference("group".rand(0, 5)));
            
            $manager->persist($user);

        }



        // Envoie des données sur la base de données
        $manager->flush();
    }


}
