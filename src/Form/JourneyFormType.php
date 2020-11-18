<?php

namespace App\Form;

use App\Entity\Journey;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JourneyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', TextareaType::class, ["label" => "Opis"])
            ->add('departureTime', DateTimeType::class, ["label" => "Data odjazdu"])
            ->add('arrivalTime', DateTimeType::class, ["label" => "Data przyjazdu"])
            ->add('personLimit', NumberType::class, ["label" => "Limit osób"])
            ->add('startLocation', TextType::class, ["label" => "Miejsce odjazdu"])
            ->add('finishLocation', TextType::class, ["label" => "Miejsce przyjazdu"])
            ->add('contribution', NumberType::class, ["label" => "Zrzutka"])
            ->add('submit', SubmitType::class, ['label' => 'Wyślij']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Journey::class,
        ]);
    }
}
