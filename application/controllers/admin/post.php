<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('menu_model');
        $this->load->model('pagina_model');
    }

	public function index()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}

        $datos['listado'] = $this->menu_model->listarTodos();
		$data['contenido'] = $this->load->view('admin/post/index',$datos,TRUE);
		$data['titulo']	 = "Listado de publicaciones";
		$this->load->view('admin/template',$data);
	}

	public function crear()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}

		$datos['opciones'] = $this->menu_model->listarTodos();
		$data['titulo']	 = "Crear navegacion";
		$data['contenido'] = $this->load->view('admin/menu/crear',$datos,TRUE);
        
        $this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('url', 'url', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('principal', 'opción principal', 'required|xss_clean');
  		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('admin/template',$data);
		}
		else
		{
			$data = array(
	  			'nombre' => $this->input->post('nombre'),
	  			'url' => $this->input->post('url'),
	  			'padre' => $this->input->post('principal')
			);
			$this->menu_model->crear($data);
			redirect(base_url().'admin/menu');
		}
	}

  	public function editar()
      {
	    if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}
        
        $id = $this->uri->segment(4);
        $pagina = $this->menu_model->obtener($id);
        if(!$pagina){
            show_404();
        }

        $datos['pagina']= $pagina->result()[0];
		$datos['opciones'] = $this->menu_model->listarTodos();
        $datos['paginas'] = $this->pagina_model->listarTodos();
		$data['titulo']	 = "Editar navegacion";
		$data['contenido'] = $this->load->view('admin/menu/editar',$datos,TRUE);
		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('url', 'url', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('principal', 'opción principal', 'required|xss_clean');
          
  		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('admin/template',$data);
		}
		else
		{
            $data = array(
                'id' => $this->input->post('id'),
                'nombre' => $this->input->post('nombre'),
	  			'url' => $this->input->post('url'),
	  			'padre' => $this->input->post('principal'),
                'pagina' => $this->input->post('pagina')
			);
			$this->menu_model->editar($data);
			redirect(base_url().'admin/menu');
		}
  	}
}