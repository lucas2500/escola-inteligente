<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_model extends CI_model {


	public function getFunc(){
		
		$this->db->cache_on();

		$this->db->select('nome');
		$this->db->select('MATRICULA');
		$this->db->select('materia1');
		$this->db->select('materia2');
		$this->db->select('materia3');
		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get( 'professor');
		return $query->result();

		$this->db->cache_off();
	}
	

	public function addCadastrosProfessor($dados = null){

		if($dados != null):

			$this->db->insert('professor', $dados);

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'mensagemCoordenacao');

			$this->db->cache_delete('principal', 'montarHorarios');

			$this->db->cache_delete('principal', 'Mensagens');

		endif;
	}

	public function addSenhaProfessor($dados = null){

		if($dados != null):
			$this->db->insert('professorLogin', $dados);
			
		endif;
	}


	public function addCadastrosAlunoFundManha($dados = null){

		if($dados != null):

			$this->db->insert('alunoFundamentalManha', $dados);

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarFundamental');

			$this->db->cache_delete('principal', 'menuAluno');

		endif;
	}

	public function addCadastrosAlunoFundTarde($dados = null){

		if($dados != null):

			$this->db->insert('alunoFundamentalTarde', $dados);

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarFundamental');

			$this->db->cache_delete('principal', 'menuAluno');

		endif;
	}


	public function addCadastrosAlunoMedManha($dados = null){

		if($dados != null):

			$this->db->insert('alunoMedioManha', $dados);

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarMedio');

			$this->db->cache_delete('principal', 'menuAluno');

		endif;
	}

	public function addCadastrosAlunoMedTarde($dados = null){

		if($dados != null):

			$this->db->insert('alunoMedioTarde', $dados);

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarMedio');

			$this->db->cache_delete('principal', 'menuAluno');

		endif;
	}


	public function addSenhaAluno($dados = null){

		if($dados != null):
			$this->db->insert('alunoLogin', $dados);
			
		endif;
	}


	public function insertFoto($dados = null){

		if($dados != null):
			$this->db->insert('arquivoFotos', $dados);

		endif;
	}


	public function addTurmaFundManha($dados = null){

		if($dados != null):

			$this->db->insert('turmaFundamentalManha', $dados);

			$this->db->cache_delete('principal', 'montarFundamental');

		endif;
	}


	public function addTurmaFundTarde($dados = null){

		if($dados != null):

			$this->db->insert('turmaFundamentalTarde', $dados);

			$this->db->cache_delete('principal', 'montarFundamental');

		endif;
	}


	public function addTurmaMedManha($dados = null){

		if($dados != null):

			$this->db->insert('turmaMedioManha', $dados);

			$this->db->cache_delete('principal', 'montarMedio');

		endif;
	}


	public function addTurmaMedTarde($dados = null){

		if($dados != null):

			$this->db->insert('turmaMedioTarde', $dados);

			$this->db->cache_delete('principal', 'montarMedio');

		endif;

	}

	public function addNovosUsers($dados = null){

		if($dados != null):

			$this->db->insert('usuarios', $dados);

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'mensagemCoordenacao');

			$this->db->cache_delete('principal', 'Mensagens');

		endif;
	}


	public function getAlunoFundamentalManha(){
		
		$this->db->cache_on();

		$this->db->select('nome');
		$this->db->select('Matricula');
		$this->db->select('turno');
		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get( 'alunoFundamentalManha');
		return $query->result();

		$this->db->cache_off();
	}

	public function getAlunoFundamentalTarde(){

		$this->db->cache_on();
		
		$this->db->select('nome');
		$this->db->select('Matricula');
		$this->db->select('turno');
		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get( 'alunoFundamentalTarde');
		return $query->result();

		$this->db->cache_off();

	}

	public function getTurmaFundamentalManha(){
		

		$this->db->select('nome');
		$this->db->select('codigo');
		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get( 'turmaFundamentalManha');
		return $query->result();

	}

	public function getTurmaFundamentalTarde(){
		
		$this->db->select('nome');
		$this->db->select('codigo');
		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get( 'turmaFundamentalTarde');
		return $query->result();

	}

	public function getAlunoMedioManha(){

		$this->db->cache_on();
		
		$this->db->select('nome');
		$this->db->select('Matricula');
		$this->db->select('turno');
		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get( 'alunoMedioManha');
		return $query->result();

		$this->db->cache_off();

	}

	public function getAlunoMedioTarde(){

		$this->db->cache_on();
		
		$this->db->select('nome');
		$this->db->select('Matricula');
		$this->db->select('turno');
		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get( 'alunoMedioTarde');
		return $query->result();

		$this->db->cache_off();

	}

	public function getTurmaMedioManha(){

		$this->db->select('nome');
		$this->db->select('codigo');
		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get( 'turmaMedioManha');
		return $query->result();

	}

	public function getTurmaMedioTarde(){

		
		$this->db->select('nome');
		$this->db->select('codigo');
		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get( 'turmaMedioTarde');
		return $query->result();


	}

	public function getUsersCoord(){

		$this->db->cache_on();
		
		$this->db->select('nome');
		$this->db->select('matricula');
		$this->db->order_by('nome', 'ASC');	
		$query = $this->db->get( 'usuarios');
		return $query->result();

		$this->db->cache_off();

	}
}


