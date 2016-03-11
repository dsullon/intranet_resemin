<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('pagina_model');
    }

	public function index()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}

		$data['contenido'] = $this->load->view('admin/pagina/index','',TRUE);
		$data['titulo']	 = "Listado de páginas";
		$this->load->view('admin/template',$data);
	}

	public function crear()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}



		// $path = base_url().'js/ckfinder';
	    $path = '../js/ckfinder';
	    $width = '100%';
	    $this->editor($path, $width);
	    $this->form_validation->set_rules('description', 'Page Description', 'trim|required|xss_clean');

		$data['titulo']	 = "Crear navegacion";
		$data['contenido'] = $this->load->view('admin/pagina/crear','',TRUE);
		$this->load->view('admin/template',$data);
	}


	function editor($path,$width) {
	    //Loading Library For Ckeditor
	    //configure base path of ckeditor folder 
	    $this->ckeditor->basePath = base_url().'js/ckeditor/';
	    $this->ckeditor->config['language'] = 'es';
	    $this->ckeditor-> config['width'] = $width;
	    //configure ckfinder with ckeditor config 
	    $this->ckfinder->SetupCKEditor($this->ckeditor,$path); 
  	}
}
