<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BuscaController extends Controller {

    /**
     * @Route("/banco/criar")
     */
    public function criarAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $asdsd = "CREATE TABLE ADMIN (
            ID  BIGINT(38) AUTO_INCREMENT PRIMARY KEY,
            USUARIO VARCHAR(10) NOT NULL,
            SENHA VARCHAR(15) NOT NULL
        )";

        $sql = "CREATE TABLE CADASTRO (
            ID  BIGINT(38) AUTO_INCREMENT PRIMARY KEY,
            TITULO VARCHAR(30) NOT NULL,
            TELEFONE  BIGINT(11) NOT NULL,
            ENDERECO VARCHAR(100) NOT NULL,
            CEP  BIGINT(8) NOT NULL,
            CIDADE VARCHAR(50) NOT NULL,
            ESTADO VARCHAR(2) NOT NULL,
            DESCRICAO VARCHAR(150) NOT NULL,
            CATEGORIA VARCHAR(100) NOT NULL
        )";

        $query = $em->createQuery(
            'SELECT C
            FROM AppBundle:Cadastro C
            WHERE C.titulo = :busca'
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
