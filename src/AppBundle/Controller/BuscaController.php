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

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
            'SELECT C
            FROM AppBundle:Entity:Cadastro C
            WHERE C.price > :busca'
        )->setParameter('busca', $busca);

        $cadastros = $query->getResult();
        
        return $this->render('home/busca.html.twig', [
            'title' => 'Busca por '.$busca,
            'q' => $busca,
            'cadastros' => $cadastros,
        ]);

    }

}

?>
