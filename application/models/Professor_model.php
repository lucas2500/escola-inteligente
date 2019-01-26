<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor_model extends CI_model {
	

	public function insertNota($dados = null){

		if($dados != NULL):
			$this->db->insert('nota', $dados);

		endif;
	}

	public function updateNota($nota = null, $ID = null){

		if($nota != null && $ID != null):

			$this->db->where('ID', $ID);

			$this->db->update('nota', $nota);

		endif;
	}

	public function Situacao($dados = null){

		if($dados != null):
			$this->db->insert('situacaoAluno', $dados);

		endif;

	}

	public function provaFinal($dados = null){

		if($dados != NULL):
			$this->db->insert('exameFinal', $dados);

		endif;

	}


	public function insertRegistroAula($dados = null){

		if($dados != null):
			$this->db->insert('registroAula', $dados);

		endif;

		$this->db->cache_delete('professor', 'alunosFundManha');

		$this->db->cache_delete('professor', 'alunosFundTarde');

		$this->db->cache_delete('professor', 'alunosMedManha');

		$this->db->cache_delete('professor', 'alunosMedTarde');

		$this->db->cache_delete('principal', 'alunosCoordenacaoFundManha');

		$this->db->cache_delete('principal', 'alunosCoordenacaoFundTarde');

		$this->db->cache_delete('principal', 'alunosCoordenacaoMedManha');

		$this->db->cache_delete('principal', 'alunosCoordenacaoMedTarde');
	}


	public function excluirRegistroAula($ID = null){

		if($ID != null):

			$this->db->where('ID', $ID);

			$this->db->delete('registroAula');
		endif;

		$this->db->cache_delete('professor', 'alunosFundManha');

		$this->db->cache_delete('professor', 'alunosFundTarde');

		$this->db->cache_delete('professor', 'alunosMedManha');

		$this->db->cache_delete('professor', 'alunosMedTarde');

		$this->db->cache_delete('principal', 'alunosCoordenacaoFundManha');

		$this->db->cache_delete('principal', 'alunosCoordenacaoFundTarde');

		$this->db->cache_delete('principal', 'alunosCoordenacaoMedManha');

		$this->db->cache_delete('principal', 'alunosCoordenacaoMedTarde');

	}


	public function getNota($ID = null){

		if($ID != null):

			$this->db->select('disciplina');
			$this->db->select('bimestre');
			$this->db->select('avaliacao');
			$this->db->select('nota');

			$this->db->order_by('disciplina', 'ASC');


			$query = $this->db->get_where('nota', array('matricula' => $ID));

			return $query->result();

		endif;
	}


	public function getSituacao($ID = null){

		if($ID != null):

			$this->db->select('disciplina');
			$this->db->select('situacao');
			$this->db->order_by('disciplina', 'ASC');

			$query = $this->db->get_where('situacaoAluno', array('matricula' => $ID));

			return $query->result();

		endif;
	}


	public function getResultFinal($ID = null){

		if($ID != null):
			
			$this->db->select('disciplina');
			$this->db->select('notaFinal');
			$this->db->select('resultadoFinal');

			$this->db->order_by('disciplina', 'ASC');

			$query = $this->db->get_where('exameFinal', array('matricula' => $ID));

			return $query->result();

		endif;
	}


	public function getFalta($ID = null){

		if($ID != null):
			
			$this->db->select('disciplina');
			$this->db->select('dataRegistro');

			$this->db->order_by('ID', 'DESC');
			$query = $this->db->get_where('falta', array('matricula' => $ID));

			return $query->result();

		endif;
	}


	public function insertFalta($dados = null){

		if($dados != null):
			$this->db->insert('falta', $dados);

		endif;

	}


	public function removeFalta($disciplina = null, $matricula = null, $data = null){

		if($disciplina != null && $matricula != null && $data != null):
			
			$this->db->where('disciplina', $disciplina);
			$this->db->where('matricula', $matricula);
			$this->db->where('dataRegistro', $data);

			$this->db->delete('falta');

		endif;

	}


	public function updateDadosAluno($dados = null, $matricula = null){

		if($dados != null && $matricula != null):
			$this->db->update('alunoLogin', $dados, array('Matricula' => $matricula));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}


	public function insertArquivo($dados = null){

		if($dados != null):
			$this->db->insert('arquivo', $dados);

		endif;
	}


	public function getArquivo(){

		$this->db->order_by('ID', 'DESC');

		$query = $this->db->get('arquivo');

		if($query != null):

			return $query->result();

		endif;
	}


	public function downloadArquivo($ID = null){

		if($ID != null):

			$this->db->select('nome');
			$this->db->select('ID');
			$query = $this->db->get_where('arquivo', array('ID' => $ID));

			return $query->row();

		endif;

	}


	public function apagarArquivo($ID = null){

		if($ID != null):

			$this->db->delete('arquivo', array('ID'=>$ID));
		endif;
	}


	public function insertAnexoAluno($dados = null){

		if($dados != null):

			$this->db->insert('arquivosAluno', $dados);
		endif;

		$this->db->cache_delete('professor', 'alunosFundManha');

		$this->db->cache_delete('professor', 'alunosFundTarde');

		$this->db->cache_delete('professor', 'alunosMedManha');

		$this->db->cache_delete('professor', 'alunosMedTarde');

		$this->db->cache_delete('principal', 'menuAluno');

		$this->db->cache_delete('principal', 'alunosCoordenacaoFundManha');

		$this->db->cache_delete('principal', 'alunosCoordenacaoFundTarde');

		$this->db->cache_delete('principal', 'alunosCoordenacaoMedManha');

		$this->db->cache_delete('principal', 'alunosCoordenacaoMedTarde');

	}


	public function downloadAnexo($ID = null){

		if($ID != null):

			$this->db->select('anexoArquivo');
			$this->db->select('ID');

			$this->db->where('ID', $ID);

			$query = $this->db->get('arquivosAluno');

			return $query->row();

		endif;
	}


	public function apagarAnexo($ID = null){

		if($ID != null):

			$this->db->where('ID', $ID);

			$this->db->delete('arquivosAluno');
			
		endif;

		$this->db->cache_delete('professor', 'alunosFundManha');

		$this->db->cache_delete('professor', 'alunosFundTarde');

		$this->db->cache_delete('professor', 'alunosMedManha');

		$this->db->cache_delete('professor', 'alunosMedTarde');

		$this->db->cache_delete('principal', 'menuAluno');

		$this->db->cache_delete('principal', 'alunosCoordenacaoFundManha');

		$this->db->cache_delete('principal', 'alunosCoordenacaoFundTarde');

		$this->db->cache_delete('principal', 'alunosCoordenacaoMedManha');

		$this->db->cache_delete('principal', 'alunosCoordenacaoMedTarde');
	}
}


