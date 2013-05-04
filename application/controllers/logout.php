<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//LOCATION: q/partner

class Logout extends CI_Controller {

	public function index()
	{
					
		$this->session->sess_destroy();
		redirect('/home');
	
	}

}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */


?>