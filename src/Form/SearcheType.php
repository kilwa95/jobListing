<?php


namespace App\Form;


use App\Entity\Category;
use App\Entity\Offre;
use App\Entity\TypeEmploi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearcheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_entreprise',TextType::class,[
                'attr' => [
                'placeholder' => 'what are you looging for?',
                ]
            ])

            ->add('Category',EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'nom',
            ])

            ->add('type_emploi',EntityType::class,[
                'class' => TypeEmploi::class,
                'choice_label' => 'nom',
            ])

            ->add('rechercher',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);    }


}