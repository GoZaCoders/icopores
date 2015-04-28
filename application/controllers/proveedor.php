<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
    {
        $this->load->view('proveedor');
        
    }

    public function insertar_proveedor(){
        $params = array(
            '_Opcion' => $this->input->post('insert'), 
            '_NombreProveedor' => $this->input->post('NombreProveedor'), 
            '_Direccion' => $this->input->post('Direccion'), 
            '_Telefono' => $this->input->post('Telefono'), 
            '_Correo' => $this->input->post('Correo'), 
                        );
        $this->load->model('proveedor_model');
        $this->proveedor_model->proveedor_crud($params);
    }

}