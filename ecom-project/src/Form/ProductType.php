<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Products;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType; // This is correct for boolean forms
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
              "attr"=>["placeholder"=>"Nom du produit", "class"=>"w-full"]
            ])
            ->add('description', TextareaType::class, [
              "attr"=>["placeholder"=>"Description du produit", "class"=>"w-full"]
            ])
            ->add('price', NumberType::class, [
              "attr"=>["placeholder"=>"Prix du produit", "class"=>"w-full"]
            ])
            ->add('stock', NumberType::class, [
              "attr"=>["placeholder"=>"Stock du produit", "class"=>"w-full"]
            ])
            ->add('isValid', CheckboxType::class, [
              "label" => "Est Valid?",
              "required" => false, // This makes it optional
              'mapped' => true // Ensure this is mapped to the entity property
            ])
            ->add('envoyer', SubmitType::class, [
              "attr"=>["class"=>"text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"]
            ])
            ->add('category', EntityType::class, [
                'class' => Categories::class,
                'choice_label' => 'name',
                "attr"=>["class"=>"w-full"]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}