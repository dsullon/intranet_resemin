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
		if($this->session->userdata('usuario') == FALSE)
		{
			redirect(base_url().'login');
		}

		$this->load->view('plantilla/header');
		$this->load->view('pagina/index');
		$this->load->view('plantilla/footer');
	}

	public function view($page)
	{
		$data['segmento'] = $this->uri->segment(2);
        if(!$data['segmento'])
        {
             show_404();
        }
        else
        {
        	$data['pagina'] = $this->pagina_model->obtener($data['segmento']);
        }




		$page = 'content';

		$page = lcfirst(convert_accented_characters(urldecode($page)));

		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			show_404();
		}


		if(empty($data['pagina']))
		{
			show_404();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}
