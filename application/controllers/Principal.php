<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('login_model','login');
		$this->load->model('cadastro_model','aluno');
		$this->load->model('cadastro2_model','aluno2');
		$this->load->model('cadastro3_model','aluno3');
		$this->load->model('professor_model', 'prof');
		$this->load->model('registro_model', 'reg');
		
	}

	
	public function index(){
		
		$this->load->view('Home');
		
	}


	public function Professor(){

		$data['msg'] = $this->session->flashdata('msg');
		$this->load->view('professor/login', $data);
	}

	public function menuProf(){

		$matricula = $this->input->post('MATRICULA');
		$senha = (sha1($this->input->post('senha')));

		$query = $this->login->logarProf($matricula, $senha);

		if($query != NULL){

			$session_data = array('MATRICULA'=> $matricula );  
			$this->session->set_userdata($session_data);

			redirect("principal/Menu");

		} else{

			$this->session->set_flashdata('msg', 'Matrícula ou senha incorreta');
			redirect("principal/professor");	

		}

	}

	public function Menu(){

		$this->logProf();

		$data['nome'] = $this->session->userdata('MATRICULA');

		$query['usuario'] = $this->login->showUserProf($data['nome']);

		$this->load->view('professor/nav');
		$this->load->view('professor/footer');
		$this->load->view('professor/menu', $query);
		$this->load->view('professor/body');

	}

	public function Notas(){

		$this->logProf();

		$query['msg'] = $this->session->flashdata('msg');

		$query['turma'] = $this->aluno->getTurmaFundamentalManha();
		$query['turma2'] = $this->aluno->getTurmaFundamentalTarde();
		$query['turma3'] = $this->aluno->getTurmaMedioManha();
		$query['turma4'] = $this->aluno->getTurmaMedioTarde();
		
		$this->load->view('professor/nav2');
		$this->load->view('professor/turmas2', $query);
		$this->load->view('professor/body');

	}



	public function Avisos(){

		$this->logProf();

		$data['avisos'] = $this->aluno2->getAviso();
		
		$this->load->view('professor/nav2');
		$this->load->view('professor/avisos', $data);
		$this->load->view('professor/body');

	}

	public function Mensagens(){


		$this->logProf();

		$data['msg'] = $this->session->flashdata('msg');

		$data['usuario'] = $this->session->userdata('MATRICULA');

		$data['mensagem'] = $this->aluno2->getMSG($data['usuario']);
		
		$data['usuarios'] = $this->aluno->getUsersCoord();

		$data['funcionarios'] = $this->aluno->getFunc();
		
		$this->load->view('professor/nav2');
		$this->load->view('professor/mensagens', $data);
		$this->load->view('professor/body');

	}

	public function Plano(){

		$this->logProf();
		
		$data['msg'] = $this->session->flashdata('msg');

		$this->load->view('professor/nav2');
		$this->load->view('professor/upload', $data);
		$this->load->view('professor/body');

	}


	public function Upload(){

		$path = "./uploads/";
		if ( ! is_dir($path)) {
			mkdir($path, 0777, $recursive = true);
		}

		$configUpload['upload_path']   = $path;
		$configUpload['allowed_types'] = 'pptx|docx|pdf|zip|rar|doc|xlsx';
			// $configUpload['remove_spaces'] = TRUE;
			// $config['overwrite'] = TRUE;
		$configUpload['encrypt_name']  = FALSE;
		$this->upload->initialize($configUpload);
		if ($this->upload->do_upload('arquivo')){

			$file = $this->upload->data();

			$data2['nome'] = $file['raw_name'].$file['file_ext'];

			$prop = $this->session->userdata('MATRICULA');

			$data2['proprietario'] = $prop;

			$this->prof->insertArquivo($data2);

		} else{

			$data= array('error' => $this->upload->display_errors());

		}

		$this->session->set_flashdata('msg', 'Arquivo enviado com sucesso!!');
		redirect("principal/Plano");

	}

	// Esta função checa se o professor está logado
	public function logProf(){

		if($this->session->userdata('MATRICULA') == null){

			redirect("principal/professor");

		}

	}

	// -----------------------------------------------------------------


	// Coordenação daqui para baixo

	public function Coordenacao(){

		$data['msg'] = $this->session->flashdata('msg');
		$this->load->view('coordenacao/login', $data);


	}

	public function navegarMenuCoord(){

		$this->logCoord();

		$data['nome'] = $this->session->userdata('matricula');

		$query['nome'] = $this->login->showUserCoord($data['nome']);

		$this->load->view('coordenacao/nav');
		$this->load->view('coordenacao/footer');
		$this->load->view('coordenacao/menu', $query);
		$this->load->view('coordenacao/body');


	}


	public function menuCoordenacao(){


		$matricula = $this->input->post('matricula');
		$senha = (sha1($this->input->post('senha')));

		$query = $this->login->logarCoord($matricula, $senha);

		if($query != null){

			$session_data = array('matricula'=> $matricula );  
			$this->session->set_userdata($session_data);

			redirect("principal/navegarMenuCoord");


		} else {

			$this->session->set_flashdata('msg', 'Matrícula ou senha incorreta');
			redirect('principal/Coordenacao');

		}

	}

	public function cadastrarProfessores(){

		$this->logCoord();

		$data['msg'] = $this->session->flashdata('msg');
		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/CDPS', $data);


	}

	public function cadastrarAlunos(){

		$this->logCoord();

		$data['msg'] = $this->session->flashdata('msg');
		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/CDA', $data);


	}

	public function montarFundamental(){


		$this->logCoord();

		$data['msg'] = $this->session->flashdata('msg');

		$data['alunos'] = $this->aluno->getAlunoFundamentalManha();

		$data['alunos2'] = $this->aluno->getAlunoFundamentalTarde();

		$data['turmas'] = $this->aluno->getTurmaFundamentalManha();

		$data['turmas2'] = $this->aluno->getTurmaFundamentalTarde();


		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/fundamental', $data);
		$this->load->view('coordenacao/body');

	}

	public function montarMedio(){

		$this->logCoord();

		$data['msg'] = $this->session->flashdata('msg');

		$data['alunos'] = $this->aluno->getAlunoMedioManha();

		$data['alunos2'] = $this->aluno->getAlunoMedioTarde();

		$data['turmas'] = $this->aluno->getTurmaMedioManha();

		$data['turmas2'] = $this->aluno->getTurmaMedioTarde();

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/medio', $data);
		$this->load->view('coordenacao/body');

	}

	public function avisoCoordenacao(){

		$this->logCoord();

		$data['msg'] = $this->session->flashdata('msg');
		$data['avisos'] = $this->aluno2->getAviso();
		// $data['AvisoAluno'] = $this->aluno->getAvisoAluno();

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/avisos', $data);
		$this->load->view('coordenacao/body');

	}

	public function mensagemCoordenacao(){

		$this->logCoord();

		$data['msg'] = $this->session->flashdata('msg');

		$data2['dest'] = $this->session->userdata('matricula');

		$data['mensagens'] = $this->aluno2->getMSG($data2['dest']);

		$data['usuarios'] = $this->aluno->getUsersCoord();

		$data['funcionarios'] = $this->aluno->getFunc();

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/mensagens', $data);
		$this->load->view('coordenacao/body');


	}

	public function turmasCoordenacao(){

		$this->logCoord();

		$data['msg'] = $this->session->flashdata('msg');

		$data['turmas'] = $this->aluno->getTurmaFundamentalManha();

		$data['turmas2'] = $this->aluno->getTurmaFundamentalTarde();

		$data['turmas3'] = $this->aluno->getTurmaMedioManha();

		$data['turmas4'] = $this->aluno->getTurmaMedioTarde();

		$this->load->view('coordenacao/nav2');
		// $this->load->view('coordenacao/footer');
		$this->load->view('coordenacao/turmas', $data);
		$this->load->view('coordenacao/body');

	}

	public function alunosCoordenacaoFundManha($ID = null){

		$this->logCoord();

		if($ID == null){

			redirect('/principal/turmasCoordenacao');

		}

		$data['turmas'] = $this->aluno2->mostrarAlunosFundManha($ID);

		$data['registro'] = $this->reg->getTurmaRegistro($ID);

		$data['anexo'] = $this->reg->getAnexosAluno($ID);

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/alunos', $data);
		$this->load->view('coordenacao/body');

	}

	public function alunosCoordenacaoFundTarde($ID = null){

		$this->logCoord();

		if($ID == null){

			redirect('/principal/turmasCoordenacao');

		}


		$data['turmas'] = $this->aluno2->mostrarAlunosFundTarde($ID);

		$data['registro'] = $this->reg->getTurmaRegistro($ID);

		$data['anexo'] = $this->reg->getAnexosAluno($ID);

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/alunos', $data);
		$this->load->view('coordenacao/body');

	}

	public function alunosCoordenacaoMedManha($ID = null){

		$this->logCoord();

		if($ID == null){

			redirect('/principal/turmasCoordenacao');

		}

		$data['turmas'] = $this->aluno2->mostrarAlunosMedManha($ID);

		$data['registro'] = $this->reg->getTurmaRegistro($ID);

		$data['anexo'] = $this->reg->getAnexosAluno($ID);

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/alunosMed', $data);
		$this->load->view('coordenacao/body');

	}

	public function alunosCoordenacaoMedTarde($ID = null){

		$this->logCoord();

		if($ID == null){

			redirect('/principal/turmasCoordenacao');

		}


		$data['turmas'] = $this->aluno2->mostrarAlunosMedTarde($ID);

		$data['registro'] = $this->reg->getTurmaRegistro($ID);

		$data['anexo'] = $this->reg->getAnexosAluno($ID);

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/alunosMed', $data);
		$this->load->view('coordenacao/body');


	}

	public function montarHorarios(){

		$this->logCoord();

		$data['msg'] = $this->session->flashdata('msg');

		$data['turmas'] = $this->aluno->getTurmaFundamentalManha();

		$data['turmas2'] = $this->aluno->getTurmaFundamentalTarde();

		$data['turmas3'] = $this->aluno->getTurmaMedioManha();

		$data['turmas4'] = $this->aluno->getTurmaMedioTarde();

		// $data['funcionarios'] = $this->aluno->getFunc();

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/montarHorarios', $data);
		$this->load->view('coordenacao/body');


	}

	public function verHorarioFundManha($ID = null){

		$this->logCoord();

		if($ID == null){

			redirect('/principal/turmasCoordenacao');
		}


		$data['horarios'] = $this->aluno3->mostrarHorarioFundManha($ID);

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/horario', $data);
		$this->load->view('coordenacao/body');
		// $this->load->view('coordenacao/footer');

	}

	public function verHorarioFundTarde($ID = null){

		$this->logCoord();

		if($ID == null){

			redirect('/principal/turmasCoordenacao');
		}


		$data['horarios'] = $this->aluno3->mostrarHorarioFundTarde($ID);

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/horario', $data);
		$this->load->view('coordenacao/body');
		// $this->load->view('coordenacao/footer');


	}

	public function verHorarioMedManha($ID = null){

		$this->logCoord();

		if($ID == null){

			redirect('/principal/turmasCoordenacao');

		}


		$data['horarios'] = $this->aluno3->mostrarHorarioMedManha($ID);

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/horarioMed', $data);
		$this->load->view('coordenacao/body');
		// $this->load->view('coordenacao/footer');


	}

	public function verHorarioMedTarde($ID = null){

		$this->logCoord();

		if($ID == null){

			redirect('/principal/turmasCoordenacao');

		}


		$data['horarios'] = $this->aluno3->mostrarHorarioMedTarde($ID);

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/horarioMed', $data);
		$this->load->view('coordenacao/body');
		// $this->load->view('coordenacao/footer');


	}

	public function colegasCoordenacao(){

		$this->logCoord();

		$data['msg'] = $this->session->flashdata('msg');

		$data['alunos'] = $this->aluno->getAlunoFundamentalManha();

		$data['alunos2'] = $this->aluno->getAlunoFundamentalTarde();

		$data['alunosMed'] = $this->aluno->getAlunoMedioManha();

		$data['alunosMed2'] = $this->aluno->getAlunoMedioTarde();

		$data['funcionarios'] = $this->aluno->getFunc();

		$data['usuarios'] = $this->aluno->getUsersCoord();

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/colegas', $data);
		$this->load->view('coordenacao/body');

	}

	// Esta função verifica se o usuário da coordenação está logado
	public function logCoord(){

		if($this->session->userdata('matricula') == null){

			redirect("principal/Coordenacao");

		}
	}

