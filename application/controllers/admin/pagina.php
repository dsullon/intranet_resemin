<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('pagina_model');
    }

	public function index()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}
        
        $datos['listado'] = $this->pagina_model->listarTodos();
		$data['contenido'] = $this->load->view('admin/pagina/index',$datos,TRUE);
		$data['titulo']	 = "Listado de páginas";
		$this->load->view('admin/template',$data);
	}

	public function crear()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}
	    $path = '../../js/ckfinder';
	    $width = '100%';
	    $this->editor($path, $width);
		$data['titulo']	 = "Crear página";
		$data['contenido'] = $this->load->view('admin/pagina/crear','',TRUE);

		$this->form_validation->set_rules('titulo', 'titulo', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('descripcion', 'descripcion', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('clave', 'clave', 'required|xss_clean');
  		$this->form_validation->set_rules('cabecera', 'cabecera', 'required|trim|min_length[5]|max_length[150]|xss_clean');

  		if ($this->form_validation->run() == FALSE)
  		{
  			$this->load->view('admin/template',$data);
	    }
	    else 
	    {
	    	$data = array(
	  			'titulo' => $this->input->post('titulo'),
	  			'descripcion' => $this->input->post('descripcion'),
	  			'clave' => $this->input->post('clave'),
	  			'cabecera' => $this->input->post('cabecera'),
	  			'detalle' => $this->input->post('detalle')
			);
			$this->pagina_model->crear($data);
			redirect(base_url().'admin/pagina');
	    }
		
	}

    public function editar()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}
        
        $id = $this->uri->segment(4);
        $pagina = $this->pagina_model->obtener($id);
        if(!$pagina){
            show_404();
        }
        
        $datos['pagina']= $pagina->result()[0];
	    $path = '../../../js/ckfinder';
	    $width = '100%';
	    $this->editor($path, $width);
		$data['titulo']	 = "Editar página";
		$data['contenido'] = $this->load->view('admin/pagina/editar',$datos,TRUE);

		$this->form_validation->set_rules('titulo', 'titulo', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('descripcion', 'descripcion', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('clave', 'clave', 'required|xss_clean');
  		$this->form_validation->set_rules('cabecera', 'cabecera', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		/*$this->form_validation->set_rules('detalle', 'detalle', 'required|trim|min_length[5]|max_length[150]|xss_clean');*/
          
  		if ($this->form_validation->run() == FALSE)
  		{
  			$this->load->view('admin/template',$data);
	    }
	    else 
	    {
	    	$data = array(
                'id' => $this->input->post('id'),
	  			'titulo' => $this->input->post('titulo'),
	  			'descripcion' => $this->input->post('descripcion'),
	  			'clave' => $this->input->post('clave'),
	  			'cabecera' => $this->input->post('cabecera'),
	  			'detalle' => $this->input->post('detalle')
			);
			$this->pagina_model->editar($data);
			redirect(base_url().'admin/pagina');
	    }
		
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

  	function crearnuevo(){
  		

  		if ($this->form_validation->run() == FALSE)
  		{
  			$this->crear();
	    }
	    else {
	      // do your stuff with post data.
	      echo $this->input->post('description');
	    }
  	}
}
