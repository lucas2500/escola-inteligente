<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracao extends CI_Controller {
	public function __construct(){

		parent::__construct();
		
		$this->load->model('seguranca_model', 'sec');

		$this->load->library('email');
	}

	
	public function enviarToken(){

		$data['email'] = $this->input->post('email');

		if($data['email'] != null){

			$query = $this->sec->consultEmailCoord($data['email']);

			if($query != null){

				$token['codigo'] = (sha1($data['email']));

				$this->sec->insertToken($token);

				$config['protocol'] = 'mail'; 
				$config['wordwrap'] = true; 
				$config['validate'] = true;

				$this->email->initialize($config);

				$this->email->from('contato@flysoftwares.com', 'Suporte FLY SOFTWARES');
				$this->email->to($data['email']);

				$this->email->subject('Recuperação de senha');
				$this->email->message('Prezado usuário, seu token para redefinição de senha é: '.$token['codigo']);

				$this->email->send();

				echo "Enviamos o token de redefinição para o seu email";


			} else{

				echo "O email informado não é válido!!";
			}

		} else{

			redirect("principal/Coordenacao");
		}

	}


	public function enviarToken2(){

		$data['email'] = $this->input->post('email');

		if($data['email'] != null){

			$query = $this->sec->consultEmailProf($data['email']);

			if($query != null){

				$token['codigo'] = (sha1($data['email']));

				$this->sec->insertToken($token);

				$config['protocol'] = 'mail'; 
				$config['wordwrap'] = true; 
				$config['validate'] = true;

				$this->email->initialize($config);

				$this->email->from('contato@flysoftwares.com', 'Suporte FLY SOFTWARES');
				$this->email->to($data['email']);

				$this->email->subject('Recuperação de senha');
				$this->email->message('Prezado usuário, seu token para redefinição de senha é: '.$token['codigo']);

				$this->email->send();

				echo "Enviamos o token de redefinição para o seu email";


			} else{

				echo "O email informado não é válido!!";
			}

		} else{

			redirect("principal/Coordenacao");
		}

	}


	public function alterarSenha(){

		$data['senha'] = (sha1($this->input->post('senha')));
		$data2['codigo'] = $this->input->post('codigo');

		$query = $this->sec->checkToken($data2['codigo']);

		if($query != null){

			$query2 = $this->sec->consultEmailCoord($this->input->post('email'));

			if($query2 != null){

				$this->sec->alterarSenhaC($data, $this->input->post('email'));

				$this->sec->deleteToken($data2['codigo']);

				$this->session->unset_userdata('matricula');

				$this->session->set_flashdata('msg', 'Sua senha foi alterada com sucesso!!');
				redirect('principal/Coordenacao');

			} else{

				$this->session->unset_userdata('matricula');

				$this->session->set_flashdata('msg', 'O email informado não é válido');
				redirect('principal/Coordenacao');

			}

		} else{

			$this->session->unset_userdata('matricula');

			$this->session->set_flashdata('msg', 'Por favor insira um token válido');
			redirect('principal/Coordenacao');
		}

	}



	public function alterarSenha2(){

		$data['nome'] = $this->input->post('nome');
		$data['senha'] = (sha1($this->input->post('senha')));
		$data2['codigo'] = $this->input->post('codigo');

		$query = $this->sec->checkToken($data2['codigo']);

		if($query != null){

			$query2 = $this->sec->consultEmailProf($this->input->post('email'));

			if($query2 != null){

				$this->sec->alterarSenhaP($data, $this->input->post('email'));

				$this->sec->deleteToken($data2['codigo']);

				$this->session->unset_userdata('MATRICULA');

				$this->session->set_flashdata('msg', 'Sua senha foi alterada com sucesso!!');
				redirect('principal/Professor');

			} else{

				$this->session->unset_userdata('MATRICULA');

				$this->session->set_flashdata('msg', 'O email informado não é válido');
				redirect('principal/Professor');

			}

		} else{

			$this->session->unset_userdata('MATRICULA');

			$this->session->set_flashdata('msg', 'Por favor insira um token válido');
			redirect('principal/Professor');
		}

	}
}

