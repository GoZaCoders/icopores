<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public $variable;

public function __construct()
{
	parent::__construct();
	
}
	public function login($users, $password){

		/*Nos devuelve una fila es por que existe*/
		$this->db->where('users', $users);
		$this->db->where('password',$password);
		$query = $this->db->get('usuario');
		if ($query->num_rows()>0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	function valida_usuario_ajax($users){

		//Comparamos en la DB usuarios y capturamos el nombre de la tabla
		$this->db->where('users', $users);
		$query = $this->db->get('usuario');
		
		if($query->num_rows() >0){
			return TRUE;
		} else {
			return FALSE;
		}

	}

}

