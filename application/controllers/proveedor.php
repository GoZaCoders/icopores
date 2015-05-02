<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         $this->load->model('proveedor_model');
    }
    public function index()
    {
        /*$this->load->model('proveedor_model');
        $data["listado"]=$this->proveedor_model->get_proveedores();      
        $this->load->view('proveedor/proveedor_view',$data);  */

         $data = array(
            'titulo' => 'Listado Prioveedores',
            'listado' => $this->proveedor_model->get_proveedores(),
            'contenido' => 'proveedor/proveedor_view'
        );
        $this->load->view('proveedor/proveedor_view', $data);      
    }

    /*public function insertar_proveedor(){
        $params = array(
             $Opcion = 'insert';
             $IdProveedor = $this->input->post('IdProveedor');
             $NombreProveedor = $this->input->post('NombreProveedor');
             $Direccion = $this->input->post('Direccion');
             $Telefono = $this->input->post('Telefono');
             $Correo = $this->input->post('Correo');
                        );
        $this->load->model('proveedor_model');
        if($this->proveedor_model->proveedor_crud($params)){
            redirect('proveedor');
        }
    }*/

     public function insertar_proveedor(){
      if($this->input->post()){
         $Opcion = 'insert';
         $IdProveedor = null;
         $NombreProveedor = $this->input->post('nombre_proveedor');
         $Direccion = $this->input->post('direccion');
         $Telefono = $this->input->post('telefono');
         $Correo = $this->input->post('correo');
         $this->load->model('proveedor_model');
         $this->proveedor_model->Proveedor_crud($Opcion, $IdProveedor, $NombreProveedor, $Direccion, $Telefono, $Correo);
         redirect('proveedor');
      }else{
         echo "Sin evento";
      } 
   }

  public function editar_proveedor($IdProveedor) {
         
     /*if ($IdProveedor){
             $data = array(
                'titulo' => 'Crear proveedor',               
                'contenido' => 'proveedor/crear_proveedor',
                'data' => $this->proveedor_model->getProveedores($IdProveedor)
            ); 

            //echo $IdProveedor;
            $this->load->view('proveedor/crear_proveedor', $data);
            }*/             
    }

  public function eliminar_proveedor($IdProveedor) {
        //echo 'hola'; exit;
        if ($IdProveedor) {
            $Opcion = 'Delete';
            $this->proveedor_model->Proveedor_crud($Opcion, $IdProveedor);           
            redirect('proveedor');
        }
    }


}