<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\PostForm;
use AppBundle\Entity\Posts;

class PostController extends Controller {
    
    private $postform;
   // private $post;


    public function __construct(PostForm $postform/*, Posts $post*/) {
        
      $this->postform = $postform; 
     // $this->post=$post;
    }
    
    public function addAction(){
        
        $post = new Posts;
        $form= $this->createForm(PostForm::class, $post);
        return $this->render('default/addpost.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    
}
