<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Posts;


class IndexController extends Controller{
    
    public function indexAction() {
        
        $posts=$this->getDoctrine()->getRepository('AppBundle:Posts')->findAll();
        return $this->render('default/index.html.twig', array(
            'posts' => $posts
        ));
    }
}

