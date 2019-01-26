<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro5_model extends CI_model {
	

	public function editarProfessor($dados = null, $matricula = null){

		if($dados != null && $matricula != null):

			$this->db->update('professor', $dados, array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'mensagemCoordenacao');

			$this->db->cache_delete('principal', 'Mensagens');

			$this->db->cache_delete('principal', 'montarHorarios');

			$this->db->cache_delete('professor', 'alunosFundManha');

			$this->db->cache_delete('professor', 'alunosFundTarde');

			$this->db->cache_delete('professor', 'alunosMedManha');

			$this->db->cache_delete('professor', 'alunosMedTarde');

		endif;
	}


	public function editarHorarioFundManha($dados = null, $codigoTurma = null){

		if($dados != null && $codigoTurma != null):

			$this->db->update('horarioFundManha', $dados, array('codigoTurma' => $codigoTurma));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}


	public function editarHorarioFundTarde($dados=NULL, $codigoTurma=NULL){

		if($dados != NULL && $codigoTurma != NULL):

			$this->db->update('horarioFundTarde', $dados, array('codigoTurma'=>$codigoTurma));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}


	public function editarHorarioMedManha($dados=NULL, $codigoTurma=NULL){

		if($dados != NULL && $codigoTurma != NULL):

			$this->db->update('horarioMedManha', $dados, array('codigoTurma'=>$codigoTurma));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}


	public function editarHorarioMedTarde($dados = null, $codigoTurma = null){

		if($dados != null && $codigoTurma != null):

			$this->db->update('horarioMedTarde', $dados, array('codigoTurma' => $codigoTurma));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}



	public function editarAlunoFundManha($dados = null, $matricula = null){

		if($dados != null && $matricula != null):

			$this->db->update('alunoFundamentalManha', $dados, array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarFundamental');

		endif;
	}

	public function editarAlunoFundTarde($dados = null, $matricula = null){


		if($dados != null && $matricula != null):

			$this->db->update('alunoFundamentalTarde', $dados, array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarFundamental');

		endif;
	}

	public function editarAlunoMedManha($dados = null, $matricula = null){


		if($dados != null && $matricula != null):

			$this->db->update('alunoMedioManha', $dados, array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarMedio');
			
		endif;
	}

	public function editarAlunoMedTarde($dados = null, $matricula = null){


		if ($dados != null && $matricula != null):

			$this->db->update('alunoMedioTarde', $dados, array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarMedio');

		endif;
	}
}


