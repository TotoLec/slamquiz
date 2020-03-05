<?php

namespace App\Form;

use App\Entity\Workout;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class WorkoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('started_at')
            // ->add('ended_at')
            // ->add('current_question_number')
            // ->add('last_question_id')
            // ->add('completed')
            // ->add('score')
            // // ->add('quiz')
            // ->add('quiz', TextType::class, [
            //     'attr' => ['readonly' => 'readonly'],
            // ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Workout::class,
        ]);
    }
}
