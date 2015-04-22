<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	
	'login' => array(	
		array(
			'field'       => 'users',
            'placeholder' => 'Nombre de Usuario',
            'rules'       => 'trim|required|min_length[3]'
             ),
        array(
            'field'       => 'password',
            'placeholder' => 'Contraseña',
            'rules'       => 'trim|required|min_length[3]'
             )
        
        )
);