<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('pagina_model');
    }

	public function view()
    {
        $titulo = $this->uri->segment(3);
        $pagina = $this->pagina_model->obtener_por_titulo($titulo);
        if(!$pagina)
        {
            show_404();
        }
        $pagina = $pagina->result()[0];
        $data['cms_pages'] = $this->pagina_model->listarTodos();
        $data['titulo'] = $pagina->titulo;
        $data['contenido'] = $pagina->contenido;
        $this->load->view('pagina/plantilla', $data);
    }
}