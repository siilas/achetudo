<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Login;

class AdminController extends Controller {

    /**
     * @Route("/admin")
     */
    public function indexAction(Request $request) {
        
        $login = new Login();

        $form = $this->createFormBuilder($login)
            ->add('usuario', TextType::class)
            ->add('senha', PasswordType::class)
            ->getForm();

        return $this->render('admin/admin.html.twig', [
            'title' => 'Administrador',
            'form' => $form->createView(),
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
