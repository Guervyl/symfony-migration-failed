<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MounType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('non', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [])->add('siyati', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [])->add('laj', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class, [])->add('ote', \Symfony\Component\Form\Extension\Core\Type\NumberType::class, [])->add('sexe', MounSexeType::class)
            ->add('manman', MounManmanType::class)->add('enfant', \Symfony\Component\Form\Extension\Core\Type\CollectionType::class, ["entry_type" => MounEnfantType::class, "allow_add" => true, "allow_delete" => true,]);
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