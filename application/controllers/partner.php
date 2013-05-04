<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//LOCATION: q/partner

class Partner extends CI_Controller {
	protected $_data;

	public function __construct()
	{
	 
	 parent::__construct();

	 if (!$this->isLoggedIn()) {
		redirect('home');		    
		}

	 $this->load->model('Files');

	}


	public function index()
	{

	$user_id = $this->getLoginedUserId();
	$userFiles = $this->Files->getUserFiles($user_id);
	$arrUserFileNames = array();


	foreach ($userFiles as $file) {
	$arrUserFileNames[] = $file->get_filePath();
	}

	 $this->_data['arrUserFileNames'] = $arrUserFileNames;
	 $this->_data['page'] = 'Partner-view';
	 $this->load->view('default_view', $this->_data);

	}


	public function isLoggedIn()
	{
		$is_LoggedIn = $this->session->userdata['is_LoggedIn'];

		if ($is_LoggedIn==null || $is_LoggedIn!=true)
			return false;
		
		return true;
	}


	public function getLoginedUserId()
	{
	    
	$adminId = $this->session->userdata['userId'];
	return $adminId;

	}

}

/* End of file client.php */
/* Location: ./application/controllers/client.php */

?>