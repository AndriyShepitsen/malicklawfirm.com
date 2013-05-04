<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NorthBrook_Skokie_Law_Partner extends CI_Controller {

	public function Collaboration_With_Us()
	{
		$data['page'] = 'OurFirm-view';
	 	$this->load->view('default_view', $data);
	}

}

/* End of file NorthBrook_Skokie_Law_Partner.php */
/* Location: ./application/controllers/NorthBrook_Skokie_Law_Partner.php */