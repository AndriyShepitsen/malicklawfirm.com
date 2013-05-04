<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attorney_Northbrook_Skokie_Offices extends CI_Controller {

	public function Legal_Consultation_Places()
	{

		$data['page'] = 'Offices-view';
	 	$this->load->view('default_view', $data);

	}

}

/* End of file Attorney_Northbrook_Skokie_Offices.php */
/* Location: ./application/controllers/Attorney_Northbrook_Skokie_Offices.php */
