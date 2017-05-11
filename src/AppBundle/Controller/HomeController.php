<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {
    
    /**
     * @Route("/")
     */
    public function indexAction() {

        return $this->render('home/index.html.twig', [
            'title' => 'Página inicial',
        ]);

    }

}

?>
