<?php
//LOCATION: home/

class NorthBrook_Skokie_Community_Legal_Aid extends CI_Controller {

public function __construct()
{
	parent::__construct();
}


public function Neighborhood_Adviser()
{

	$data['page'] = 'Community-view';
	 $this->load->view('default_view', $data);
}
}
