<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function obtener($id){
        $this->db->where('idMenu',$id);
        $query = $this->db->get('menu');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function listarTodos(){
        $query = $this->db->get('menu');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function listarHijos($id){
        $this->db->where('idPadre',$id);
        $query = $this->db->get('menu');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function crear($data){
        $this->db->insert('menu',array('nombre'=>$data['nombre'], 'url'=>$data['url'], 
            'idPadre'=>$data['padre']));
    }
    
    function editar($data){
        $datos = array('nombre'=>$data['nombre'], 'url'=>$data['url'], 'idPadre'=>$data['padre'], 'idPagina'=>$data['pagina']);
        $this->db->where('idMenu',$data['id']);
        $query = $this->db->update('menu',$datos);
    }
    
    /*function eliminarDestino($id){
        //$query = "DELETE FROM tbl_destino WHERE id_destino=$id";
        //$this->db-query($query);
        $query = $this->db->delete('tbl_destino',array('id_destino'=>$id));
    }*/
}