
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once APPPATH . 'include.php';

class Home extends CI_Controller {

	protected $_data;
	//LOCATION: q/home/

	public function index()
	{
	 
	 $this->_data['page'] = 'Home-view';
	 $this->load->view('default_view', $this->_data);

	}



	public function login() 
	{
		$this->form_validation->set_rules('userName','E-mail','trim|required|valid_email');
		if ($this->form_validation->run()==TRUE) 
		{
			$userEmail = $this->input->post('userName');
			$userPass = $this->input->post('userPass');

			/////////////////////////////////////////////
			$aUser = new AdminUser();
			
			$loggedUser = $aUser->loginUser($userEmail, $userPass);

			if ($loggedUser){
			$session_array = array(
			'userId' => $loggedUser->get_id(),
			'userName' => $loggedUser->fullName(),
			'is_LoggedIn' => TRUE);

			if ($loggedUser->isAdmin()){

			$session_array['is_Admin'] = TRUE;
			$this->session->set_userdata($session_array);
			redirect('Admin');
			} else {
			$this->session->set_userdata($session_array);
			redirect('Partner');
			}

			

			} else {

			$this->_data['isTriedToLogIn'] = 1; 
			}
			
			$this->_data['page'] = 'Home-view';
	 		$this->load->view('default_view', $this->_data);			

			//////////////////////////////////////////////

			
		}
		else
		{
			$this->index();

		}


	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */