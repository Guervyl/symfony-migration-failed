<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MounManmanType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('non', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [])
            ->add("sexe", MounMounSexeType::class)
            ->add('siyati', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [])->add('laj', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [])->add('ote', \Symfony\Component\Form\Extension\Core\Type\TextType::class, []);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\Moun'
        ));
    }
}