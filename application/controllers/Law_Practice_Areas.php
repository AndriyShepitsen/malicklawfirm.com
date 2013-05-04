<?php
//LOCATION: home/

class Law_Practice_Areas extends CI_Controller {

public function __construct()
{
	parent::__construct();
}


public function Legal_Help()
{

	$data['page'] = 'PracticeAreas-view';
	$this->load->view('default_view', $data);
	}
}