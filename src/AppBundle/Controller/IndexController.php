<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class IndexController extends Controller{
    
    public function indexAction() {
        return $this->render('default/index.html.twig');
    }
}

