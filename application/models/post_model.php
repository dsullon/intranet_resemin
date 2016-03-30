<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function obtener($id){
        $this->db->where('idPublicacion',$id);
        $query = $this->db->get('publicaciones');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    
    function obtener_por_titulo($titulo){
        $this->db->where('titulo',$titulo);
        $query = $this->db->get('publicaciones');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function listarTodos(){
        $query = $this->db->get('publicaciones');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function crear($data){
        $this->db->insert('publicaciones',array('titulo'=>$data['titulo'], 'contenido'=>$data['detalle'],
            'urlImagen'=>$data['url'], 'creadoPor'=>$this->session->userdata('usuario'), 'fechaCreacion'=>date('Y-m-d H:i:s'),
            'ultimaModificacion'=>date('Y-m-d H:i:s'), 'modificadoPor'=>$this->session->userdata('usuario'), 'publicado'=>$data['publicado']));
    }

    function editar($data){
        $datos = array('titulo'=>$data['titulo'], 'contenido'=>$data['detalle'],
            'ultimaModificacion'=>date('Y-m-d H:i:s'), 'modificadoPor'=>$this->session->userdata('usuario'));
        $this->db->where('idPublicacion',$data['id']);
        $query = $this->db->update('publicaciones',$datos);
    }
    
    /*function eliminarDestino($id){
        //$query = "DELETE FROM tbl_destino WHERE id_destino=$id";
        //$this->db-query($query);
        $query = $this->db->delete('tbl_destino',array('id_destino'=>$id));
    }*/
}