<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navegacion extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('navegacion_model');
    }

	public function index()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}

		$data['usuario'] = $this->usuario_model->obtenerUsuario($this->session->userdata('usuario'));
		$datos['menu'] = $this->load->view('plantilla/menu_admin',$data,TRUE);
		$this->load->view('plantilla/header');		
		$this->load->view('navegacion/index',$datos);
		$this->load->view('plantilla/footer');
	}

	public function crear()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}

		$data['usuario'] = $this->usuario_model->obtenerUsuario($this->session->userdata('usuario'));
		$datos['opciones'] = $this->navegacion_model->listarTodos();
		$datos['menu'] = $this->load->view('plantilla/menu_admin',$data,TRUE);
		$this->load->view('plantilla/header');		
		$this->load->view('navegacion/crear',$datos);
		$this->load->view('plantilla/footer');
	}

  	public function editar() {
	    // $path = base_url().'js/ckfinder';
	    $path = '../js/ckfinder';
	    $width = '850px';
	    $this->editor($path, $width);
	    $this->form_validation->set_rules('description', 'Page Description', 'trim|required|xss_clean');
	    if ($this->form_validation->run() == FALSE) {
	      $this->load->view('home/editar_mision');
	    }
	    else {
	      // do your stuff with post data.
	      echo $this->input->post('description');
	    }
  	}

	function editor($path,$width) {
	    //Loading Library For Ckeditor
	    $this->load->library('ckeditor');
	    $this->load->library('ckFinder');
	    //configure base path of ckeditor folder 
	    $this->ckeditor->basePath = base_url().'js/ckeditor/';
	    $this->ckeditor->config['language'] = 'es';
	    $this->ckeditor-> config['width'] = $width;
	    //configure ckfinder with ckeditor config 
	    $this->ckfinder->SetupCKEditor($this->ckeditor,$path); 
  	}

  	function recuperar(){
  		echo $this->input->post('detalle');
  	}

  	function recibirDatos(){
  		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('url', 'url', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('principal', 'opción principal', 'required|xss_clean');
  		if($this->form_validation->run() == FALSE)
		{

		}
		else
		{
			$data = array(
	  			'nombre' => $this->input->post('nombre'),
	  			'url' => $this->input->post('url'),
	  			'padre' => $this->input->post('principal')
			);
			$this->navegacion_model->crear($data);
			redirect(base_url().'navegacion');
		}

  	}
}
