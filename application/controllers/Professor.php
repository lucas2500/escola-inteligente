<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('cadastro_model', 'turmas');
		$this->load->model('cadastro2_model', 'aluno');
		$this->load->model('cadastro3_model', 'aluno2');
		$this->load->model('login_model', 'login');
		$this->load->model('professor_model', 'prof');
		$this->load->model('Seguranca_model', 'sec');
		$this->load->model('Registro_model', 'reg');

		$this->load->library('table');
		// $this->load->library('user_agent');

	}	

	// ALUNOS FUNDAMENTAL MANHÃ

	public function alunosFundManha($ID = null){

		$this->logProf();

		if($ID == null){

			redirect('/principal/notas');

		}

		$query['matricula'] = $this->session->userdata('MATRICULA');

		$data['turmas'] = $this->aluno->mostrarAlunosFundManha($ID);

		$data['turma'] = $this->turmas->getTurmaFundamentalManha();

		$data['materia'] = $this->sec->getDisciplinas($query['matricula']);

		$data['registro'] = $this->reg->getRegistros($query['matricula'], $ID);

		$data['anexo'] = $this->reg->getAnexosAluno($ID);

		$this->load->view('professor/nav2');
		$this->load->view('professor/bl_virtual', $data);
		$this->load->view('professor/body');

	}


	// ALUNOS FUNDAMENTAL TARDE

	public function alunosFundTarde($ID = null){

		$this->logProf();	

		if($ID == null){

			redirect('/principal/notas');

		}

		$query['matricula'] = $this->session->userdata('MATRICULA');

		$data['turmas'] = $this->aluno->mostrarAlunosFundTarde($ID);

		$data['turma'] = $this->turmas->getTurmaFundamentalTarde();

		$data['materia'] = $this->sec->getDisciplinas($query['matricula']);

		$data['registro'] = $this->reg->getRegistros($query['matricula'], $ID);

		$data['anexo'] = $this->reg->getAnexo($query['matricula'], $ID);

		$this->load->view('professor/nav2');
		$this->load->view('professor/bl_virtual', $data);
		$this->load->view('professor/body');

	}

	// ALUNOS MÉDIO MANHÃ

	public function alunosMedManha($ID = null){

		$this->logProf();

		if($ID == null){

			redirect('/principal/notas');

		}

		$query['matricula'] = $this->session->userdata('MATRICULA');

		$data['turmas'] = $this->aluno->mostrarAlunosMedManha($ID);

		$data['turma'] = $this->turmas->getTurmaMedioManha();

		$data['materia'] = $this->sec->getDisciplinas($query['matricula']);

		$data['registro'] = $this->reg->getRegistros($query['matricula'], $ID);

		$data['anexo'] = $this->reg->getAnexo($query['matricula'], $ID);

		$this->load->view('professor/nav2');
		$this->load->view('professor/bl_virtual', $data);
		$this->load->view('professor/body');

	}


	// ALUNOS MÉDIO TARDE

	public function alunosMedTarde($ID = null){

		$this->logProf();

		if($ID == null){

			redirect('/principal/notas');

		}

		$query['matricula'] = $this->session->userdata('MATRICULA');

		$data['turmas'] = $this->aluno->mostrarAlunosMedTarde($ID);

		$data['turma'] = $this->turmas->getTurmaMedioTarde();

		$data['materia'] = $this->sec->getDisciplinas($query['matricula']);

		$data['registro'] = $this->reg->getRegistros($query['matricula'], $ID);

		$data['anexo'] = $this->reg->getAnexo($query['matricula'], $ID);

		$this->load->view('professor/nav2');
		$this->load->view('professor/bl_virtual', $data);
		$this->load->view('professor/body');

	}

	public function horarioFundManha($ID = null){

		$this->logProf();

		if($ID == null){

			redirect("principal/turmas");
		}

		$query['horarios'] = $this->aluno2->mostrarHorarioFundManha($ID);

		$this->load->view('professor/nav2');
		$this->load->view('professor/horario', $query);
		$this->load->view('professor/body');

	}


	public function horarioFundTarde($ID = null){

		$this->logProf();

		if($ID == null){

			redirect("principal/turmas");
		}

		$query['horarios'] = $this->aluno2->mostrarHorarioFundTarde($ID);

		$this->load->view('professor/nav2');
		$this->load->view('professor/horario', $query);
		$this->load->view('professor/body');

	}

	public function horarioMedManha($ID = null){

		$this->logProf();

		if($ID == null){

			redirect("principal/turmas");
		}

		$query['horarios'] = $this->aluno2->mostrarHorarioMedManha($ID);

		$this->load->view('professor/nav2');
		$this->load->view('professor/horario', $query);
		$this->load->view('professor/body');

	}


	public function horarioMedTarde($ID = null){

		$this->logProf();

		if($ID == null){

			redirect("principal/turmas");
		}

		$query['horarios'] = $this->aluno2->mostrarHorarioMedTarde($ID);

		$this->load->view('professor/nav2');
		$this->load->view('professor/horario', $query);
		$this->load->view('professor/body');

	}

	public function lancarNota(){

		$data['matricula'] = $this->input->post('matricula');
		$data['disciplina'] = $this->input->post('disciplina');
		$data['bimestre'] = $this->input->post('bimestre');
		$data['avaliacao'] = $this->input->post('avaliacao');
		$data['nota'] = $this->input->post('nota');

		if($data != null){

			$query = $this->sec->consultNota($data['matricula'], $data['disciplina'], $data['bimestre'], $data['avaliacao']);

			if($query == null){

				$this->prof->insertNota($data);
			}
		}
	}

	public function corrigirNota(){

		$this->logProf();

		$data['matricula'] = $this->input->post('matricula');
		$data['disciplina']	= $this->input->post('disciplina');
		$data['bimestre'] = $this->input->post('bimestre');
		$data['avaliacao'] = $this->input->post('avaliacao');

		$query = $this->sec->alterarNota($data['matricula'], $data['disciplina'], $data['bimestre'], $data['avaliacao']);

		if($query == null){

			$this->session->set_flashdata('msg', 'Nenhum registro de nota encontrado!!');
			// $url = $this->agent->referrer();
			redirect('principal/notas');

		} else{

			$notas['nota'] = $query;

			$this->load->view('professor/nav2');
			$this->load->view('professor/alterarNota', $notas);
			
		}
	}

	public function atualizarNota(){

		$data['nota'] = $this->input->post('nota');

		$this->prof->updateNota($data, $this->input->post('ID'));

		$this->session->set_flashdata('msg', 'Nota alterada com sucesso!!');
		redirect("principal/notas");


	}

	public function lancarSituacao(){


		$data['matricula'] = $this->input->post('matricula');
		$data['disciplina'] = $this->input->post('disciplina');
		$data['situacao'] = $this->input->post('situacao');

		$query = $this->sec->consultSituacao($data['matricula'], $data['disciplina']);

		if($query == null){

			$this->prof->Situacao($data);

		} 
	}


	public function exameFinal(){

		$data['matricula'] = $this->input->post('matricula');
		$data['disciplina'] = $this->input->post('disciplina');
		$data['notaFinal'] = $this->input->post('notaFinal');
		$data['resultadoFinal'] = $this->input->post('resultadoFinal');

		$query = $this->sec->consultExameFinal($data['matricula'], $data['disciplina']);

		if($query == null){

			$this->prof->provaFinal($data);
		} 

	}


	public function DesempenhoAluno(){

		$data['matricula'] = $this->input->post('matricula');
		$data['disciplina'] = $this->input->post('disciplina');
		$data['bimestre'] = $this->input->post('bimestre');


		$query['nota'] = $this->reg->getNotabyMatricula($data['matricula'], $data['disciplina'], $data['bimestre']);

		$query['situacao'] = $this->reg->getSituacaobyMatricula($data['matricula'], $data['disciplina']);

		$query['resultado'] = $this->reg->getExameFinalbyMat($data['matricula'], $data['disciplina']);

		$template = array(
			'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table table-bordered">'
		);

		$this->table->set_template($template);

		echo "<h4 align='left'>Boletim</h4>";
		$this->table->set_heading('Tipo-nota', 'Resultado');

		foreach($query['nota'] as $NT){

			if($NT->avaliacao == "P1"){

				$this->table->add_row('Avaliação 1' ,$NT->nota);
			}

			if($NT->avaliacao == "P2"){

				$this->table->add_row('Avaliação 2' ,$NT->nota);
			}

			if($NT->avaliacao == "meBi"){

				$this->table->add_row('Média bimestral' ,$NT->nota);
			}

			if($NT->avaliacao == "recB"){

				$this->table->add_row('Recuperação bimestral' ,$NT->nota);
			}
		}

		echo $this->table->generate();

		echo "<h4 align='left'>Situação nesta disciplina</h4>";
		$this->table->set_heading('Disciplina', 'Resultado');

		if($query['situacao'] != null){

			$this->table->add_row($query['situacao']->disciplina, $query['situacao']->situacao);

		}

		echo $this->table->generate();

		echo "<h4 align='left'>Exame final</h4>";
		$this->table->set_heading('Disciplina', 'Nota', 'Resultado final');

		if($query['resultado'] != null){

			$this->table->add_row($query['resultado']->disciplina, $query['resultado']->notaFinal, $query['resultado']->resultadoFinal);
		}

		echo $this->table->generate();

	}


	// FUNÇÃO ONDE O ALUNO VER SUAS NOTAS

	public function verNotasAluno($ID = null){

		$this->logAluno();

		$query['nota'] = $this->prof->getNota($ID);

		$query['situacao'] = $this->prof->getSituacao($ID);
		$query['resultado'] = $this->prof->getResultFinal($ID);
		$query['falta'] = $this->prof->getFalta($ID);

		// Pega os dados do aluno para por no boletim
		$query['nome'] = $this->login->showUserAluno($ID);


		$this->load->view('aluno/nav2', $query);
		$this->load->view('aluno/Faltas');
		$this->load->view('aluno/body');


	}

	public function verNotasCoordenacao($ID = null){

		$this->logCoord();

		$query['nota'] = $this->prof->getNota($ID);
		
		$query['situacao'] = $this->prof->getSituacao($ID);
		$query['resultado'] = $this->prof->getResultFinal($ID);
		$query['falta'] = $this->prof->getFalta($ID);

		// Pega os dados do aluno para por no boletim
		$query['nome'] = $this->login->showUserAluno($ID);

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/faltas', $query);
		$this->load->view('coordenacao/body');

	}


	public function lancarFalta(){

		$data['matricula'] = $this->input->post('matricula');
		$data['disciplina'] = $this->input->post('disciplina');
		$data['dataRegistro'] = $this->input->post('dataRegistro');

		if($data != null){

			$this->prof->insertFalta($data);

			echo "Lançado com sucesso!!";	
		}

	}

	public function consultarFalta(){

		$data['disciplina'] = $this->input->post('disciplina');

		$data['matricula'] = $this->input->post('matricula');

		$query = $this->reg->numFaltas($data['disciplina'], $data['matricula']);

		$template = array(
			'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table table-bordered">'
		);

		$this->table->set_template($template);

		$this->table->set_heading('Dia');

		$cont = 0;

		foreach($query as $FALTAS){

			$this->table->add_row($FALTAS->dataRegistro);

			$cont++;

		}

		echo "<h4 align='left'><strong>Total de faltas: </strong>".$cont."</h4>";
		echo $this->table->generate();

	}

	public function removerFalta(){

		$data['disciplina'] = $this->input->post('disciplina');

		$data['matricula'] = $this->input->post('matricula');

		$data['dataRegistro'] = $this->input->post('dataRegistro');

		if($data != null){

			$this->prof->removeFalta($data['disciplina'], $data['matricula'], $data['dataRegistro']);

			echo "Removido com sucesso!!";

		}

	}

	public function lancarRegistroAula(){

		$nome['nome'] = $this->session->userdata('MATRICULA');

		$query = $this->login->showUserProf($nome['nome']);

		$data['professor'] = $query->nome;
		$data['matricula'] = $query->MATRICULA;
		$data['disciplina'] = $this->input->post('disciplina');
		$data['turma'] = $this->input->post('turma');
		$data['dataRegistro'] = $this->input->post('dataRegistro');
		$data['conteudo'] = $this->input->post('conteudo');
		$data['atividade'] = $this->input->post('atividade');

		if($data != null){

			$this->prof->insertRegistroAula($data);

			echo "Registro lançado com sucesso!!";

		} else{

			echo "Vázio";
		}

	}
	

	public function alterarSenhaAluno(){

		$data['nome'] = $this->input->post('nome');
		// $data['Matricula'] = $this->input->post('Matricula');
		$data['senha'] = sha1($this->input->post('senha'));

		$query = $this->sec->consultAlunoMat($this->input->post('Matricula'));

		if($query != null){

			$this->prof->updateDadosAluno($data, $this->input->post('Matricula'));

			$this->session->unset_userdata('Matricula');

			$this->session->set_flashdata('msg', 'Sua senha foi alterada com sucesso!!');
			redirect("principal/loginAluno");

		} else{

			$this->session->unset_userdata('Matricula');

			$this->session->set_flashdata('msg', 'A matrícula informada não é válida');
			redirect("principal/loginAluno");
		}

	}

	public function Email(){

		$this->load->library('email');

		$config['protocol'] = 'mail'; 
		$config['wordwrap'] = TRUE; 
		$config['validate'] = TRUE;
		
		$this->email->initialize($config);

		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['msg'] = $this->input->post('msg');
		$data['telefone'] = $this->input->post('telefone');
		$data['assunto'] = $this->input->post('assunto');

		if($data['email'] != null){

			$this->email->from($data['email'], $data['nome']);
			$this->email->to('contato@flysoftwares.com');

			$this->email->subject($data['assunto']);
			$this->email->message($data['msg']."||"."Contato: ".$data['telefone']);

			$this->email->send();

		} else{

			redirect("principal/index");
		}

	}


	// FUNÇÕES RESPONSÁVEIS POR CHECKAR A ABERTURA DAS SESSÕES

	public function logProf(){

		if($this->session->userdata('MATRICULA') == null){

			redirect("principal/professor");

		}

	}

	public function logCoord(){

		if($this->session->userdata('matricula') == null){

			redirect("principal/Coordenacao");

		}

	}

	public function logAluno(){

		if($this->session->userdata('Matricula') == null){

			redirect("principal/loginAluno");

		}

	}
	
}





