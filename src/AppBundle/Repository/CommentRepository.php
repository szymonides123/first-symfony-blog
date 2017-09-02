<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository
{
    public function findCommentToPost($id) {
        
        return $this->getEntityManager()
                ->createQuery('SELECT p From AppBundle:Comment p WHERE p.postId = :id'
                )->setParameter('id', $id)->getResult();
    }
    
//    public function insertComment($id, $comment, $user, $date){
//            $this->getEntityManager()
//            ->setPostId($id)
//            ->setPublicationdate($date)
//            ->setAuthor($user)
//            ->persist($comment)
//            ->flush();
//        
//    }
}
