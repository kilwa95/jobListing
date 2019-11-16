<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Offre;
use App\Entity\TypeEmploi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_entreprise',TextType::class,[
                'required' => false

            ])

            ->add('image',FileType::class,[
                'mapped' => false,
                'required' => false,
                'constraints' =>[
                    new Image([
                        'maxSize' => '5M'
                    ])
                ]

            ])

            ->add('intiule_de_post' ,TextType::class,[
                'required' => false
            ])

            ->add('lieu' ,TextType::class,[
                'required' => false
            ])

            ->add('taille' ,TextType::class)

            ->add('description',TextareaType::class)

            ->add('Category',EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'nom',
            ])
            ->add('publishedAt')
            ->add('type_emploi',EntityType::class,[
                'class' => TypeEmploi::class,
                'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}

