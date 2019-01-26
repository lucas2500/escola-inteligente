<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro3_model extends CI_model {


	public function addHorarioFundManha($dados = null){

		if($dados != null):

			$this->db->insert('horarioFundManha', $dados);

		endif;

		$this->db->cache_delete('principal', 'menuAluno');


	}

	public function addHorarioFundTarde($dados = null){

		if($dados != NULL):

			$this->db->insert('horarioFundTarde', $dados);

		endif;

		$this->db->cache_delete('principal', 'menuAluno');

	}

	public function addHorarioMedManha($dados = null){

		if($dados != null):

			$this->db->insert('horarioMedManha', $dados);

		endif;

		$this->db->cache_delete('principal', 'menuAluno');

	}

	public function addHorarioMedTarde($dados = null){

		if($dados != null):

			$this->db->insert('horarioMedTarde', $dados);

		endif;

		$this->db->cache_delete('principal', 'menuAluno');

	}

	public function mostrarHorarioFundManha($ID = null){

		if($ID != null):

			$query = $this->db->get_where('horarioFundManha', array('codigoTurma' => $ID));

			return $query->result();

		endif;

	}

	public function mostrarHorarioFundTarde($ID=null){

		if($ID != null):

			$query = $this->db->get_where('horarioFundTarde', array('codigoTurma' => $ID));

			return $query->result();

		endif;

	}

	public function mostrarHorarioMedManha($ID = null){

		if($ID != null):

			$query = $this->db->get_where('horarioMedManha', array('codigoTurma' => $ID));

			return $query->result();

		endif;

	}

	public function mostrarHorarioMedTarde($ID = null){

		if($ID != null):

			$query = $this->db->get_where('horarioMedTarde', array('codigoTurma' => $ID));

			return $query->result();

		endif;

	}

}


