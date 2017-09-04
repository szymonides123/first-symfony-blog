<?php

namespace AppBundle\Model;


use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\Posts;
use AppBundle\Entity\Comment;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class PostForm extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	$builder
            ->add('title', TextType::class)
            ->add('content', TextareaType::class)
                ;
    }
}