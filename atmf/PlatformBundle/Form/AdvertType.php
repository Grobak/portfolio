<?php

namespace Dur\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvertType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('date',      'date')
        ->add('title',     'text')
        ->add('content',   'textarea', array('attr' => array('class' => 'ckeditor', 'name' => 'content')))
        ->add('published', 'checkbox', array('required' => false))
        ->add('image',      new ImageType(), array('required' => false))
        ->add('slug',     'hidden', array('required' => false))
       /* ->add('categories', 'entity', array(
            'class'    => 'DurPlatformBundle:Category',
            'property' => 'name',
            'multiple' => true,
            'expanded' => false
        )) */
        ->add('save',      'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dur\PlatformBundle\Entity\Advert'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dur_platformbundle_advert';
    }
}
