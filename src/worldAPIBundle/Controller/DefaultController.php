<?php

namespace worldAPIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DefaultController extends Controller
{    
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        return $this->render('worldAPIBundle:Default:index.html.twig');
    }

    /**
     * @Route("/prueba/{id}", name="prueba")
     */
    public function pruebaAction($id = 1) #Valor por defecto
    {
        return $this->render('worldAPIBundle:Default:prueba.html.twig', array('id'=>$id));
    }

}
