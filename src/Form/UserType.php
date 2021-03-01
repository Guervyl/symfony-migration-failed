<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', \Symfony\Component\Form\Extension\Core\Type\TextType::class,[])->add('email', \Symfony\Component\Form\Extension\Core\Type\EmailType::class,[])->add('password', \Symfony\Component\Form\Extension\Core\Type\RepeatedType::class,["required" => 1,"invalid_message" => "The passwords do not match","first_options" => [ "label" => "Password"],"second_options" => [ "label" => "Repeat password"],"type" => \Symfony\Component\Form\Extension\Core\Type\PasswordType::class,]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\User'
        ));
    }
}