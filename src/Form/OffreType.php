<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Offre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('photo', FileType::class, [
                'mapped'=>false,
                'required'=>false,
                'constraints'=>[new File(
                    ['maxSize' => '5M',
                        'mimeTypes' => ['image/*']]
                )
                ]
            ])
            ->add('category',EntityType::class,[
                'class'=>Category::class,
                'choice_label'=>'nom',
                'multiple'=>false,
                'expanded'=>false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
