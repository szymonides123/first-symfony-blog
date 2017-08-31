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
    
    public function __construct(Posts $posts, Comment $comments ) {
        $this->posts=$posts;
        $this->comment=$comments;  
      
    }   
    public function showAction($id, Request $request){
        $post = $this->getDoctrine()
        ->getRepository('AppBundle:Posts')->find($id);
        if (!$post) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );}
        $em=$this->getDoctrine()->getManager();
        $commentquery = $em->createQuery(
                'SELECT p From AppBundle:Comment p WHERE p.postId = :id'
                )->setParameter('id', $id);
        $comment = $commentquery->getResult(); 
        $form= $this->createForm(CommentForm::class, $this->comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $date = new \DateTime("now");
            $em = $this->getDoctrine()->getManager();
            $this->comment->setPostId($id);
            $this->comment->setPublicationdate($date);
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
