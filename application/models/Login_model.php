<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_model {
	

	public function logarCoord($matricula = null, $senha = null){

		if($matricula != null && $senha != null):

			$this->db->where('matricula', $matricula);  
			$this->db->where('senha',$senha);

			$query = $this->db->get('usuarios');

			return $query->row();

		endif;
	}


	public function showUserCoord($matricula = null){

		$this->db->cache_on();

		if($matricula != null):

			$this->db->select('nome');
			$this->db->select('matricula');
			$query = $this->db->get_where('usuarios', array('matricula' => $matricula));

			return $query->row();

		endif;

		$this->db->cache_off();
	}


	public function logarProf($matricula = null, $senha = null){

		if($matricula != null && $senha != null):

			$this->db->where('matricula', $matricula);  
			$this->db->where('senha', $senha);

			$query = $this->db->get('professorLogin');

			return $query->row();

		endif;
	}

	public function showUserProf($matricula = null){

		$this->db->cache_on();

		if($matricula != null):

			$this->db->select('nome');
			$this->db->select('MATRICULA');
			$query = $this->db->get_where('professorLogin', array('matricula' => $matricula));

			return $query->row();
		endif;

		$this->db->cache_off();
	}

	public function logarAluno($matricula = null, $senha = null){

		if($matricula != null && $senha != null):

			$this->db->where('Matricula', $matricula);  
			$this->db->where('senha',$senha);

			$query = $this->db->get('alunoLogin');

			return $query->row();

		endif;
	}


	public function showUserAluno($matricula = null){

		$this->db->cache_on();

		if($matricula != null):

			$this->db->select('nome');
			$this->db->select('Matricula');
			$this->db->select('nivel');
			$this->db->select('turno');
			$query = $this->db->get_where('alunoLogin', array('Matricula' => $matricula));

			return $query->row();
			
		endif;

		$this->db->cache_off();
	}

}


