<?php

// src/OC/PlatformBundle/Controller/AdvertController.php
// Je précise le nom du namespace dans lequel je travaille

namespace GL\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller {

    //On défini ce que le controlleur renvoie 
    //selon la route sélectionner. 
    //Ici quand l'action index est invoqué

    public function indexAction() {
        $content = $this->get('templating')
                ->render('GLPlatformBundle:Advert:index.html.twig', array('nom' => 'winzou'));

        return new Response($content);
    }

    //Action View de notre routing avec le paramètre id 
    public function viewAction($id) {
        //on recupere directement l'id via l'URL. 
        // On passera ensuite l'annonce a la vue pour qu'elle 
        // puisse l'afficher selon le template
        return new Response("Affichage de l'annonce d'id : " . $id);
    }

    //Action viewSlug avec les paramètres en arguments
    public function viewSlugAction($slug, $year, $_format) {
        return new Response(
                "On pourrait afficher l'annonce correspondant au slug '".$slug."', créeée en ".$year." et au format ".$_format.".");
    }

}
