<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name = "ADMIN")
 */
class Login {

	/**
     * @ORM\Column(type = "integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy = "AUTO")
     */
    private $id;

	/**
     * @Assert\NotBlank()
     * @ORM\Column(type = "string", length = 10)
     */
	private $usuario;

	/**
     * @Assert\NotBlank()
     * @ORM\Column(type = "string", length = 15)
     */
	private $senha;

	public function getUsuario() {
		return $this->usuario;
	}

	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}

}

?>
