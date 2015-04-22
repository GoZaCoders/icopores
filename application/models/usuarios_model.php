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

}

/* End of file usuarios_model.php */
/* Location: ./application/models/usuarios_model.php */