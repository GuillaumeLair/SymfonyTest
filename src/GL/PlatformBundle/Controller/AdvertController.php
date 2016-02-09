<?php

// src/OC/PlatformBundle/Controller/AdvertController.php
// Je précise le nom du namespace dans lequel je travaille

namespace GL\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller {

    //On défini ce que le controlleur renvoie 
    //selon la route sélectionner. 
    //Ici quand l'action index est invoqué

    public function indexAction($page) {
        //On défini notre paramètre comme se devant d'etre supérieur ou égale a 1
        if ($page < 1) {
            //On déclenche une erreur si quelqu'un cherche a aller a un page inférieur a 1
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }//fin if
        //On appelle le template 
        return $this->render('GLPlatformBundle:Advert:index.html.twig');
    }

    //Action View de notre routing avec le paramètre id 
    public function viewAction($id) {
        //on recupere directement l'id via l'URL. 
        // On passera ensuite l'annonce a la vue pour qu'elle 
        // puisse afficher l'annonce correspondante
        return $this->render('GLPlatformBundle:Advert:view.html.twig', array('id' => $id));
    }

    public function addAction(Request $request) {
        //Si on reçoit une requete POST c'est que l'utilisateur a soumis un formulaire
        if ($request->isMethod('POST')) {
            //Pour plus tard Création et Gestion formulaire. 
            //On récupére de la session un message Flash qui est détruit de la SESSION au changement de page
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregisrée.');

            //On redirige ensuite vers la page de visualisation de l'annonce
            return $this->RedirectToRoute('oc_platform_view', array('id' => 5));
        }//fin if
        return $this->render('GLPlatformBundle:Advert:add.html.twig');
        //Si pas de parametre POST alors on renvois le formulaire
    }

    public function editAction($id, Request $request) {
        // On récupérera dans le futur l'annonce correspondante a $id
        //Meme method que l'ajout si method POST alors Formulaire soumis
        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifié.');

            //On retourne l'annonce qui correspond a notre id ici 5 pour l'exemple 
            return $this->redirect - ToRoute('oc_platform_view', array('id' => 5));
        }// Fin if
        return $this->render('GLPlatformBundle:Advert:edit.html.twig');
        //Si pas de parametre POST alors on renvois le formulaire d'edition
    }

    public function deleteAction($id) {

        // Ici, on récupérera l'annonce correspondant à $id
        // Ici, on gérera la suppression de l'annonce en question

        return $this->render('OCPlatformBundle:Advert:delete.html.twig');
    }

}
