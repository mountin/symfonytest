<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BookFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $authors = $manager->getRepository(Author::class)->findAll();

        // Initialize the Faker library
        $faker = Factory::create();

        // Create 20 random books
        for ($i = 0; $i < 20; $i++) {
            $book = new Book();
            $book->setTitle($faker->sentence(3));
            $book->setDescription($faker->name);
            //$faker->dateTimeBetween('-10 years', 'now')); // Random publication date
            $book->setAuthorId($authors[rand(0, count($authors) -1)]);
            $book->setValue($faker->randomFloat(2, 10, 100)); // Random price between 10 and 100

            $manager->persist($book);
            // Persist the book
        }
        $manager->flush();
    }

    function load2(ObjectManager $manager): void
    {
        $authors = $manager->getRepository(Author::class)->findAll();
        $book = new Book();
        $book->name = "Harry poter";
        $book->setTitle("Harry poter");
        $book->setDescription("great book for read");
        $manager->persist($book);
        $book->setAuthorId($authors[0]);

        $manager->flush();
    }
}
