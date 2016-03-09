<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navegacion_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function obtener($id){
        $this->db->where('idNavegacion',$id);
        $query = $this->db->get('navegacion');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function listarTodos(){
        $query = $this->db->get('navegacion');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function crear($data){
        $this->db->insert('navegacion',array('nombre'=>$data['nombre'], 'url'=>$data['url'], 
            'idPadre'=>$data['padre']));
    }
    
    /*function actualizarDestino($id,$data){
        $datos = array('descripcion'=>$data['nombre']);
        $this->db->where('id_destino',$id);
        $query = $this->db->update('tbl_destino',$datos);
    }*/
    
    /*function eliminarDestino($id){
        //$query = "DELETE FROM tbl_destino WHERE id_destino=$id";
        //$this->db-query($query);
        $query = $this->db->delete('tbl_destino',array('id_destino'=>$id));
    }*/
}