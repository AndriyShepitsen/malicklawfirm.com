<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//LOCATION: q/Legal-Partner-Skokie-Northbrook/Contact-Information

class Legal_Partner_Skokie_Northbrook extends CI_Controller {


	public function Contact_Information()
	{

		$data['page'] = 'Contact-view';
		$this->load->view('default_view', $data);
		
	}


	public function send()
	{
	
		$config = array();

		
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'malicklawfirmmail@gmail.com';
		$config['smtp_pass'] = '2MjXLav6';

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('drivanbohun@gmail.com', 'Website Contact form');
		$this->email->to('drivanbohun@gmail.com');		
		$this->email->subject('This is an email test');		
		$this->email->message('It is working. Great!');
		
				
		if($this->email->send())
		{
			echo 'Your email was sent, fool.';
		}
		
		else
		{
			show_error($this->email->print_debugger());
		}



	}


}

/* End of file Legal_Partner_Skokie_Northbrook.php */




/* Location: ./application/controllers/Legal_Partner_Skokie_Northbrook.php */