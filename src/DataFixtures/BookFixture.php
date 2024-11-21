<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixture extends Fixture
{
    public function load(ObjectManager $manager): void
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
