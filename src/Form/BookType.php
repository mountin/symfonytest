<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Genre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Author;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('authorId', EntityType::class, ['class' => Author::class]  )

//            ->add('genre', EntityType::class, [
//                'class' => Genre::class,
//                'choice_label' => 'genres',
//                'multiple' => true, // Allows selecting multiple groups
//                'expanded' => true,  // Render checkboxes for the user to select multiple groups
//            ])

            //->add('authorId')
            //->add(Author::class)
            ->add('description')
            ->add('value')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
