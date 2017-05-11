<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller {

    /**
     * @Route("/admin")
     */
    public function indexAction(Request $request) {
        
        return $this->render('default/admin.html.twig', [
            'title' => 'Administrador',
        ]);

    }

    /**
     * @Route("/admin/login")
     */
    public function loginAction(Request $request) {
        
        return $this->render('default/admin.html.twig', [
            'title' => 'Administrador',
        ]);

    }

}

?>
