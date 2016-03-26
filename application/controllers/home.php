<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('usuario_model');
    }

	public function index()
	{
		$data['usuario'] = $this->usuario_model->obtenerUsuario($this->session->userdata('usuario')); 
		$this->load->view('home/index');
	}
}
