<?php



namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\PostForm;
use AppBundle\Model\CommentForm;
use AppBundle\Entity\Posts;
use AppBundle\Entity\Comment;
use AppBundle\Model\InsertComment;



class ShowPostController extends Controller {
   
    public function __construct(Comment $comments, InsertComment $insert) {
        $this->comment=$comments;  
        $this->insert=$insert;
      
    }   
    public function showAction($id, Request $request){
      // znajdź post
        $post = $this->getDoctrine()
        ->getRepository('AppBundle:Posts')->find($id);
        if (!$post) {
            throw $this->createNotFoundException(
            'No product found for id '.$id );
        }
//      znajdź komentarze do posta  
        $comment=$this->getDoctrine()->getRepository(Comment::class)->findCommentToPost($id);
//      utwórz formularz comentowania
        $form= $this->createForm(CommentForm::class, $this->comment);       
//        obsługa wywołania formularza do komentowania
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $this->comment->setPostId($id);
            $this->comment->setPublicationdate(new \DateTime("now"));
            $this->comment->setAuthor($this->getUser());
            $em->persist($this->comment);
            $em->flush();
            return $this->redirect($this->generateUrl(
		'showpost',
		array('id' => $id)
        ));
        }
        return $this->render('default/showpost.html.twig', array(
            'post' => $post,
            'form' => $form->createView(),
            'comment'=> $comment,
        ));
    }
}
