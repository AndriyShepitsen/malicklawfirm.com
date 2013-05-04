<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community_Legal_Aid extends CI_Controller {

	public function Neighborhood_Partner()
	{
		
		$data['page'] = 'Community-view';
	 	$this->load->view('default_view', $data);

	}

}

/* End of file Legal_Assistance_Community.php */
/* Location: ./application/controllers/Legal_Assistance_Community.php */