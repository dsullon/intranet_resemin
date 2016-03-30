<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function obtener($id){
        $this->db->where('idCategoria',$id);
        $query = $this->db->get('categorias');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function listarTodos(){
        $query = $this->db->get('categorias');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function crear($data){
        $this->db->insert('categorias',array('nombre'=>$data['nombre']));
    }

    function editar($data){
        $datos = array('nombre'=>$data['nombre']);
        $this->db->where('idCategoria',$data['id']);
        $query = $this->db->update('categorias',$datos);
    }
    
    /*function eliminarDestino($id){
        //$query = "DELETE FROM tbl_destino WHERE id_destino=$id";
        //$this->db-query($query);
        $query = $this->db->delete('tbl_destino',array('id_destino'=>$id));
    }*/
}