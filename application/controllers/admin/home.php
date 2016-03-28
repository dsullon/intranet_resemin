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
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}

		$data['contenido'] = $this->load->view('admin/home/index','',TRUE);
		$data['titulo']	 = "Principal";
		$this->load->view('admin/template',$data);
	}

	public function pagina()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}

		$data['usuario'] = $this->usuario_model->obtenerUsuario($this->session->userdata('usuario'));
		$datos['menu'] = $this->load->view('plantilla/menu_admin',$data,TRUE);
		$this->load->view('plantilla/header');		
		$this->load->view('admin/pagina',$datos);
		$this->load->view('plantilla/footer');
	}
}