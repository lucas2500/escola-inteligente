<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arquivos extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('professor_model', 'prof');
		$this->load->model('cadastro4_model','professor');
		$this->load->model('registro_model', 'reg');
	}


	public function verArquivos(){

		$this->logCoord();

		$query['arquivo'] = $this->prof->getArquivo();

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/upload', $query);
		$this->load->view('coordenacao/body');

	}


	public function baixarArquivo($ID = null){


		if($ID == null){

			redirect("principal/Plano");

		}

		$query = $this->prof->downloadArquivo($ID);

		$file = $query->nome;

		force_download('./uploads/'.$file, null);

		redirect("arquivos/verArquivos");
	}


	public function deleteArquivo($ID = null){


		if($ID == null){

			redirect("principal/Plano");
		}
		
		$query = $this->prof->downloadArquivo($ID);

		if($query != null){

			$this->prof->apagarArquivo($ID);

			$file = $query->nome;

			unlink('./uploads/'.$file);

		}

		redirect("arquivos/verArquivos");

	}

	public function logCoord(){

		if($this->session->userdata('matricula') == null){

			redirect("principal/Coordenacao");

		}

	}

	public function fichaAlunoFund($matricula = null){

		$this->logCoord();

		if($matricula == null){

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
		$this->load->view('coordenacao/fichaAluno', $dados);
	}


	public function fichaAlunoMed($matricula = null){

		$this->logCoord();

		if($matricula == null){

			redirect("principal/colegasCoordenacao");
		}

		$query = $this->professor->getAlunoMedManhaByID($matricula);

		if($query != null){

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
		$this->load->view('coordenacao/fichaAluno', $dados);
	}


	public function fichaProfessor($matricula = null){

		$this->logCoord();

		if($matricula == null){

			redirect('principal/colegasCoordenacao');
		}

		$prof['prof'] = $this->professor->getProfessorByID($matricula);

		$fotos = $this->reg->getFoto($matricula);

		if($fotos != null){

			$prof['img'] = 'fotos/'.$fotos->fotoAluno;

		} else{

			$prof['img'] = 'assets/img/alunoPic.png';
		}

		$this->load->view('coordenacao/nav2');
		$this->load->view('coordenacao/fichaProfessor', $prof);

	}

	public function anexarArquivo(){

		$data['discArquivo'] = $this->input->post('discArquivo');
		$data['turmaArquivo'] = $this->input->post('turmaArquivo');
		$data['matProfessor'] = $this->session->userdata('MATRICULA');

		$path = "./uploads/";
		if ( ! is_dir($path)) {
			mkdir($path, 0777, $recursive = true);
		}

		$configUpload['upload_path']   = $path;
		$configUpload['allowed_types'] = 'pptx|docx|pdf|zip|rar|doc|zip';
			// $configUpload['remove_spaces'] = TRUE;
			// $config['overwrite'] = TRUE;
		$configUpload['encrypt_name']  = false;
		$this->upload->initialize($configUpload);
		if ($this->upload->do_upload('anexoAluno')){

			$file = $this->upload->data();

			$data['anexoArquivo'] = $file['raw_name'].$file['file_ext'];

			$this->prof->insertAnexoAluno($data);

		} else{

			$this->session->set_flashdata('msg', 'Não foi possível enviar o arquivo');
			redirect("principal/notas");

		}

		$this->session->set_flashdata('msg', 'Arquivo lançado com sucesso!!');
		redirect("principal/notas");

	}


	public function baixarAnexo($ID = null){

		if($ID == null){

			redirect("principal/notas");
		}

		$query = $this->prof->downloadAnexo($ID);

		$file = $query->anexoArquivo;

		force_download('./uploads/'.$file, null);

	}

	public function deletarAnexo($ID = null){

		if($ID == null){

			redirect("principal/notas");
		}

		$query = $this->prof->downloadAnexo($ID);

		if($query != null){

			$this->prof->apagarAnexo($ID);

			$file = $query->anexoArquivo;

			unlink('./uploads/'.$file);
		}

		$this->session->set_flashdata('msg', 'Arquivo excluído com sucesso!!');
		redirect("principal/notas");

	}
}