// -----------------------------------------------------------------

	// ALUNO DAQUI PARA BAIXO

	public function loginAluno(){

		$data['msg'] = $this->session->flashdata('msg');
		$this->load->view('aluno/login', $data);


	}

	public function openAluno(){

		$matricula = $this->input->post('Matricula');
		$senha = (sha1($this->input->post('senha')));

		$query = $this->login->logarAluno($matricula, $senha);

		if($query != null){

			$session_data = array('Matricula'=> $matricula );  
			$this->session->set_userdata($session_data);

			redirect("principal/menuAluno");

		} else {

			$this->session->set_flashdata('msg', 'Matrícula ou senha incorreta');
			redirect("principal/loginAluno");

		}
		
	}

	public function menuAluno(){

		$this->logAluno();

		// recuperando a matrícula do aluno na sessão
		$data['nome'] = $this->session->userdata('Matricula');

		// pegando os dados da tabela de login do aluno
		$query['usuario'] = $this->login->showUserAluno($data['nome']);

		// Verifico se o usuário existe
		if($query['usuario'] != null){

			// verificando o nivel e turno do aluno
			if($query['usuario']->nivel == "FUNDAMENTAL"){

				if($query['usuario']->turno == "MANHÃ"){

					// se o turno for manhã, faço a consulta na tabela de turmas/aluno da manhã
					$query['aluno'] = $this->aluno2->getAlunoFundManha($data['nome']);

					if($query['aluno'] != null){

						$turma = $query['aluno']->turma;

						// faço uma consulta na tabela de horários das turmas de acordo com a turma do aluno
						$query['horario'] = $this->aluno3->mostrarHorarioFundManha($turma);

						// verficio se existe algum anexo na turm do aluno
						$query['anexo'] = $this->reg->getAnexosAluno($turma);

					}


				} else{

					$query['aluno'] = $this->aluno2->getAlunoFundTarde($data['nome']);

					if($query['aluno'] != null){

						$turma = $query['aluno']->turma;

						$query['horario'] = $this->aluno3->mostrarHorarioFundTarde($turma);

						$query['anexo'] = $this->reg->getAnexosAluno($turma);

					}
				}

			} else{

				if($query['usuario']->turno == "MANHÃ"){

					$query['aluno'] = $this->aluno2->getAlunoMedManha($data['nome']);

					if($query['aluno'] != null){

						$turma = $query['aluno']->turma;

						$query['horario'] = $this->aluno3->mostrarHorarioMedManha($turma);

						$query['anexo'] = $this->reg->getAnexosAluno($turma);

					}

				} else{

					$query['aluno'] = $this->aluno2->getAlunoMedTarde($data['nome']);

					if($query['aluno'] != null){

						$turma = $query['aluno']->turma;

						$query['horario'] = $this->aluno3->mostrarHorarioMedTarde($turma);

						$query['anexo'] = $this->reg->getAnexosAluno($turma);

					}
				}

			}

		}

		$this->load->view('aluno/nav', $query);
		$this->load->view('aluno/menu');
		$this->load->view('aluno/body');
		$this->load->view('aluno/footer');
	}

	public function avisosAluno(){

		$this->logAluno();

		$query['recado'] = $this->session->flashdata('msg');

		$query['avisos'] = $this->aluno2->getAviso();

		$data['nome'] = $this->session->userdata('Matricula');

		$query['msg'] = $this->aluno2->getMSG($data['nome']);

		$this->load->view('aluno/nav2', $query);
		$this->load->view('aluno/avisos');
		$this->load->view('aluno/body');			

	}

	public function logAluno(){

		if($this->session->userdata('Matricula') == null){

			redirect('principal/loginAluno');

		}

	}

}





