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
            FROM AppBundle:Cadastro C
            WHERE C.titulo LIKE :busca
            OR C.endereco LIKE :busca
            OR C.cep LIKE :busca
            OR C.cidade LIKE :busca
            OR C.categoria LIKE :busca'
        )->setParameter('busca', '%'.$busca.'%');

        $cadastros = $query->getResult();

        return $this->render('home/busca.html.twig', [
            'title' => 'Busca por '.$busca,
            'q' => $busca,
            'cadastros' => $cadastros,
        ]);
    }

    /**
     * @Route("/ver/{id}")
     */
    public function verAction($id) {
        $cadastro = $this->getDoctrine()
            ->getRepository('AppBundle:Cadastro')
            ->find($id);

        if ($cadastro == null) {
            return $this->redirectToRoute('homepage');
        }

        return $this->render('home/ver.html.twig', [
            'title' => $cadastro->getTitulo(),
            'cadastro' => $cadastro,
        ]);
    }

}

?>
