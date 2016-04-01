<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('categoria_model');
        $this->load->model('post_model');
    }

	public function index()
	{
		if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}

        $datos['listado'] = $this->post_model->listarTodos();
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
        /*$config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );
        $this->load->library('upload', $config);*/
        
        $path = '../../js/ckfinder';
	    $width = '100%';
	    $this->editor($path, $width);

		$datos['categorias'] = $this->categoria_model->listarTodos();
		$data['titulo']	 = "Crear publicación";
		$data['contenido'] = $this->load->view('admin/post/crear',$datos,TRUE);
        
        $this->form_validation->set_rules('titulo', 'titulo', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('categoria', 'categoría', 'required|xss_clean');
  		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('admin/template',$data);
		}
		else
		{
			$data = array(
	  			'titulo' => $this->input->post('titulo'),
	  			'categoria' => $this->input->post('categoria'),
                'imagen' => $this->input->post('imagen'),
                'detalle' => $this->input->post('detalle')
			);
			$this->post_model->crear($data);
			redirect(base_url().'admin/post');
		}
	}
    
    public function editar()
    {
        if($this->session->userdata('nivel') == FALSE && $this->session->userdata('nivel') !=1)
		{
			redirect(base_url().'home');
		}
        
        $id = $this->uri->segment(4);
        $pagina = $this->post_model->obtener($id);
        if(!$pagina){
            show_404();
        }
        
        $path = '../../../js/ckfinder';
	    $width = '100%';
	    $this->editor($path, $width);

        $datos['pagina']= $pagina->result()[0];
		$datos['categorias'] = $this->categoria_model->listarTodos();
		$data['titulo']	 = "Editar publicación";
		$data['contenido'] = $this->load->view('admin/post/editar',$datos,TRUE);
        
		$this->form_validation->set_rules('titulo', 'titulo', 'required|trim|min_length[5]|max_length[150]|xss_clean');
  		$this->form_validation->set_rules('categoria', 'categoría', 'required|xss_clean');
          
  		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('admin/template',$data);
		}
		else
		{
            $data = array(
                'id' => $this->input->post('id'),
	  			'titulo' => $this->input->post('titulo'),
	  			'categoria' => $this->input->post('categoria'),
                'imagen' => $this->input->post('imagen'),
                'detalle' => $this->input->post('detalle')
			);
			$this->post_model->editar($data);
			redirect(base_url().'admin/post');
		}
  	}
      
    function editor($path,$width)
    {
        //Loading Library For Ckeditor
        //configure base path of ckeditor folder 
        $this->ckeditor->basePath = base_url().'js/ckeditor/';
        $this->ckeditor->config['language'] = 'es';
        $this->ckeditor-> config['width'] = $width;
        //configure ckfinder with ckeditor config 
        $this->ckfinder->SetupCKEditor($this->ckeditor,$path); 
    }
}