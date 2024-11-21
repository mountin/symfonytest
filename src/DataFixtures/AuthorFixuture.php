<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AuthorFixuture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $author = new Author();
        $author->setName("Vasya pupkin");
        $author->setNationalite("Frances");
        // $product = new Product();
        $manager->persist($author);

        $manager->flush();
    }
}
