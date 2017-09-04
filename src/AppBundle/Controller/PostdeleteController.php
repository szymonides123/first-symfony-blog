<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Posts;


class PostdeleteController extends Controller{
    
    public function deleteAction($id) {
        $em = $this->getDoctrine()->getManager();
        $post=$em->getRepository('AppBundle:Posts')->find($id);
        $em->remove($post);
        $em->flush();
        return $this->redirectToRoute('index');
    }
    public function deletecomAction($id){
        $em = $this->getDoctrine()->getManager();
        $comment=$em->getRepository('AppBundle:Comment')->find($id);
        $em->remove($comment);
        $em->flush();
        return $this->redirectToRoute('index');
    }
}

