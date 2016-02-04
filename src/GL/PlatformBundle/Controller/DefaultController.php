<?php

namespace GL\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GLPlatformBundle:Default:index.html.twig');
    }
}
