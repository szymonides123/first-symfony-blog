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
    
    public function __construct(Posts $posts, Comment $comment ) {
        $this->posts=$posts;
        $this->comment=$comment;  
      
    }
    
    
    public function showAction($id, Request $request){
        $post = $this->getDoctrine()
        ->getRepository('AppBundle:Posts')
        ->find($id);
        if (!$post) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
        }
        //Warunek czy znajduje sie jakiś komentarz w bazie
//        if(!$comment){
//                ;
//        }
        
        $form= $this->createForm(CommentForm::class, $this->comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $this->comment->setPostId($id);
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
        ));
    }
}
