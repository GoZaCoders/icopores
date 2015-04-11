<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function key() {
		echo md5('icopores');
	 	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */