<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('indexb', new Route('/', array(
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
$collection->add('addcomment', new Route('/post/{id}', array(
    '_controller' => 'AppBundle:ShowPost:addcomment',
)));
$collection->add('delete', new Route('/post/delete/{id}', array(
    '_controller' => 'AppBundle:Postdelete:delete',
)));
$collection->add('deletecom', new Route('/com/deletecom/{id}', array(
    '_controller' => 'AppBundle:Postdelete:deletecom',
)));

return $collection;