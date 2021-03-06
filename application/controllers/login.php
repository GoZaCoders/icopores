<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
		
	}

	public function index()
	{
		if ($this->session->userdata('users')) {
			redirect('welcome');
		}

		if (isset($_POST['password'])) {
				$this->load->model('usuarios_model');
				if ($this->usuarios_model->login($_POST['users'],md5($_POST['password']))) {

					/*Iniciamos variables de session y se la pasamos al usuario si este exite*/
					$this->session->set_userdata('users',$_POST['users']);
					redirect('welcome');
				} else {
					redirect('login');
				}
				
			}	
			$this->load->view('login/logeo'); 
			
	}

	
	public function valida_login_ajax(){
		// Verificamos si la petición es por vía ajax
		$usr = $this->input->post('users');
		$result = $this->usuarios_model->valida_usuario_ajax($usr);

		if ($result) {
			echo "Falso";
		} else {
			echo "Verdadero";
		}

		/*
		if ($this->input->is_ajax_request()) {
			
			if ($this->input->post('users')!=='') {
				$users = $this->input->post('users');
				$this->usuarios_model->valida_usuario_ajax($users);
			}	
		} else {
			redirect('login');
		}*/
	}

	
	public function logout(){

		$this->session->sess_destroy();
		redirect('login');

	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */