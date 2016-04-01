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
        $datos['titulo'] = $pagina->titulo;
        $datos['contenido'] = $pagina->contenido;
        $data['carousel'] = true;
        $data['vista'] = $this->load->view('plantilla/pagina',$datos,TRUE);
        $this->load->view('plantilla/master_view',$data);
    }
}