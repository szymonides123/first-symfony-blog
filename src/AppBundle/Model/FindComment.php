<?php

namespace AppBundle\Model;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FindComment {
    
    public function findComment($id){
	
	$em=$this->getDoctrine()->getManager();
        $commentquery = $em->createQuery(
                'SELECT p From AppBundle:Comment p WHERE p.postId = :id'
                )->setParameter('id', $id);
        $comment = $commentquery->getResult(); 
    }
    
	return $comment;
}