<?php
include_once APPPATH . 'include.php';

//LOCATION: q/admin/editUser/2.html

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	protected $_userId_transferred;

	public function __construct()
	{
		parent::__construct();

		if (!$this->isLoggedInIsAdmin()) {
		//echo "You have to login like Administrator to see this page.";
		redirect('home');		    
		}


		$this->load->model('Users');
		$this->load->model('Files');
	}


	public function isLoggedInIsAdmin()
	{
		$is_LoggedIn = $this->session->userdata['is_LoggedIn'];

		if ($is_LoggedIn==null || $is_LoggedIn!=true)
			return false;
		
		$is_Admin = $this->session->userdata['is_Admin'];

		if ($is_Admin==null || $is_Admin!=true)
			return false;

		return true;
	}

	protected $_data=array();
	

	public function getLoginedUserId()
	{
	    
	$adminId = $this->session->userdata['userId'];
	return $adminId;

	}

	public function updateUser()
	{

	 $firstName = $this->input->post('firstName');
	 $lastName = $this->input->post('lastName');
	 $email = $this->input->post('email');
	 $password = $this->input->post('password');
	 $userId =  $this->input->post('userId');


	 $arrayCounter = 5;	

	
	 if (array_key_exists('isAdmin', $this->input->post())) {
	 $arrayCounter++;
	 $isAdmin=1;
	 $updatedUser = new AdminUser();
	 } else {
	 $updatedUser = new ClientUser();
	 }

	 $updatedUser->set_id($userId);
	 $updatedUser->set_firstName($firstName);
	 $updatedUser->set_lastName($lastName);
	 $updatedUser->set_email($email);
	 $updatedUser->set_password($password);

	 $userFilesFinal = $this->getFileIdsFromForm($arrayCounter);

	 $this->Users->updateUser($updatedUser, $userFilesFinal);
	 
	 $this->_userId_transferred = $updatedUser->get_id();

	 redirect("Admin/EditUser/".$updatedUser->get_id());

		


	}


	public function getFileIdsFromForm($arrayCounter) {
	$userFilesFinal = array();
	 $arrKeys = array_keys($this->input->post());
	 for ($i = $arrayCounter; $i <count($arrKeys); $i++) {
	 $key = $arrKeys[$i];
	 if ($key=='Submit')
	 break;
 	$userFilesFinal[] = $key;
	 }
	 return $userFilesFinal;
	}

	public function index()
	{
	$adminId = $this->getLoginedUserId();
	
	//$adminId = $this->session->userdata['userId'];


	$helpUser = new AdminUser();

	$adminCurrent = $helpUser->getUpUserById($adminId);

	$sUsers = $adminCurrent->extractAllUsers();

	 $this->_data['sUsers'] = $sUsers;

	 $this->_data['page'] = 'Admin-view';
	 $this->load->view('default_view', $this->_data);

	}


	public function logout()
	{
				
		$this->session->sess_destroy();
		$this->_data['page'] = 'Home-view';
		$this->load->view('default_view', $this->_data);

	}

	public function editUser()
	{

	 $user_id = (int)$this->uri->segment(3);
	 if ($user_id==0)
	 	$user_id = $this->_userId_transferred;
	 

	 $delUser = new AdminUser();

	 $myUser = $delUser->getUpUserById($user_id);

	 $myUser->extractFiles();
	
	  $this->_data['firstName'] = $myUser->get_firstName(); 
	  $this->_data['lastName'] = $myUser->get_lastName(); 
	  $this->_data['email'] = $myUser->get_email(); 
	  $this->_data['password'] = $myUser->get_password();

	  $this->_data['userFiles'] = $this->generateTextArray($myUser->filesList);
	  $this->_data['isAdminView'] = $myUser->isAdmin();	 


	  $this->_data['page'] = 'EditUser-view';
	  $this->load->view('default_view', $this->_data);

	}


	protected function generateTextArray($filesList) {
		$textFilesList = array();

		foreach ($filesList as $file) {
		$fileArray = $file->get_fileId() . '  '.$file->get_filePath();

		$textFilesList[] = $fileArray;

		}
		return $textFilesList;

	}

	public function createUser()
	{
	
	$this->load->library('form_validation', array(), 'create_user_validation');
	$this->create_user_validation->set_rules('firstName', 'First Name', 'trim|required|xss_clean');
	$this->create_user_validation->set_rules('lastName', 'Last Name', 'trim|required|xss_clean');
	$this->create_user_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|is_unique[users.email]');

	 if (!$this->create_user_validation->run())	{
	 	$this->_data['val_errors_form2']  = validation_errors("<p class=\"valError\">");
	 	$this->index();
	 } else{
	 	$this->_data['val_errors_form2'] = null;

	 	$uFirstName = $this->input->post('firstName');
	 	$uLastName = $this->input->post('lastName');
	 	$uEmail = $this->input->post('email');
	 	$isAdmin = $this->input->post('isAdmin');

	 	if ($isAdmin=='Administrator') {
	 	$newUser= new AdminUser();
	 	$newUser->set_isAdmin(1);
	 	} else {
	 	$newUser= new ClientUser();
	 	$newUser->set_isAdmin(0);
	 	}

	 	$newUser->set_firstName($uFirstName);
	 	$newUser->set_lastName($uLastName);
	 	$newUser->set_email($uEmail);
	 	$newUser->generatePassword();

	 	
	 	$this->Users->saveUser($newUser);

	 	unset ($_POST);
	  	$this->index();
	 }




	}


	public function delete()
	{
	 $user_id = (int)$this->uri->segment(3);

	 $loginedUserId = $this->getLoginedUserId();
	 if ($user_id==$loginedUserId) {
	 	$this->_data['admin_error'] = "You cannot delete yourself";
	 	} else {
	 		$this->_data['admin_error'] = null; 
	 		$this->Users->deleteUser($user_id);
	 	}

	 	$this->index();
	
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
