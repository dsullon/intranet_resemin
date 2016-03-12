<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function obtener($id){
        $this->db->where('idPagina',$id);
        $query = $this->db->get('paginas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function listarTodos(){
        $query = $this->db->get('paginas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function crear($data){
        $this->db->insert('paginas',array('titulo'=>$data['titulo'], 'descripcion'=>$data['descripcion'], 
            'palabrasClaves'=>$data['clave'], 'encabezado'=>$data['cabecera'], 'contenido'=>$data['detalle'],
            'creadoPor'=>$this->session->userdata('usuario'), 'fechaCreacion'=>date('Y-m-d H:i:s'),
            'ultimaModificacion'=>date('Y-m-d H:i:s'), 'modificadoPor'=>$this->session->userdata('usuario')));
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