<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('post_model');
    }

	public function view()
    {
        $id = $this->uri->segment(3);
        $pagina = $this->post_model->obtener($id);
        if(!$pagina)
        {
            show_404();
        }
        $pagina = $pagina->result()[0];
        $datos['titulo'] = $pagina->titulo;
        $datos['contenido'] = $pagina->contenido;
        $data['carousel'] = true;
        $data['vista'] = $this->load->view('plantilla/post',$datos,TRUE);
        $this->load->view('plantilla/master_view',$data);
    }
}