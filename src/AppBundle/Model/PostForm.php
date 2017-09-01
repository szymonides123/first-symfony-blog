<?php

namespace AppBundle\Model;

use AppBundle\Model\PostForm;
use AppBundle\Model\CommentForm;
use AppBundle\Entity\Posts;
use AppBundle\Entity\Comment;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PostForm extends AbstractType 
{
        
    public function buildForm(FormBuilderInterface $builder, array $options){
	
	$builder
            ->add('title', TextType::class)
            ->add('content', TextareaType::class)
//            ->add('publicationdate', DateType::class)
            ->add('author', TextType::class)
                ;
    }
}