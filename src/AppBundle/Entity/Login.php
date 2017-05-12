<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Login {

	/**
     * @Assert\NotBlank()
     */
	private $usuario;

	/**
     * @Assert\NotBlank()
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
