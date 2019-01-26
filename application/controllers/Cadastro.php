<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('cadastro_model','professor');
		$this->load->model('cadastro2_model','professor2');
		$this->load->model('cadastro5_model','professorEdit');
		$this->load->model('login_model','login');
		$this->load->model('Seguranca_model','sec');
		
		$this->load->helper('date');
		
	}

	public function salvarProfessor(){
		
		$dados['nome'] = $this->input->post('nome');
		$dados['dataNasc'] = $this->input->post('dataNasc');
		$dados['naturalidade'] = $this->input->post('naturalidade');
		$dados['nacionalidade'] = $this->input->post('nacionalidade');
		$dados['formacao'] = $this->input->post('formacao');
		$dados['email'] = $this->input->post('email');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['celular'] = $this->input->post('celular');
		$dados['materia1'] = $this->input->post('materia1');
		$dados['materia2'] = $this->input->post('materia2');
		$dados['materia3'] = $this->input->post('materia3');
		$dados['sexo'] = $this->input->post('sexo');
		$dados['estadoCivil'] = $this->input->post('estadoCivil');
		$dados['rg'] = $this->input->post('rg');
		$dados['orgExped'] = $this->input->post('orgExped');
		$dados['dataExped'] = $this->input->post('dataExped');
		$dados['cpf'] = $this->input->post('cpf');
		$dados['rua'] = $this->input->post('rua');
		$dados['bairro'] = $this->input->post('bairro');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['cep'] = $this->input->post('cep');
		$dados['numero'] = $this->input->post('numero');
		$dados['estado'] = $this->input->post('estado');
		$dados['observacoes'] = $this->input->post('observacoes');
		$dados['MATRICULA'] = $this->input->post('MATRICULA');
		// $dados['senha'] = sha1($this->input->post('senha'));


		if($this->input->post('ID') != null){

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Registro atualizado com sucesso!</strong>
				</div>');
			$this->professorEdit->editarProfessor($dados, $this->input->post('ID'));

			redirect("principal/colegasCoordenacao");

		} else{

			$this->professor->addCadastrosProfessor($dados);

			$data['nome'] = $this->input->post('nome');
			$data['email'] = $this->input->post('email');
			$data['MATRICULA'] = $this->input->post('MATRICULA');
			$data['senha'] = sha1($this->input->post('senha'));

			$this->professor->addSenhaProfessor($data);


			$path = "./fotos/";
			if(!is_dir($path)){
				mkdir($path, 0777, $recursive = true);
			}

			$configUpload['upload_path']   = $path;
			$configUpload['allowed_types'] = 'png|jpg';
			// $configUpload['remove_spaces'] = TRUE;
			// $config['overwrite'] = TRUE;
			$configUpload['encrypt_name']  = false;
			$configUpload['file_name'] = $data['MATRICULA'];
			$this->upload->initialize($configUpload);
			if($this->upload->do_upload('fotoProfessor')){

				$file = $this->upload->data();

				$nomeArquivo['matricula'] = $data['MATRICULA'];
				$nomeArquivo['fotoAluno'] = $data['MATRICULA'].$file['file_ext'];

				$this->professor->insertFoto($nomeArquivo);

			}

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Professor cadastrado com sucesso!</strong>
				</div>');
			redirect("principal/cadastrarProfessores");

		}

	}

	public function salvarAluno(){

		// SALVAR ALUNO FUNÇÃO

		$data['nome'] = $this->input->post('nome');
		$data['dataNasc'] = $this->input->post('dataNasc');
		$data['naturalidade'] = $this->input->post('naturalidade');
		$data['nacionalidade'] = $this->input->post('nacionalidade');
		$data['nomeMae'] = $this->input->post('nomeMae');
		$data['nomePai'] = $this->input->post('nomePai');
		$data['email'] = $this->input->post('email');
		$data['telefone'] = $this->input->post('telefone');
		$data['celular'] = $this->input->post('celular');
		$data['celular2'] = $this->input->post('celular2');
		$data['sexo'] = $this->input->post('sexo');
		$data['nivel'] = $this->input->post('nivel');
		$data['turno'] = $this->input->post('turno');
		$data['rg'] = $this->input->post('rg');
		$data['orgExped'] = $this->input->post('orgExped');
		$data['dataExped'] = $this->input->post('dataExped');
		$data['cpf'] = $this->input->post('cpf');
		$data['rua'] = $this->input->post('rua');
		$data['bairro'] = $this->input->post('bairro');
		$data['cidade'] = $this->input->post('cidade');
		$data['cep'] = $this->input->post('cep');
		$data['numero'] = $this->input->post('numero');
		$data['estado'] = $this->input->post('estado');
		$data['observacoes'] = $this->input->post('observacoes');
		$data['Matricula'] = $this->input->post('Matricula');
		// $data['senha'] = sha1($this->input->post('senha'));

		$data2 = $this->input->post();

		if($this->input->post('ID') != null){


			if($data2['nivel'] == "FUNDAMENTAL"){

				if($data2['turno'] == "MANHÃ"){

					$this->professorEdit->editarAlunoFundManha($data, $this->input->post('ID'));

				} else {

					$this->professorEdit->editarAlunoFundTarde($data, $this->input->post('ID'));


				}


			} else {

				if($data2['turno'] == "MANHÃ"){

					$this->professorEdit->editarAlunoMedManha($data, $this->input->post('ID'));

				} else {

					$this->professorEdit->editarAlunoMedTarde($data, $this->input->post('ID'));

				}


			}

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Registro atualizado com sucesso!</strong>
				</div>');
			redirect("principal/colegasCoordenacao");

		} else {


			if($data2['nivel'] == "FUNDAMENTAL"){

				if($data2['turno'] == "MANHÃ"){

					$this->professor->addCadastrosAlunoFundManha($data);

					$data3['nome'] = $this->input->post('nome');
					$data3['Matricula'] = $this->input->post('Matricula');
					$data3['nivel'] = $this->input->post('nivel');
					$data3['turno'] = $this->input->post('turno');
					$data3['senha'] = sha1($this->input->post('senha'));

					$this->professor->addSenhaAluno($data3);

				} else {


					$this->professor->addCadastrosAlunoFundTarde($data);

					$data3['nome'] = $this->input->post('nome');
					$data3['Matricula'] = $this->input->post('Matricula');
					$data3['nivel'] = $this->input->post('nivel');
					$data3['turno'] = $this->input->post('turno');
					$data3['senha'] = sha1($this->input->post('senha'));

					$this->professor->addSenhaAluno($data3);

				}

			} else {


				if($data2['turno'] == "MANHÃ"){

					$this->professor->addCadastrosAlunoMedManha($data);

					$data3['nome'] = $this->input->post('nome');
					$data3['Matricula'] = $this->input->post('Matricula');
					$data3['nivel'] = $this->input->post('nivel');
					$data3['turno'] = $this->input->post('turno');
					$data3['senha'] = sha1($this->input->post('senha'));

					$this->professor->addSenhaAluno($data3);


				} else {


					$this->professor->addCadastrosAlunoMedTarde($data);

					$data3['nome'] = $this->input->post('nome');
					$data3['Matricula'] = $this->input->post('Matricula');
					$data3['nivel'] = $this->input->post('nivel');
					$data3['turno'] = $this->input->post('turno');
					$data3['senha'] = sha1($this->input->post('senha'));

					$this->professor->addSenhaAluno($data3);


				}

			}

		}

		$path = "./fotos/";
		if(!is_dir($path)){
			mkdir($path, 0777, $recursive = true);
		}

		$configUpload['upload_path']   = $path;
		$configUpload['allowed_types'] = 'png|jpg';
			// $configUpload['remove_spaces'] = TRUE;
			// $config['overwrite'] = TRUE;
		$configUpload['encrypt_name']  = false;
		$configUpload['file_name'] = $data['Matricula'];
		$this->upload->initialize($configUpload);
		if($this->upload->do_upload('fotoAluno')){

			$file = $this->upload->data();

			$nomeArquivo['matricula'] = $data['Matricula'];
			$nomeArquivo['fotoAluno'] = $data['Matricula'].$file['file_ext'];

			$this->professor->insertFoto($nomeArquivo);

		}

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Aluno cadastrado com sucesso!</strong>
			</div>');
		redirect("principal/cadastrarAlunos");
	}


	public function novosUsers(){

		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['matricula'] = $this->input->post('matricula');
		$data['senha'] = sha1($this->input->post('senha'));

		$this->professor->addNovosUsers($data);

		redirect("principal/navegarMenuCoord");

	}

	// ESTA FUNÇÃO ENVIA MENSAGENS A PARTIR DO MÓDULO DA COORDENAÇÃO

	public function enviarMSG(){

		$data['destinatario'] = $this->input->post('destinatario');
		$data['mensagem'] = $this->input->post('mensagem');

		$stringdedata = " %d/%m/%Y - %h:%i";
		$date = time();

		$data['dataEnvio'] = mdate($stringdedata, $date);

		$data2['usuario'] = $this->session->userdata('matricula');

		$query = $this->login->showUserCoord($data2['usuario']);

		$data['usuario'] = $query->nome;

		$this->professor2->addMSG($data);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Mensagem enviada com sucesso!</strong>
			</div>');
		redirect("principal/mensagemCoordenacao");
	}

	// ESTA FUNÇÃO E ENVIMA MENSAGENS A PARTIR DO MÓDULO DOS PROFESSORES

	public function enviarMSGProf(){

		$data['destinatario'] = $this->input->post('destinatario');
		$data['mensagem'] = $this->input->post('mensagem');

		$stringdedata = " %d/%m/%Y - %h:%i";
		$date = time();

		$data['dataEnvio'] = mdate($stringdedata, $date);

		$data2['usuario'] = $this->session->userdata('MATRICULA');

		$query = $this->login->showUserProf($data2['usuario']);

		$data['usuario'] = $query->nome;

		$this->professor2->addMSG($data);

		$this->session->set_flashdata('msg', 'Mensagem enviada com sucesso!!');
		redirect("principal/Mensagens");
	}

	// ESTA FUNÇÃO ENVIA MENSAGENS PARA OS ALUNOS A PARTIR DOS MÓDULOS DA COORDENAÇÃO

	public function enviarRecado(){

		$data['destinatario'] = $this->input->post('destinatario');
		$data['mensagem'] = $this->input->post('mensagem');

		$stringdedata = " %d/%m/%Y - %h:%i";
		$date = time();

		$data['dataEnvio'] = mdate($stringdedata, $date);

		$data2['usuario'] = $this->session->userdata('matricula');

		$query = $this->login->showUserCoord($data2['usuario']);

		$data['usuario'] = $query->nome;

		$this->professor2->addMSG($data);


	}

	// ESTA FUNÇÃO ENVIA MENSAGENS PARA OS ALUNOS A PARTIR DO MÓDULO DOS PROFESSORES

	// public function enviarRecado2(){

	// 	$data['destinatario'] = $this->input->post('destinatario');
	// 	$data['mensagem'] = $this->input->post('mensagem');

	// 	$stringdedata = " %d/%m/%Y - %h:%i";
	// 	$date = time();

	// 	$data['dataEnvio'] = mdate($stringdedata, $date);

	// 	$data2['usuario'] = $this->session->userdata('MATRICULA');

	// 	$query = $this->login->showUserProf($data2['usuario']);

	// 	$data['usuario'] = $query->nome;

	// 	$this->professor2->addMSG($data);

	// 	echo "Recado enviado com sucesso!!";

	// }

	public function enviarAviso(){

		$data['aviso'] = $this->input->post('aviso');
		$stringdedata = " %d/%m/%Y - %h:%i";
		$date = time();
		$data['dest'] = $this->input->post('dest');

		$data['dataEnvio'] = mdate($stringdedata, $date);

		$data2['usuario'] = $this->session->userdata('matricula');

		$query = $this->login->showUserCoord($data2['usuario']);

		$data['usuario'] = $query->nome;

		$this->professor2->addAviso($data);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Aviso postado com sucesso!</strong>
			</div>');
		redirect("principal/avisoCoordenacao");
	}


	public function alocarAlunoFund(){

		if($this->input->post('turno') == "MANHÃ"){

			$query = $this->professor2->getAlunoFundManha($this->input->post('matricula'));

			if($query == null){

				$query2 = $this->sec->getTurmaNomeFM($this->input->post('turma'));

				$data['nome'] = $this->input->post('nome');
				$data['matricula'] = $this->input->post('matricula');
				$data['turma'] = $this->input->post('turma');
				$data['nomeTurma'] = $query2->nome;
				$data['turno'] = $this->input->post('turno');

				$this->professor2->alocarAlunoFundManha($data);

			} else{

				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Este aluno(a) já se encontra matriculado na turma: <strong>'.$query->nomeTurma.'</strong>
					</div>');
				redirect("principal/montarFundamental");
			}

		} else{

			$query = $this->professor2->getAlunoFundTarde($this->input->post('matricula'));

			if($query == null){

				$query2 = $this->sec->getTurmaNomeFT($this->input->post('turma'));

				$data['nome'] = $this->input->post('nome');
				$data['matricula'] = $this->input->post('matricula');
				$data['turma'] = $this->input->post('turma');
				$data['nomeTurma'] = $query2->nome;
				$data['turno'] = $this->input->post('turno');

				$this->professor2->alocarAlunoFundTarde($data);

			} else{

				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Este aluno(a) já se encontra matriculado na turma: <strong>'.$query->nomeTurma.'</strong>
					</div>');
				redirect("principal/montarFundamental");

			}

		}

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Aluno alocado com sucesso!</strong>
			</div>');

	}

	public function alocarAlunoMed(){

		if($this->input->post('turno') == "MANHÃ"){

			$query = $this->professor2->getAlunoMedManha($this->input->post('matricula'));

			if($query == null){

				$query2 = $this->sec->getTurmaNomeMM($this->input->post('turma'));

				$data['nome'] = $this->input->post('nome');
				$data['matricula'] = $this->input->post('matricula');
				$data['turma'] = $this->input->post('turma');
				$data['nomeTurma'] = $query2->nome;
				$data['turno'] = $this->input->post('turno');

				$this->professor2->alocarAlunoMedManha($data);

			} else{

				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Este aluno(a) já se encontra matriculado na turma: <strong>'.$query->nomeTurma.'</strong>
					</div>');
				redirect("principal/montarMedio");

			}

		} else{

			$query = $this->professor2->getAlunoMedTarde($this->input->post('matricula'));

			if($query == null){

				$query2 = $this->sec->getTurmaNomeMT($this->input->post('turma'));

				$data['nome'] = $this->input->post('nome');
				$data['matricula'] = $this->input->post('matricula');
				$data['turma'] = $this->input->post('turma');
				$data['nomeTurma'] = $query2->nome;
				$data['turno'] = $this->input->post('turno');

				$this->professor2->alocarAlunoMedTarde($data);

			} else{

				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Este aluno(a) já se encontra matriculado na turma: <strong>'.$query->nomeTurma.'</strong>
					</div>');
				redirect("principal/montarMedio");
			}

		}

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Aluno alocado com sucesso!</strong>
			</div>');
		redirect("principal/montarMedio");

	}

}
