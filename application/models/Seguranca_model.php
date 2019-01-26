<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguranca_model extends CI_model {

	// ESTAS FUNÇÕES VERIFICAM SE O EMAIL INFORMADO NA REDEFINIÇÃO DE SENHA É VÁLIDO

	public function consultEmailCoord($email = null){

		if($email != null):

			$this->db->select('email');

			$query = $this->db->get_where('usuarios', array('email' => $email));

			return $query->row();

		endif;
	}

	public function consultEmailProf($email = null){

		if($email != null):

			$this->db->select('email');

			$query = $this->db->get_where('professorLogin', array('email' => $email));

			return $query->row();

		endif;
	}

	public function consultAlunoMat($matricula = null){

		if($matricula != null):

			$query = $this->db->get_where('alunoLogin', array('matricula' => $matricula));

			return $query->row();

		endif;
	}

	// FIM

	public function consultNota($matricula = null, $disciplina = null, $bimestre = null, $avaliacao = null){

		$this->db->select('matricula');
		$this->db->select('disciplina');
		$this->db->select('bimestre');
		$this->db->select('avaliacao');

		$this->db->where('matricula', $matricula);
		$this->db->where('disciplina', $disciplina);
		$this->db->where('bimestre', $bimestre);
		$this->db->where('avaliacao', $avaliacao);

		$query = $this->db->get('nota');

		return $query->row();
	}


	public function alterarNota($matricula = null, $disciplina = null, $bimestre = null, $avaliacao = null){

		$this->db->select('disciplina');
		$this->db->select('bimestre');
		$this->db->select('avaliacao');
		$this->db->select('nota');
		$this->db->select('ID');

		$this->db->where('matricula', $matricula);
		$this->db->where('disciplina', $disciplina);
		$this->db->where('bimestre', $bimestre);
		$this->db->where('avaliacao', $avaliacao);

		$query = $this->db->get('nota');

		return $query->row();
	}


	public function consultSituacao($matricula = null, $disciplina = null){

		if($matricula != null && $disciplina != null):

			$this->db->select('disciplina');


			$this->db->where('matricula', $matricula);
			$this->db->where('disciplina', $disciplina);

			$query = $this->db->get('situacaoAluno');

			return $query->row();

		endif;
	}


	public function consultExameFinal($matricula = null, $disciplina = null){

		if($matricula != null && $disciplina != null):

			$this->db->select('disciplina');

			$this->db->where('matricula', $matricula);
			$this->db->where('disciplina', $disciplina);

			$query = $this->db->get('exameFinal');

			return $query->row();

		endif;
	}


	public function getDisciplinas($matricula = null){

		$this->db->cache_on();

		if($matricula != null):

			$this->db->select('materia1');
			$this->db->select('materia2');
			$this->db->select('materia3');

			$query = $this->db->get_where('professor', array('MATRICULA' => $matricula));

			return $query->row();

		endif;

		$this->db->cache_off();
	}


	public function insertToken($token = null){

		if($token != null):

			$this->db->insert('codigo', $token);
		endif;

	}

	public function checkToken($token = null){

		$this->db->select('codigo');
		$this->db->where('codigo', $token);

		$query = $this->db->get('codigo');

		return $query->row();
	}


	public function deleteToken($token = null){

		$this->db->where('codigo', $token);

		$this->db->delete('codigo');
	}


	public function alterarSenhaC($dados = null, $email = null){

		$this->db->where('email', $email);

		$this->db->update('usuarios', $dados);

		$this->db->cache_delete('principal', 'navegarMenuCoord');

	}


	public function alterarSenhaP($dados = null, $email = null){

		$this->db->where('email', $email);

		$this->db->update('professorLogin', $dados);

		$this->db->cache_delete('principal', 'Menu');

	}

	// ESTAS FUNÇÕES RECUPERAM O NOME DA TURMA A PARTIR DO CÓDIGO

	public function getTurmaNomeFM($codigo = null){

		if($codigo != null):

			$this->db->select('nome');
			$this->db->where('codigo', $codigo);

			$query = $this->db->get('turmaFundamentalManha');

			return $query->row();

		endif;
	}


	public function getTurmaNomeFT($codigo = null){

		if($codigo != null):

			$this->db->select('nome');
			$this->db->where('codigo', $codigo);

			$query = $this->db->get('turmaFundamentalTarde');

			return $query->row();

		endif;
	}


	public function getTurmaNomeMM($codigo = null){

		if($codigo != NULL):

			$this->db->select('nome');
			$this->db->where('codigo', $codigo);

			$query = $this->db->get('turmaMedioManha');

			return $query->row();

		endif;
	}


	public function getTurmaNomeMT($codigo = null){

		if($codigo != null):

			$this->db->select('nome');
			$this->db->where('codigo', $codigo);

			$query = $this->db->get('turmaMedioTarde');

			return $query->row();
		endif;

	}
	// FIM

}
