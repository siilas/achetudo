<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CadastroController extends Controller {

    /**
     * @Route("/admin/cadastro/")
     */
    public function indexAction() {
        
        return $this->render('default/cadastro.html.twig', [
            'title' => 'Cadastro',
        ]);

    }
    
}

?>
