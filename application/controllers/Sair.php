<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sair extends CI_Controller {


	public function logoutCoord(){

		$this->session->unset_userdata('matricula');

		redirect("principal/Coordenacao");

	}

	public function logoutProf(){

		$this->session->unset_userdata('MATRICULA');

		redirect("principal/Professor");

	}

	public function logoutAluno(){

		$this->session->unset_userdata('Matricula');

		redirect("principal/loginAluno");

	}

}
