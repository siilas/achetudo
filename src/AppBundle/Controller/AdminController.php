<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Login;

class AdminController extends Controller {

    /**
     * @Route("/admin", name="login")
     */
    public function indexAction(Request $request) {
        $session = $request->getSession();
        $login = $session->get('login');

        if ($login != null) {
            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/admin.html.twig', [
            'title' => 'Login'
        ]);
    }

    /**
     * @Route("/admin/login")
     */
    public function loginAction(Request $request) {
        $usuario = $request->request->get('usuario', '');
        $senha = $request->request->get('senha', '');

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
            'SELECT L
            FROM AppBundle:Login L
            WHERE L.usuario = :usuario
            AND L.senha = :senha'
        )->setParameter('usuario', $usuario)
         ->setParameter('senha', $senha);

         $login = $query->getResult();

         if ($login == null) {
            return $this->redirectToRoute('login');
         } else {
            $session = $request->getSession();
            $session->set('login', $login);
            return $this->redirectToRoute('admin');
         }
    }

    /**
     * @Route("/admin/home", name="admin")
     */
    public function homeAction(Request $request) {
        $session = $request->getSession();
        $login = $session->get('login');

        if ($login == null) {
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $cadastros = $this->getDoctrine()->getRepository('AppBundle:Cadastro')->findAll();;

        return $this->render('admin/home.html.twig', [
            'title' => 'Administrador',
            'cadastros' => $cadastros,
        ]);
    }

    /**
     * @Route("/admin/sair")
     */
    public function sairAction(Request $request) {
        $session = $request->getSession();
        $login = $session->remove('login');    
        
        return $this->redirectToRoute('login');
    }

}

?>
