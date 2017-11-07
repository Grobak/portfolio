<?php

namespace Dur\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;

class RechercheType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{

		$builder
		->add('title', 'text', array('required' => false))
        ->add('date', 'date', array('required' => false));
	}

	public function getName()
	{
		return 'dur_platformbundle_recherche';
	}
}