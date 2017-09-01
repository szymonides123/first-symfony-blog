<?php

namespace AppBundle\Model;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FindPost {
    
    public function findPost($id){
	
	$post = $this->getDoctrine()
        ->getRepository('AppBundle:Posts')->find($id);
        if (!$post) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );} 
    }
    
	return $post;
}