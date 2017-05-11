<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name = "CADASTRO")
 */
class Cadastro {

	/**
     * @ORM\Column(type = "integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy = "AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type = "string", length = 100)
     */
    private $titulo;

    /**
     * @ORM\Column(type = "string", length=100)
     */
    private $telefone;

    /**
     * @ORM\Column(type = "string", length = 100)
     */
    private $endereco;

    /**
     * @ORM\Column(type = "string", length = 100)
     */
    private $cep;

    /**
     * @ORM\Column(type = "string", length = 100)
     */
    private $cidade;

    /**
     * @ORM\Column(type = "string", length = 2)
     */
    private $estado;

    /**
     * @ORM\Column(type = "string", length = 100)
     */
    private $descricao;

    /**
     * @ORM\Column(type = "string", length = 100)
     */
    private $categoria;

}

?>
