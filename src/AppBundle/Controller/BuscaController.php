<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BuscaController extends Controller {

    /**
     * @Route("/buscar")
     */
    public function buscarAction(Request $request) {
        $busca = $request->query->get('q', '');
        
        return $this->render('home/busca.html.twig', [
            'title' => 'Busca por '.$busca,
            'q' => $busca,
            'cadastros' => array(),
        ]);

    }

}

?>
