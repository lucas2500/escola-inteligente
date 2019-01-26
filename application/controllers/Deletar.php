<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deletar extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->model('cadastro4_model','delete');
		$this->load->model('professor_model', 'prof');
		$this->load->model('registro_model', 'reg');
		
	}


	public function deleteUser($matricula = null){


		if ($matricula == null){

			redirect('/principal/colegasCoordenacao');

		}

		$this->delete->apagarUsers($matricula);

		$this->delete->deleteAllMSG($matricula);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Usuário(a) excluído com sucesso!</strong>
			</div>');
		redirect('/principal/colegasCoordenacao');

	}

	public function deleteAlunoFundManha($matricula = null){

		if ($matricula == null){

			redirect('/principal/colegasCoordenacao');

		}

		$this->delete->apagarAlunoFundManha($matricula);

		$this->delete->excluirAlunoFundManha($matricula);

		$this->delete->excluirAlunoAcesso($matricula);

		$this->delete->deleteAllMSG($matricula);

		$query = $this->reg->getFoto($matricula);

		if($query != null){

			$file = $query->fotoAluno;

			$this->reg->deleteFoto($file);

			unlink('./fotos/'.$file);
		}

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Aluno(a) excluído com sucesso!</strong>
			</div>');
		redirect('/principal/colegasCoordenacao');
	}

	public function deleteAlunoFundTarde($matricula = null){


		if ($matricula == null){

			redirect('/principal/colegasCoordenacao');

		}

		$this->delete->apagarAlunoFundTarde($matricula);

		$this->delete->excluirAlunoFundTarde($matricula);

		$this->delete->excluirAlunoAcesso($matricula);

		$this->delete->deleteAllMSG($matricula);

		$query = $this->reg->getFoto($matricula);

		if($query != null){

			$file = $query->fotoAluno;

			$this->reg->deleteFoto($file);

			unlink('./fotos/'.$file);
		}

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Aluno(a) excluído com sucesso!</strong>
			</div>');
		redirect('/principal/colegasCoordenacao');


	}

	public function deleteAlunoMedManha($matricula = null){

		if ($matricula == null){

			redirect('/principal/colegasCoordenacao');

		}

		$this->delete->apagarAlunoMedManha($matricula);

		$this->delete->excluirAlunoMedManha($matricula);

		$this->delete->excluirAlunoAcesso($matricula);

		$this->delete->deleteAllMSG($matricula);

		$query = $this->reg->getFoto($matricula);

		if($query != null){

			$file = $query->fotoAluno;

			$this->reg->deleteFoto($file);

			unlink('./fotos/'.$file);
		}

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Aluno(a) excluído com sucesso!</strong>
			</div>');
		redirect('/principal/colegasCoordenacao');


	}

	public function deleteAlunoMedTarde($matricula = null){


		if ($matricula == null){

			redirect('/principal/colegasCoordenacao');

		}

		$this->delete->apagarAlunoMedTarde($matricula);

		$this->delete->excluirAlunoMedTarde($matricula);

		$this->delete->excluirAlunoAcesso($matricula);

		$this->delete->deleteAllMSG($matricula);

		$query = $this->reg->getFoto($matricula);

		if($query != null){

			$file = $query->fotoAluno;

			$this->reg->deleteFoto($file);

			unlink('./fotos/'.$file);
		}

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Aluno(a) excluído com sucesso!</strong>
			</div>');
		redirect('/principal/colegasCoordenacao');

	}

	public function deleteProfessor($matricula = null){


		if ($matricula == null){

			redirect('/principal/colegasCoordenacao');

		}

		$this->delete->apagarProfessor($matricula);

		$this->delete->deleteAllMSG($matricula);

		$this->delete->excluirProfAcesso($matricula);

		$query = $this->reg->getFoto($matricula);

		if($query != null){

			$file = $query->fotoAluno;

			$this->reg->deleteFoto($file);

			unlink('./fotos/'.$file);
		}

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Professor(a) excluído com sucesso!</strong>
			</div>');
		redirect('/principal/colegasCoordenacao');

	}

	public function deleteAviso($ID = null){


		if ($ID == null){

			redirect('/principal/avisoCoordenacao');

		}

		$this->delete->apagarAviso($ID);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Aviso excluído com sucesso!</strong>
			</div>');
		redirect('/principal/avisoCoordenacao');


	}

	// ESTA FUNÇÃO SERVE PARA DELETAR AS MENSAGENS DO COORDENADOR

	public function deleteMSG($ID = null){


		if ($ID == null){

			redirect('/principal/mensagemCoordenacao');

		}

		$this->delete->apagarMSG($ID);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Mensagem excluída com sucesso!</strong>
			</div>');
		redirect('/principal/mensagemCoordenacao');


	}

	// ESTA FUNÇÃO SERVE PARA DELETAR AS MENSAGENS DO PROFESSOR

	public function deleteMSGProf($ID = null){


		if ($ID == null){

			redirect('/principal/Mensagens');

		}

		$this->delete->apagarMSG($ID);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Mensagem excluída com sucesso!</strong>
			</div>');
		redirect('/principal/Mensagens');


	}

	// ESTA FUNÇÃO SERVE PARA DELETAR AS MENSAGENS DO ALUNO

	public function deleteMSGAluno($ID = null){


		if ($ID == null){

			redirect('/principal/avisosAluno');

		}

		$this->delete->apagarMSG($ID);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Mensagem excluída com sucesso!</strong>
			</div>');
		redirect('/principal/avisosAluno');
	}

	// ESTA FUNÇÃO DELETA AS TURMAS DO FUNDAMENTAL DA MANHÃ

	public function deleteTurmaFundManha($ID = null){


		if ($ID == null){

			redirect('/principal/turmasCoordenacao');

		}

		$this->delete->apagarTurmaFundManha($ID);

		$this->delete->deleteAlunoFundManha($ID);

		$this->delete->deleteHorarioFundManha($ID);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Turma excluída com sucesso!</strong>
			</div>');
		redirect('/principal/turmasCoordenacao');

	}

	// ESTA FUNÇÃO DELETA AS TURMAS DO FUNDAMENTAL DA TARDE

	public function deleteTurmaFundTarde($ID = null){


		if ($ID == null){

			redirect('/principal/turmasCoordenacao');

		}

		$this->delete->apagarTurmaFundTarde($ID);

		$this->delete->deleteAlunoFundTarde($ID);

		$this->delete->deleteHorarioFundTarde($ID);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Turma excluída com sucesso!</strong>
			</div>');
		redirect('/principal/turmasCoordenacao');

	}

	// ESTA FUNÇÃO DELETA AS TURMAS DO MÉDIO DA MANHÃ

	public function deleteTurmaMedManha($ID = null){


		if ($ID == null){

			redirect('/principal/turmasCoordenacao');

		}

		$this->delete->apagarTurmaMedManha($ID);

		$this->delete->deleteAlunoMedManha($ID);

		$this->delete->deleteHorarioMedManha($ID);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Turma excluída com sucesso!</strong>
			</div>');
		redirect('/principal/turmasCoordenacao');

	}

	// ESTA FUNÇÃO DELETA AS TURMAS DO MÉDIO DA TARDE

	public function deleteTurmaMedTarde($ID = null){


		if ($ID == null){

			redirect('/principal/turmasCoordenacao');

		}

		$this->delete->apagarTurmaMedTarde($ID);

		$this->delete->deleteAlunoMedTarde($ID);

		$this->delete->deleteHorarioMedTarde($ID);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Turma excluída com sucesso!</strong>
			</div>');
		redirect('/principal/turmasCoordenacao');

	}

	// ESTA FUNÇÃO DELETA O ALUNO DAS TURMAS DO FUNDAMENTAL

	public function deleteAlunoTurmaFundamental(){

		$data['matricula'] = $this->input->post('matricula');

		$this->delete->excluirAlunoFundManha($data['matricula']);

		$this->delete->excluirAlunoFundTarde($data['matricula']);

		// redirect("principal/turmasCoordenacao");


	}

	// ESTA FUNÇÃO DELETA O ALUNO DAS TURMAS DO MÉDIO

	public function deleteAlunoTurmaMedio(){

		
		$data['matricula'] = $this->input->post('matricula');

		$this->delete->excluirAlunoMedManha($data['matricula']);

		$this->delete->excluirAlunoMedTarde($data['matricula']);

		// redirect("principal/turmasCoordenacao");

	}

	public function deleteHorarioFundamental($codigoTurma = null){

		if ($codigoTurma == null){

			redirect('/principal/mensagemCoordenacao');

		}

		$this->delete->deleteHorarioFundManha($codigoTurma);

		$this->delete->deleteHorarioFundTarde($codigoTurma);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Horário excluído com sucesso!</strong>
			</div>');
		redirect("principal/turmasCoordenacao");

	}

	public function deleteHorarioMedio($codigoTurma = null){

		if ($codigoTurma == null){

			redirect('/principal/mensagemCoordenacao');

		}

		$this->delete->deleteHorarioMedManha($codigoTurma);

		$this->delete->deleteHorarioMedTarde($codigoTurma);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Horário excluído com sucesso!</strong>
			</div>');
		redirect("principal/turmasCoordenacao");

	}


	public function deleteRegistroAula(){

		$data['ID'] = $this->input->post('ID');

		if($data['ID'] != null){

			$this->prof->excluirRegistroAula($data['ID']);

			echo "Registro de aula excluído com sucesso!!";

		} else{

			redirect("principal/notas");
		}
	}

}
