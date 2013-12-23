<?php

namespace MobileOne\WSservationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MobileOneWSservationBundle:Default:index.html.twig', array('name' => $name));
    }
}
