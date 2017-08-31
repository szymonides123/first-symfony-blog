<?php



namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\PostForm;
use AppBundle\Model\CommentForm;
use AppBundle\Entity\Posts;
use AppBundle\Entity\Comment;


class ShowPostController extends Controller {
    
    public function __construct(Comment $comments ) {
        $this->comment=$comments;  
      
    }   
    public function showAction($id, Request $request){
//       znajdź post
        $post = $this->getDoctrine()
        ->getRepository('AppBundle:Posts')->find($id);
        if (!$post) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );}
//        znajdź komentarze do posta
        $em=$this->getDoctrine()->getManager();
        $commentquery = $em->createQuery(
                'SELECT p From AppBundle:Comment p WHERE p.postId = :id'
                )->setParameter('id', $id);
        $comment = $commentquery->getResult(); 
//        stwórz formularz komentowania
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
