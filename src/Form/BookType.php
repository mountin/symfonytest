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
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'name',
            ])
            ->add('description')
            ->add('value')
            ->add('genre', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => 'name',
                'multiple' => true,  // Permet de sélectionner plusieurs genres
                'expanded' => true,  // Affichage sous forme de checkboxes
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
