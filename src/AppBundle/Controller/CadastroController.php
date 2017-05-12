<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use AppBundle\Entity\Cadastro;

class CadastroController extends Controller {

    /**
     * @Route("/admin/cadastro/")
     */
    public function indexAction(Request $request) {
    	$session = $request->getSession();
        $login = $session->get('login');

        if ($login == null) {
            return $this->redirectToRoute('login');
        }

        return $this->render('admin/cadastro.html.twig', [
            'title' => 'Cadastro',
            'cadastro' => new Cadastro(),
        ]);
    }

    /**
     * @Route("/admin/cadastro/editar/{id}")
     */
    public function editarAction($id, Request $request) {
        $session = $request->getSession();
        $login = $session->get('login');

        if ($login == null) {
            return $this->redirectToRoute('login');
        }

        $cadastro = $this->getDoctrine()
        	->getRepository('AppBundle:Cadastro')
        	->find($id);

        return $this->render('admin/cadastro.html.twig', [
            'title' => 'Cadastro',
            'cadastro' => $cadastro,
        ]);
    }

    /**
     * @Route("/admin/cadastro/excluir/{id}")
     */
    public function excluirAction($id, Request $request) {
    	$session = $request->getSession();
        $login = $session->get('login');

        if ($login == null) {
            return $this->redirectToRoute('login');
        }

    	$em = $this->getDoctrine()
        	->getRepository('AppBundle:Cadastro');
    	$cadastro = $em->find($id);

		$em = $this->getDoctrine()->getEntityManager();
    	$em->remove($cadastro);
    	$em->flush();

        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/admin/cadastro/salvar")
     */
    public function salvarAction(Request $request) {
    	$session = $request->getSession();
        $login = $session->get('login');

        if ($login == null) {
            return $this->redirectToRoute('login');
        }

    	$cadastro = new Cadastro();
    	$cadastro->setId($request->request->get('id', ''));
    	$cadastro->setTitulo($request->request->get('titulo', ''));
    	$cadastro->setTelefone($request->request->get('telefone', ''));
    	$cadastro->setEndereco($request->request->get('endereco', ''));
    	$cadastro->setCep($request->request->get('cep', ''));
    	$cadastro->setCidade($request->request->get('cidade', ''));
    	$cadastro->setEstado($request->request->get('estado', ''));
    	$cadastro->setDescricao($request->request->get('descricao', ''));
    	$cadastro->setCategoria($request->request->get('categoria', ''));

        $em = $this->getDoctrine()->getManager();
        $em->merge($cadastro);
        $em->flush();

        return $this->redirectToRoute('admin');
    }
    
}

?>
