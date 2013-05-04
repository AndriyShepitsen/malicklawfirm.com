<?php

class Upload extends CI_Controller {

//LOCATION: q/admin/editUser/2

	function __construct()
	{
		parent::__construct();
		$this->load->model('Files');
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf|jpg|png|doc|docx';
		$config['max_size']	= '1000';
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo $this->upload->display_errors();
		}
		else
		{

			$owner = $this->input->post('userId');
			$filePath = $this->upload->data()['file_name'];
			
			$this->Files->insertFile($owner, $filePath);
			redirect('Admin/EditUser/'. $owner);
		}
	}
}
?>