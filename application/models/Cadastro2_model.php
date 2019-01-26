<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro2_model extends CI_model {



	public function addMSG($dados = null){

		if($dados != null):

			$this->db->insert('mensagem', $dados);

		endif;

	}

	public function getMSG($ID = null){

		if($ID != null):
			$this->db->order_by('ID', 'DESC');
			$this->db->where('destinatario', $ID);
			// $this->db->limit(1);
			$query = $this->db->get('mensagem');
			return $query->result();

		endif;	
		

	}

	public function addAviso($dados = null){

		if($dados != null):

			$this->db->insert('aviso', $dados);

		endif;

	}


	public function getAviso(){
		

		$this->db->order_by( 'ID', 'DESC');
		$query = $this->db->get('aviso');
		return $query->result();

	}


	public function alocarAlunoFundManha($dados = null){

		if($dados != null):

			$this->db->insert('alunoFundManha', $dados);

		endif;

		$this->db->cache_delete('principal', 'menuAluno');

	}

	public function alocarAlunoFundTarde($dados = null){

		if($dados != null):

			$this->db->insert('alunoFundTarde', $dados);

		endif;

		$this->db->cache_delete('principal', 'menuAluno');

	}

	public function alocarAlunoMedManha($dados = null){

		if($dados != null):

			$this->db->insert('alunoMedManha', $dados);

		endif;

		$this->db->cache_delete('principal', 'menuAluno');

	}

	public function alocarAlunoMedTarde($dados = null){

		if($dados != null):

			$this->db->insert('alunoMedTarde', $dados);

		endif;

	$this->db->cache_delete('principal', 'menuAluno');

	}


	public function mostrarAlunosFundManha($ID = null){

		if($ID != null):

			$this->db->order_by('nome', 'ASC');
			$query = $this->db->get_where('alunoFundManha', array('turma' => $ID));

			return $query->result();

		endif;

	}

	// FUNÇÕES QUE MOSTRAM O ALUNO INDIVIDUALMENTE EM CADA TURMA

	public function getAlunoFundManha($ID = null){

		if($ID != null):

			$query = $this->db->get_where('alunoFundManha', array('matricula' => $ID));

			return $query->row();

		endif;

	}

	public function getAlunoFundTarde($ID = null){

		if($ID != null):

			$query = $this->db->get_where('alunoFundTarde', array('matricula' => $ID));

			return $query->row();

		endif;

	}

	public function getAlunoMedManha($ID = null){

		if($ID != null):

			$query = $this->db->get_where('alunoMedManha', array('matricula' => $ID));

			return $query->row();

		endif;

	}

	public function getAlunoMedTarde($ID = null){

		if($ID != null):

			$query = $this->db->get_where('alunoMedTarde', array('matricula' => $ID));

			return $query->row();

		endif;

	}

	// FIM DAS FUNÇÕES

	public function mostrarAlunosFundTarde($ID = null){

		if($ID != null):

			$this->db->order_by('nome', 'ASC');
			$query = $this->db->get_where('alunoFundTarde', array('turma' => $ID));

			return $query->result();

		endif;

	}

	public function mostrarAlunosMedManha($ID = null){

		if($ID != null):

			$this->db->order_by('nome', 'ASC');
			$query = $this->db->get_where('alunoMedManha', array('turma' => $ID));

			return $query->result();

		endif;

	}

	public function mostrarAlunosMedTarde($ID = null){

		if($ID != null):

			$this->db->order_by('nome', 'ASC');
			$query = $this->db->get_where('alunoMedTarde', array('turma' => $ID));

			return $query->result();

		endif;

	}

}


