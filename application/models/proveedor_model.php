<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor_model extends CI_Model {

    

public function __construct()
{
    parent::__construct();
    
}

    //obtenemos los proveedores
    public function get_proveedores()
    {
 
        $query = $this->db->get('proveedor');
        if($query->num_rows() > 0)
        {
 
            return $query->result();
 
        }
 
    }
    public function Proveedor_crud($Opcion, $IdProveedor, $NombreProveedor, $Direccion, $Telefono, $Correo){        
        $query="call proveedor_crud('$Opcion', '$IdProveedor', '$NombreProveedor', '$Direccion', '$Telefono', '$Correo')";
        $query2=$this->db->query($query);
        return $query2;
    }

    public function getProveedores($IdProveedor) {
        $this->db->where('idproveedor', $IdProveedor);
        $query = $this->db->get('proveedor');
        if ($query->num_rows()>0) {
           return $query;
        }else{
            return FALSE;
        }
    }
}