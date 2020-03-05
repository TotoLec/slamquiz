<?php

namespace App\Form;

use App\Entity\Quiz;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class QuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['form_type']) {
            case 'teacher':
                $builder
                    ->add('title')
                    ->add('summary')
                    ->add('number_of_question')
                    ->add('active')
                    ->add('categories', EntityType::class, [
                        'class' => Category::class,
                        'query_builder' => function (EntityRepository $er) {
                            return $er->createQueryBuilder('u');
                        },
                        'choice_label' => 'shortname',
                    ]);
                    ;
                break;

            case 'student':
                break;
                
                

        }


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Quiz::class,
            'form_type' => 'teacher',
        ]);
    }
}
