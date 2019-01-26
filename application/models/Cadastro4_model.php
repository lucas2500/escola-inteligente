<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro4_model extends CI_model {


	public function apagarUsers($matricula = null){

		if($matricula != null):

			$this->db->delete('usuarios', array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'mensagemCoordenacao');

			$this->db->cache_delete('principal', 'Mensagens');

		endif;

	}

	public function apagarAlunoFundManha($matricula = null){

		if($matricula != null):

			$this->db->delete('alunoFundamentalManha', array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarFundamental');

		endif;

	}

	public function apagarAlunoFundTarde($matricula = null){

		if($matricula != null):

			$this->db->delete('alunoFundamentalTarde', array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarFundamental');

		endif;

	}

	public function apagarAlunoMedManha($matricula = null){

		if($matricula != null):

			$this->db->delete('alunoMedioManha', array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarMedio');

		endif;

	}

	public function apagarAlunoMedTarde($matricula = null){

		if($matricula != null):

			$this->db->delete('alunoMedioTarde', array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'montarMedio');

		endif;

	}

	public function apagarProfessor($matricula = null){

		if($matricula != null):

			$this->db->delete('professor', array('matricula' => $matricula));

			$this->db->cache_delete('principal', 'colegasCoordenacao');

			$this->db->cache_delete('principal', 'mensagemCoordenacao');

			$this->db->cache_delete('principal', 'montarHorarios');

		endif;
	}

	// ESTA FUNÇÃO EXCLUI O ACESSO DO PROFESSOR QUANDO ELE É EXCLUIDO DA LISTA DE PROFESSORES
	public function excluirProfAcesso($matricula = null){

		if($matricula != null):

			$this->db->delete('professorLogin', array('matricula' => $matricula));

		endif;
	}

	public function apagarAviso($ID = null){

		if($ID != null):

			$this->db->delete('aviso', array('ID' => $ID));

		endif;
	}

	public function apagarMSG($ID = null){

		if($ID != null):

			$this->db->delete('mensagem', array('ID' => $ID));

		endif;
	}


	public function deleteAllMSG($ID = null){

		if($ID != null):

			$this->db->delete('mensagem', array('destinatario' => $ID));

		endif;
	}

	// APAGANDO HORÁRIO, TURMAS E ALUNOS DAQUI PARA BAIXO, ESSAS FUNÇÕES SÃO USADAS
	// QUANDO APAGO UM ALUNO, POIS TENHO QUE APAGAR TUDO RELACIONADO A ELE

	// FUNDAMENTAL MANHÃ
	public function apagarTurmaFundManha($ID = null){

		if($ID != null):

			$this->db->delete('turmaFundamentalManha', array('codigo' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');

		$this->db->cache_delete('principal', 'montarFundamental');
	}


	public function deleteAlunoFundManha($ID = null){

		if($ID != null):

			$this->db->delete(' alunoFundManha', array('turma' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}

	public function SearchHorarioFundManhaByID($ID = null){


		if($ID != null):

			$query = $this->db->get_where('horarioFundManha', array('codigoTurma' => $ID));

			return $query->row();

		endif;
	}


	public function deleteHorarioFundManha($ID = null){

		if($ID != null):

			$this->db->delete(' horarioFundManha', array('codigoTurma' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}
	// FIM

	// FUNDAMENTAL TARDE
	public function apagarTurmaFundTarde($ID = null){

		if($ID != null):

			$this->db->delete('turmaFundamentalTarde', array('codigo' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');

		$this->db->cache_delete('principal', 'montarFundamental');
	}


	public function deleteAlunoFundTarde($ID = null){

		if($ID != null):

			$this->db->delete(' alunoFundTarde', array('turma' => $ID));

		endif;


		$this->db->cache_delete('principal', 'menuAluno');
	}


	public function SearchHorarioFundTardeByID($ID = null){

		if($ID != null):

			$query = $this->db->get_where('horarioFundTarde', array('codigoTurma' => $ID));

			return $query->row();

		endif;
	}


	public function deleteHorarioFundTarde($ID = null){

		if($ID != null):

			$this->db->delete('horarioFundTarde', array('codigoTurma' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}
	// FIM


	// MÉDIO MANHÃ
	public function apagarTurmaMedManha($ID = null){

		if($ID != null):

			$this->db->delete('turmaMedioManha', array('codigo' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}


	public function deleteAlunoMedManha($ID = null){

		if($ID != null):

			$this->db->delete(' alunoMedManha', array('turma' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');

		$this->db->cache_delete('principal', 'montarMedio');
	}


	public function SearchHorarioMedManhaByID($ID = null){

		if($ID != null):

			$query = $this->db->get_where('horarioMedManha', array('codigoTurma' => $ID));

			return $query->row();

		endif;
	}


	public function deleteHorarioMedManha($ID = null){

		if($ID != null):

			$this->db->delete(' horarioMedManha', array('codigoTurma' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}
	// FIM


	// MÉDIO TARDE
	public function apagarTurmaMedTarde($ID = null){

		if($ID != null):

			$this->db->delete('turmaMedioTarde', array('codigo' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');

		$this->db->cache_delete('principal', 'montarMedio');
	}


	public function deleteAlunoMedTarde($ID = null){

		if($ID != null):

			$this->db->delete(' alunoMedTarde', array('turma' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}


	public function SearchHorarioMedTardeByID($ID = null){

		if($ID != null):

			$query = $this->db->get_where('horarioMedTarde', array('codigoTurma' => $ID));

			return $query->row();

		endif;

	}

	public function deleteHorarioMedTarde($ID = null){

		if($ID != null):

			$this->db->delete(' horarioMedTarde', array('codigoTurma' => $ID));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}

	// FIM


	// EXCLUI O ALUNO DA TURMA QUANDO ELE É EXCLUIDO DO SISTEMA
	public function excluirAlunoFundManha($matricula = null){

		if($matricula != null):

			$this->db->delete(' alunoFundManha', array('matricula' => $matricula));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}



	public function excluirAlunoFundTarde($matricula = null){

		if($matricula != null):

			$this->db->delete(' alunoFundTarde', array('matricula' => $matricula));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}



	public function excluirAlunoMedManha($matricula = null){

		if($matricula != null):

			$this->db->delete(' alunoMedManha', array('matricula' => $matricula));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}

	

	public function excluirAlunoMedTarde($matricula = null){

		if($matricula != null):

			$this->db->delete(' alunoMedTarde', array('matricula' => $matricula));

		endif;

		$this->db->cache_delete('principal', 'menuAluno');
	}
	// FIM


	public function getAlunoFundManhaByID($ID = null){

		if($ID != null):
			$query = $this->db->get_where('alunoFundamentalManha', array('Matricula' => $ID));

			return $query->row();

		endif;

	}

	// FUNÇÕES USADAS PARA EDITAR E TRANSFERIR ALUNOS
	public function getAlunoFundTardeByID($ID = null){

		if($ID != null):
			$query = $this->db->get_where('alunoFundamentalTarde', array('Matricula' => $ID));

			return $query->row();

		endif;

	}

	public function getAlunoMedManhaByID($ID = null){

		if($ID != null):
			$query = $this->db->get_where('alunoMedioManha', array('Matricula' => $ID));

			return $query->row();

		endif;

	}

	public function getAlunoMedTardeByID($ID = null){

		if($ID != null):
			$query = $this->db->get_where('alunoMedioTarde', array('Matricula' => $ID));

			return $query->row();

		endif;

	}

	public function getProfessorByID($ID = null){

		if($ID != null):
			$query = $this->db->get_where('professor', array('MATRICULA' => $ID));

			return $query->row();

		endif;

	}
	// FIM


	// ESTA FUNÇÃO EXCLUI O ACESSO DO ALUNO QUANDO ELE É EXCLUÍDO DO SISTEMA
	public function excluirAlunoAcesso($matricula = null){

		if($matricula != null):

			$this->db->delete('alunoLogin', array('Matricula' => $matricula));
			
		endif;

	}
}


