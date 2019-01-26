<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_model extends CI_model {

	public function getRegistros($matricula = null, $codigoTurma = null){

		$this->db->cache_on();

		if($matricula != null && $codigoTurma != null):

			$this->db->order_by('ID', 'DESC');

			$this->db->where('matricula', $matricula);
			$this->db->where('turma', $codigoTurma);
			$query = $this->db->get('registroAula');

			return $query->result();

		endif;

		$this->db->cache_off();

	}


	public function getAnexo($matricula=NULL, $codigoTurma = null){

		$this->db->cache_on();

		if($matricula != null && $codigoTurma != null):

			$this->db->order_by('ID', 'DESC');

			$this->db->select('discArquivo');
			$this->db->select('anexoArquivo');
			$this->db->select('ID');

			$this->db->where('matProfessor', $matricula);
			$this->db->where('turmaArquivo', $codigoTurma);

			$query = $this->db->get('arquivosAluno');

			return $query->result();
		endif;

		$this->db->cache_off();
	}


	public function getTurmaRegistro($codigoTurma = null){

		$this->db->cache_on();

		if($codigoTurma != null):

			$this->db->order_by('ID', 'DESC');

			$this->db->select('professor');
			$this->db->select('disciplina');
			$this->db->select('dataRegistro');
			$this->db->select('conteudo');
			$this->db->select('atividade');

			$query = $this->db->get_where('registroAula', array('turma' => $codigoTurma));

			return $query->result();

		endif;

		$this->db->cache_off();

	}


	public function numFaltas($disciplina = null, $matricula = null){

		if($disciplina != null && $matricula != null):

			$this->db->order_by('ID', 'DESC');
			$this->db->select('dataRegistro');

			$this->db->where('disciplina', $disciplina);
			$this->db->where('matricula', $matricula);

			$query = $this->db->get('falta');

			return $query->result();

		endif;
	}

	public function getNotabyMatricula($matricula = null, $disciplina = null, $bimestre = null){

		if($matricula != null && $disciplina != null && $bimestre != null):

			$this->db->select('bimestre');
			$this->db->select('avaliacao');
			$this->db->select('nota');

			$this->db->where('matricula', $matricula);
			$this->db->where('disciplina', $disciplina);
			$this->db->where('bimestre', $bimestre);

			$query = $this->db->get('nota');

			return $query->result();

		endif;

	}

	public function getSituacaobyMatricula($matricula = null, $disciplina = null){

		if($matricula != null && $disciplina != null):

			$this->db->select('disciplina');
			$this->db->select('situacao');

			$this->db->where('matricula', $matricula);
			$this->db->where('disciplina', $disciplina);

			$query = $this->db->get('situacaoAluno');

			return $query->row();

		endif;
	}


	public function getExameFinalbyMat($matricula = null, $disciplina = null){

		if($matricula != null && $disciplina != null):

			$this->db->select('disciplina');
			$this->db->select('notaFinal');
			$this->db->select('resultadoFinal');

			$this->db->where('matricula', $matricula);
			$this->db->where('disciplina', $disciplina);

			$query = $this->db->get('exameFinal');

			return $query->row();

		endif;
	}

	public function getFoto($ID = null){

		if($ID != NULL):

			$this->db->select('fotoAluno');
			$this->db->where('matricula', $ID);

			$query = $this->db->get('arquivoFotos');

			return $query->row();
		endif;
	}

	public function deleteFoto($fotoNome = null){

		if($fotoNome != null):

			$this->db->where('fotoAluno', $fotoNome);
			$this->db->delete('arquivoFotos');

		endif;
	}


	// ESTA FUNÇÃO LISTA PARA O ALUNO OS ANEXOS LANÇADOS NA SUA TURMA
	public function getAnexosAluno($codigoTurma = null){

		$this->db->cache_on();

		if($codigoTurma != null):

			$this->db->order_by('ID', 'DESC');

			$this->db->select('discArquivo');
			$this->db->select('anexoArquivo');
			$this->db->select('ID');

			$this->db->where('turmaArquivo', $codigoTurma);

			$query = $this->db->get('arquivosAluno');

			return $query->result();
			
		endif;

		$this->db->cache_off();
	}
}
