<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editar extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('cadastro4_model','professor');
		$this->load->model('registro_model', 'reg');
	}


	public function EditProfessor($matricula = null){

		$this->logCoord();

		if ($matricula == null){

			redirect("principal/colegasCoordenacao");

		}

		$query = $this->professor->getProfessorByID($matricula);

		$dados['professores'] = $query;

		$fotos = $this->reg->getFoto($matricula);

		if($fotos != null){

			$dados['img'] = 'fotos/'.$fotos->fotoAluno;

		} else{

			$dados['img'] = 'assets/img/alunoPic.png';
		}

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/EditCdps', $dados);

	}

	// BLOCO NOVO ADD ABAIXO


	public function EditAlunoFund($matricula = null){

		$this->logCoord();

		if ($matricula == null){

			redirect("principal/colegasCoordenacao");

		}

		$query = $this->professor->getAlunoFundManhaByID($matricula);

		if($query != null){

			$dados['alunos'] = $query;

		} else{

			$query2 = $this->professor->getAlunoFundTardeByID($matricula);

			$dados['alunos'] = $query2;

		}

		$fotos = $this->reg->getFoto($matricula);

		if($fotos != null){

			$dados['img'] = 'fotos/'.$fotos->fotoAluno;

		} else{

			$dados['img'] = 'assets/img/alunoPic.png';
		}

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/editCDA', $dados);

	}

	// FUNÇÃO RESPONSÁVEL POR TRAZER OS DADOS DO ALUNO TRANSFERIDO

	public function transfFund($matricula = null){

		$this->logCoord();

		if ($matricula == null){

			redirect("principal/colegasCoordenacao");

		}

		$query = $this->professor->getAlunoFundManhaByID($matricula);

		if($query != null) {

			$dados['alunos'] = $query;

		} else{

			$query2 = $this->professor->getAlunoFundTardeByID($matricula);

			$dados['alunos'] = $query2;

		}

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/transfCDA', $dados);

	}

	public function EditAlunoMed($matricula = null){

		$this->logCoord();

		if ($matricula == null){

			redirect("principal/colegasCoordenacao");

		}

		$query = $this->professor->getAlunoMedManhaByID($matricula);


		if($query != null) {

			$dados['alunos'] = $query;

		} else{

			$query2 = $this->professor->getAlunoMedTardeByID($matricula);

			$dados['alunos'] = $query2;

		}

		$fotos = $this->reg->getFoto($matricula);

		if($fotos != null){

			$dados['img'] = 'fotos/'.$fotos->fotoAluno;

		} else{

			$dados['img'] = 'assets/img/alunoPic.png';
		}

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/editCDA', $dados);

	}


	public function transfMed($matricula = null){

		$this->logCoord();

		if ($matricula == null){

			redirect("principal/colegasCoordenacao");

		}

		$query = $this->professor->getAlunoMedManhaByID($matricula);

		if($query != null) {

			$dados['alunos'] = $query;

		} else{

			$query2 = $this->professor->getAlunoMedTardeByID($matricula);

			$dados['alunos'] = $query2;

		}


		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/transfMed', $dados);

	}

	// FIM DO BLOCO ADD

	public function EditHorarioFund($ID = null){

		$this->logCoord();

		if ($ID == null){

			redirect("principal/turmasCoordenacao");

		}

		$query = $this->professor->SearchHorarioFundManhaByID($ID);

		if($query != null) {

			// redirect("principal/turmasCoordenacao");

			$dados['horarios'] = $query;

		} else {

			$query2 = $this->professor->SearchHorarioFundTardeByID($ID);

			$dados['horarios'] = $query2;

		}


		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/editHorario', $dados);

	}

	public function EditHorarioMed($ID = null){

		$this->logCoord();

		if ($ID == NULL){

			redirect("principal/turmasCoordenacao");

		}

		$query = $this->professor->SearchHorarioMedManhaByID($ID);

		if($query != null) {

			// redirect("principal/turmasCoordenacao");

			$dados['horarios'] = $query;

		} else {

			$query2 = $this->professor->SearchHorarioMedTardeByID($ID);

			$dados['horarios'] = $query2;

		}


		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/editHorario', $dados);

	}

	public function logCoord(){

		if($this->session->userdata('matricula') == null){

			redirect("principal/Coordenacao");

		}

	}

}
