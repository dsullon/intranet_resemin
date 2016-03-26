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
        $id = $this->uri->segment(3);
        $pagina = $this->pagina_model->obtener($id);
        if(!$pagina)
        {
            show_404();
        }
        $pagina = $pagina->result()[0];
        $data['cms_pages'] = $this->pagina_model->listarTodos();
        $data['titulo'] = $pagina->titulo;
        $data['descripcion'] = $pagina->descripcion;
        $data['palabrasClaves'] = $pagina->palabrasClaves;
        $data['encabezado'] = $pagina->encabezado;
        $data['contenido'] = $pagina->contenido;
        $this->load->view('pagina/plantilla', $data);
    }
}