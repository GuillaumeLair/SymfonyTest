<?php

// src/OC/PlatformBundle/Controller/AdvertController.php
// Je précise le nom du namespace dans lequel je travaille
namespace GL\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
    public function indexAction()
    {
       $content = $this->get('templating')
               ->render('GLPlatformBundle:Advert:index.html.twig',
                       array('nom' => 'winzou'));
	   
		return new Response($content);
    }
}