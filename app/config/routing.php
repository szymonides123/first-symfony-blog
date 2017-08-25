<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('index', new Route('/', array(
    '_controller' => 'AppBundle:Index:index',
)));
$collection->add('index', new Route('/home', array(
    '_controller' => 'AppBundle:Index:index',
)));
$collection->add('addpost', new Route('/post/add', array(
    '_controller' => 'AppBundle:Post:add',
)));
$collection->add('showpost', new Route('/post/{id}', array(
    '_controller' => 'AppBundle:ShowPost:show',
)));
$collection->add('register', new Route('/register', array(
    '_controller' => 'AppBundle:Register:index',
)));

return $collection;