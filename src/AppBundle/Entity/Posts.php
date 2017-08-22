<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
  * @ORM\Entity
  * @ORM\Table(name="posts")
  */

class Posts {
    
    /**
      * @ORM\Column(type="integer")
      * @ORM\Id
      * @ORM\GeneratedValue(strategy="AUTO")
      */
    protected $id;
    /**
      * @ORM\Column(type="string", length=100)
      */    
    protected $title;
    /**
      * @ORM\Column(type="text")
      */        
    protected $content;
    /**
      * @ORM\Column(type="datetime")
      */ 
    protected $publicationdate;
    /**
      * @ORM\Column(type="string", length=100)
      */        
    protected $author;
    
    
    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Posts
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Posts
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set publicationdate
     *
     * @param \DateTime $publicationdate
     *
     * @return Posts
     */
    public function setPublicationdate($publicationdate)
    {
        $this->publicationdate = $publicationdate;

        return $this;
    }

    /**
     * Get publicationdate
     *
     * @return \DateTime
     */
    public function getPublicationdate()
    {
        return $this->publicationdate;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Posts
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
