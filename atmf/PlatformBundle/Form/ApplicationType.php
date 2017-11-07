<?php

namespace Dur\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('date',      'date', array('attr' => array('class' => 'hidden', 'value' => date('d/m/Y'))))
        ->add('content',   'textarea', array('attr' => array('class' => 'ckeditor', 'name' => 'content')))

        ->add('save',      'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dur\PlatformBundle\Entity\Application'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dur_platformbundle_application';
    }
}
