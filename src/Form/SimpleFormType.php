<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SimpleFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('non', \Symfony\Component\Form\Extension\Core\Type\TextType::class,[])->add('prenom', \Symfony\Component\Form\Extension\Core\Type\TextType::class,[])->add('img', \Symfony\Component\Form\Extension\Core\Type\FileType::class,["data_class" => NULL,])->add('age', \Symfony\Component\Form\Extension\Core\Type\TextType::class,[])->add('drinks', checkbox,[]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\SimpleForm'
        ));
    }
}