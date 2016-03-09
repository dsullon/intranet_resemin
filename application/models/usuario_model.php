<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    public function iniciarSesion($username,$password)
    {
        $this->db->where('nick',$username);
        $this->db->where('clave',$password);
        $query = $this->db->get('usuarios');
        if($query->num_rows() == 1)
        {
            return $query->row();
        }else{
            $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
            redirect(base_url().'login','refresh');
        }
    }
    
    function obtenerUsuario($id){
        $this->db->where('idUsuario',$id);
        $query = $this->db->get('usuarios');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    /*function crearDestino($data){
        $this->db->insert('tbl_destino',array('descripcion'=>$data['nombre']));
    }*/
    
    /*function obtenerDestinos(){
        $query = $this->db->get('tbl_destino');
        if($query->num_rows() > 0) return $query;
        else return false;
    }*/
    
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