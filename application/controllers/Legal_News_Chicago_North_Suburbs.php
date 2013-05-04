<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Legal_News_Chicago_North_Suburbs extends CI_Controller {

	public function Judicial_Important_Information()
	{
		$data['page'] = 'News-view';
	 	$this->load->view('default_view', $data);
	}

}

/* End of file Legal_News_Chicago_North_Suburbs.php */
/* Location: ./application/controllers/Legal_News_Chicago_North_Suburbs.php */