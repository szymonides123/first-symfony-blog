<?php

namespace AppBundle\Model;

use AppBundle\Model\PostForm;
use AppBundle\Model\CommentForm;
use AppBundle\Entity\Posts;
use AppBundle\Entity\Comment;
use Symfony\Component\Form\FormBuilderInterface;


class InsertPost
{	
	public function __construct(Comment $comments ) {
        $this->comment=$comments;  
      
    } 	
    public function insertComment($form, $id, $user, $date, Request $request){
		$form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $publicationdate = new \DateTime("now");
            $em = $this->getDoctrine()->getManager();
            $this->post->setPublicationdate($publicationdate);
            $em->persist($this->post);
            $em->flush();
            return;
        }
    }
}
