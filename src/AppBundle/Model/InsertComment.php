<?php

namespace AppBundle\Model;

use AppBundle\Model\PostForm;
use AppBundle\Model\CommentForm;
use AppBundle\Entity\Posts;
use AppBundle\Entity\Comment;
use Symfony\Component\Form\FormBuilderInterface;


class InsertComment 
{	
	public function __construct(Comment $comments ) {
        $this->comment=$comments;  
      
    } 	
    public function insertComment($form, $id, $user, $date, Request $request){
		$form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $this->comment->setPostId($id);
            $this->comment->setPublicationdate($date);
            $this->comment->setAuthor($user);
            $em->persist($this->comment);
            $em->flush();
            return;
        }
    }
}