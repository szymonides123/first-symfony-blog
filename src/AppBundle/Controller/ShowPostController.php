<?php



namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ShowPostController extends Controller {
    
    public function showAction($id){
        $post = $this->getDoctrine()
        ->getRepository('AppBundle:Posts')
        ->find($id);
        if (!$post) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
        }
        return $this->render('default/showpost.html.twig', array(
            'post' => $post,
        ));
    }
}
