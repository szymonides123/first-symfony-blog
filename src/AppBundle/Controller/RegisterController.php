<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\PostForm;
use AppBundle\Entity\Posts;

class PostController extends Controller {

    private $users;


    public function __construct(Users $users) {
      $this->users=$users;
    }
    
    public function indexAction(Request $request){
        $form= $this->createForm(UserForm::class, $this->users);
        $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($this->users);
            // $em->flush();

        // return $this->redirect($this->generateUrl(
            // 'index'
        // ));
		// }        
        return $this->render('default/adduser.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    
}