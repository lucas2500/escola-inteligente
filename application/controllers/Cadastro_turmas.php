<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_turmas extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('cadastro_model','aluno');
		$this->load->model('cadastro3_model', 'horario');
		$this->load->model('cadastro4_model','alunoDelete');
		$this->load->model('cadastro5_model', 'updateHorario');
		$this->load->model('professor_model','prof');
		$this->load->model('seguranca_model', 'sec');
		
	}


	public function salvarTurmaFund(){

		$dados['nome'] = $this->input->post('nome');
		$dados['turno'] = $this->input->post('turno');
		$dados['codigo'] = $this->input->post('codigo');

		$dados2 = $this->input->post();

		if($dados2['turno'] == "MANHÃ"){


			$this->aluno->addTurmaFundManha($dados);

		} else {

			$this->aluno->addTurmaFundTarde($dados);

		} 

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Turma criada com sucesso!</strong>
			</div>');
		redirect("principal/montarFundamental");
	}


	public function salvarTurmaMed(){

		$dados['nome'] = $this->input->post('nome');
		$dados['turno'] = $this->input->post('turno');
		$dados['codigo'] = $this->input->post('codigo');

		$dados2 = $this->input->post();

		if($dados2['turno'] == "MANHÃ"){


			$this->aluno->addTurmaMedManha($dados);

		} else {

			$this->aluno->addTurmaMedTarde($dados);

		} 

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Turma criada com sucesso!</strong>
			</div>');
		redirect("principal/montarMedio");
	}

	
	public function salvarHorario(){

		$data['A1segunda'] = $this->input->post('A1segunda');
		$data['A2segunda'] = $this->input->post('A2segunda');
		$data['A3segunda'] = $this->input->post('A3segunda');
		$data['A4segunda'] = $this->input->post('A4segunda');
		$data['A5segunda'] = $this->input->post('A5segunda');
		$data['A6segunda'] = $this->input->post('A6segunda');

		$data['A1terca'] = $this->input->post('A1terca');
		$data['A2terca'] = $this->input->post('A2terca');
		$data['A3terca'] = $this->input->post('A3terca');
		$data['A4terca'] = $this->input->post('A4terca');
		$data['A5terca'] = $this->input->post('A5terca');
		$data['A6terca'] = $this->input->post('A6terca');

		$data['A1quarta'] = $this->input->post('A1quarta');
		$data['A2quarta'] = $this->input->post('A2quarta');
		$data['A3quarta'] = $this->input->post('A3quarta');
		$data['A4quarta'] = $this->input->post('A4quarta');
		$data['A5quarta'] = $this->input->post('A5quarta');
		$data['A6quarta'] = $this->input->post('A6quarta');

		$data['A1quinta'] = $this->input->post('A1quinta');
		$data['A2quinta'] = $this->input->post('A2quinta');
		$data['A3quinta'] = $this->input->post('A3quinta');
		$data['A4quinta'] = $this->input->post('A4quinta');
		$data['A5quinta'] = $this->input->post('A5quinta');
		$data['A6quinta'] = $this->input->post('A6quinta');

		$data['A1sexta'] = $this->input->post('A1sexta');
		$data['A2sexta'] = $this->input->post('A2sexta');
		$data['A3sexta'] = $this->input->post('A3sexta');
		$data['A4sexta'] = $this->input->post('A4sexta');
		$data['A5sexta'] = $this->input->post('A5sexta');
		$data['A6sexta'] = $this->input->post('A6sexta');

		$data['nivel'] = $this->input->post('nivel');
		$data['codigoTurma'] = $this->input->post('codigoTurma');
		$data['turno'] = $this->input->post('turno');

		if($this->input->post('ID') != null){

			if($this->input->post('nivel') == "FUNDAMENTAL"){

				if($this->input->post('turno') == "MANHÃ"){

					$this->updateHorario->editarHorarioFundManha($data, $this->input->post('ID'));

				} else{

					$this->updateHorario->editarHorarioFundTarde($data, $this->input->post('ID'));

				}

			} else{

				if($this->input->post('turno') == "MANHÃ"){

					$this->updateHorario->editarHorarioMedManha($data, $this->input->post('ID'));


				} else{

					$this->updateHorario->editarHorarioMedTarde($data, $this->input->post('ID'));


				}
			}

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Horário atualizado com sucesso!</strong>
				</div>');
			redirect("principal/turmasCoordenacao");

		} else {

			if($this->input->post('nivel') == "FUNDAMENTAL"){

				if($this->input->post('turno') == "MANHÃ"){

					$query = $this->alunoDelete->SearchHorarioFundManhaByID($this->input->post('codigoTurma'));

					if($query == null){

						$query2 = $this->sec->getTurmaNomeFM($this->input->post('codigoTurma'));

						$data['nomeTurma'] = $query2->nome;

						$this->horario->addHorarioFundManha($data);

					} else{

						$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>A turma informada já possui um horário cadastrado!</strong>
							</div>');
						redirect("principal/montarHorarios");
					}

				} else{

					$query = $this->alunoDelete->SearchHorarioFundTardeByID($this->input->post('codigoTurma'));

					if($query == null){

						$query2 = $this->sec->getTurmaNomeFT($this->input->post('codigoTurma'));

						$data['nomeTurma'] = $query2->nome;

						$this->horario->addHorarioFundTarde($data);
						
					} else{

						$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>A turma informada já possui um horário cadastrado!</strong>
							</div>');
						redirect("principal/montarHorarios");

					}

				}

			} else{

				if($this->input->post('turno') == "MANHÃ"){

					$query = $this->alunoDelete->SearchHorarioMedManhaByID($this->input->post('codigoTurma'));

					if($query == null){

						$query2 = $this->sec->getTurmaNomeMM($this->input->post('codigoTurma'));

						$data['nomeTurma'] = $query2->nome;

						$this->horario->addHorarioMedManha($data);

					} else{

						$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>A turma informada já possui um horário cadastrado!</strong>
							</div>');
						redirect("principal/montarHorarios");
					}


				} else{

					$query = $this->alunoDelete->SearchHorarioMedTardeByID($this->input->post('codigoTurma'));

					if($query == null){

						$query2 = $this->sec->getTurmaNomeMT($this->input->post('codigoTurma'));

						$data['nomeTurma'] = $query2->nome;

						$this->horario->addHorarioMedTarde($data);

					} else{
						
						$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>A turma informada já possui um horário cadastrado!</strong>
							</div>');
						redirect("principal/montarHorarios");
					}

				}

			}

		}

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Horário cadastrado com sucesso!</strong>
			</div>');
		redirect("principal/montarHorarios");

	}

	public function transfAluno(){

		// ESTA FUNÇÃO É RESPONSÁVEL POR TRANSFERIR OS ALUNOS DO FUNDAMENTAL DE TURNO E NÍVEL

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
		$data['naturalidade'] = $this->input->post('naturalidade');
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

		// VERIFICO SE O ALUNO ESTUDA NO FUNDAMENTAL

		if($data['nivel'] == "FUNDAMENTAL"){

			// SE SIM, VERIFICO SE ELE ESTUDA PELA MANHÃ OU PELA TARDE, EM SEGUIDA
			// DELETE SEU REGISTRO DE UMA DAS TABELAS

			if($data['turno'] == "MANHÃ"){

				$query = $this->alunoDelete->getAlunoFundTardeByID($data['Matricula']);

				if($query != null){

					$this->alunoDelete->apagarAlunoFundTarde($query->Matricula);

					$this->aluno->addCadastrosAlunoFundManha($data);

					$data2['turno'] = $data['turno'];

					$this->prof->updateDadosAluno($data2, $this->input->post('Matricula'));

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Aluno transferido com sucesso!</strong>
						</div>');
					redirect("principal/colegasCoordenacao");

				} else {

					redirect("principal/colegasCoordenacao");
				}	

			} else{

				$query = $this->alunoDelete->getAlunoFundManhaByID($data['Matricula']);

				if($query != null){

					$this->alunoDelete->apagarAlunoFundManha($query->Matricula);

					$this->aluno->addCadastrosAlunoFundTarde($data);

					$data2['turno'] = $data['turno'];

					$this->prof->updateDadosAluno($data2, $this->input->post('Matricula'));

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Aluno transferido com sucesso!</strong>
						</div>');
					redirect("principal/colegasCoordenacao");

				} else {

					redirect("principal/colegasCoordenacao");
				}

			}

			// AQUI VERIFICO SE O REGISTRO PASSADO VEM DO NÍVEL MÉDIO
			// POIS SE VIER DO MÉDIO SIGNIFICA QUE O ALUNO ESTÁ TENTANDO
			// MUDAR DE TURNO

		} else {

			if($data['turno'] == "MANHÃ"){

				$query = $this->alunoDelete->getAlunoFundManhaByID($data['Matricula']);

				if($query != null){

					$this->alunoDelete->apagarAlunoFundManha($query->Matricula);

					$this->aluno->addCadastrosAlunoMedManha($data);

					$data2['nivel'] = $data['nivel'];
					$data2['turno'] = $data['turno'];

					$this->prof->updateDadosAluno($data2, $this->input->post('Matricula'));

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Aluno transferido com sucesso!</strong>
						</div>');
					redirect("principal/colegasCoordenacao");

				} else{

					$query = $this->alunoDelete->getAlunoFundTardeByID($data['Matricula']);

					if($query != null){

						$this->alunoDelete->apagarAlunoFundTarde($query->Matricula);

						$this->aluno->addCadastrosAlunoMedManha($data);

						$data2['nivel'] = $data['nivel'];
						$data2['turno'] = $data['turno'];

						$this->prof->updateDadosAluno($data2, $this->input->post('Matricula'));

						$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Aluno transferido com sucesso!</strong>
							</div>');
						redirect("principal/colegasCoordenacao");

					}

				}

			} else{

				$query = $this->alunoDelete->getAlunoFundManhaByID($data['Matricula']);

				if($query != null){

					$this->alunoDelete->apagarAlunoFundManha($query->Matricula);

					$this->aluno->addCadastrosAlunoMedTarde($data);

					$data2['nivel'] = $data['nivel'];
					$data2['turno'] = $data['turno'];

					$this->prof->updateDadosAluno($data2, $this->input->post('Matricula'));

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Aluno transferido com sucesso!</strong>
						</div>');
					redirect("principal/colegasCoordenacao");

				} else{

					$query = $this->alunoDelete->getAlunoFundTardeByID($data['Matricula']);

					$this->alunoDelete->apagarAlunoFundTarde($query->Matricula);

					$this->aluno->addCadastrosAlunoMedTarde($data);

					$data2['nivel'] = $data['nivel'];
					$data2['turno'] = $data['turno'];

					$this->prof->updateDadosAluno($data2, $this->input->post('Matricula'));

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Aluno transferido com sucesso!</strong>
						</div>');
					redirect("principal/colegasCoordenacao");

				}

			}

		}	

	}

	public function transfAlunoMed(){

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
		$data['naturalidade'] = $this->input->post('naturalidade');
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


		if($data['turno'] == "MANHÃ"){

			$query = $this->alunoDelete->getAlunoMedTardeByID($data['Matricula']);

			if($query != null){

				$this->alunoDelete->apagarAlunoMedTarde($query->Matricula);

				$this->aluno->addCadastrosAlunoMedManha($data);

				$data2['turno'] = $data['turno'];

				$this->prof->updateDadosAluno($data2, $this->input->post('Matricula'));

				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Aluno transferido com sucesso!</strong>
					</div>');
				redirect("principal/colegasCoordenacao");

			} else {

				redirect("principal/colegasCoordenacao");
			}	

		} else{

			$query = $this->alunoDelete->getAlunoMedManhaByID($data['Matricula']);

			if($query != null){

				$this->alunoDelete->apagarAlunoMedManha($query->Matricula);

				$this->aluno->addCadastrosAlunoMedTarde($data);

				$data2['turno'] = $data['turno'];

				$this->prof->updateDadosAluno($data2, $this->input->post('Matricula'));

				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Aluno transferido com sucesso!</strong>
					</div>');
				redirect("principal/colegasCoordenacao");

			} else {

				redirect("principal/colegasCoordenacao");
			}

		}

	}

}