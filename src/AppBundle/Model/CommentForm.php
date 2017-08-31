<?php

namespace AppBundle\Model;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentForm extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options){
	
	$builder
            ->add('content', TextareaType::class)
//            ->add('publicationdate', DateType::class)
            ->add('author', TextType::class)
                ;
    }
    
}
