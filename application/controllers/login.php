<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
		$this->load->model('usuario_model');
    }
	
	public function index()
	{	
		$data['token'] = $this->token();
		$data['titulo'] = 'Login con roles de usuario en codeigniter';
		$this->load->view('login/login',$data);
	}

	public function new_user()
		{
			if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
			{
	            $this->form_validation->set_rules('usuario', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
	            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|max_length[150]|xss_clean');
	 
	            //lanzamos mensajes de error si es que los hay
	            
				if($this->form_validation->run() == FALSE)
				{
					$this->index();
				}else{
					$username = $this->input->post('usuario');
					$password = md5($this->input->post('password'));
					$check_user = $this->usuario_model->iniciarSesion($username,$password);
					if($check_user == TRUE)
					{
						$data = array(
							'usuario' 	=> 		$check_user->idUsuario,
			                'nivel'		=>		$check_user->idNivel,
	            		);		
						$this->session->set_userdata($data);
						redirect(base_url());
					}
				}
			}else{
				redirect(base_url().'login');
			}
		}
	
	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login');
	}
}