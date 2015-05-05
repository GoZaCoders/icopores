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

//Metodo para cargar los datos de la tabla al formulario.
public function cargar_proveedor($IdProveedor) {        

        $edicion = $this->proveedor_model->getProveedores($IdProveedor);

        if($edicion != FALSE){
            foreach ($edicion->result() as $row) {
                           $nombre_proveedor = $row->nombre_proveedor;
                           $direccion = $row->direccion;
                           $telefono = $row->telefono;
                           $correo = $row->correo;
                        } 
                
                $data = array (
                'idproveedor' => $IdProveedor,
                'nombre_proveedor' => $nombre_proveedor,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'correo' => $correo
                );
        }else{
            $data = '';
            return FALSE;
        }                                        
         $this->load->view('proveedor/crear_proveedor', $data);
    }


     public function operacion_proveedor(){

        
         if($IdProveedor == 0){        
         $Opcion = 'insert';
         $IdProveedor = null;
         $NombreProveedor = $this->input->post('nombre_proveedor');
         $Direccion = $this->input->post('direccion');
         $Telefono = $this->input->post('telefono');
         $Correo = $this->input->post('correo');         
         $this->proveedor_model->Proveedor_crud($Opcion, $IdProveedor, $NombreProveedor, $Direccion, $Telefono, $Correo);
         redirect('proveedor');

        }if ($IdProveedor != 0) {
        echo $resul=1;
         $Opcion = 'Update';
         $NombreProveedor = $this->input->post('nombre_proveedor');
         $Direccion = $this->input->post('direccion');
         $Telefono = $this->input->post('telefono');
         $Correo = $this->input->post('correo');         
         $this->proveedor_model->Proveedor_crud($Opcion, $IdProveedor, $NombreProveedor, $Direccion, $Telefono, $Correo);
        }                           
   }


  public function eliminar_proveedor($IdProveedor) {
        
        if ($IdProveedor) {
            $Opcion = 'Delete';
            $this->proveedor_model->Proveedor_crud($Opcion, $IdProveedor);           
            redirect('proveedor');
        }
    }


}