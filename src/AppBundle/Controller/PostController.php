<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\PostForm;
use AppBundle\Entity\Posts;

class PostController extends Controller {

    private $post;


    public function __construct(Posts $post) {
      $this->post=$post;
    }
    
    public function addAction(Request $request){
        $form= $this->createForm(PostForm::class, $this->post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($this->post);
            $em->flush();

        return $this->redirect($this->generateUrl(
            'index'
        ));
    }        
        return $this->render('default/addpost.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    
    public function addCommentAction() {
        
    }
    
}
