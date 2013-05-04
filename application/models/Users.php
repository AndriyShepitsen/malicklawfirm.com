<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once APPPATH . 'include.php';

//LOCATION: admin/editUser/2


class Users extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Files');
	}

	public function getUser($userEmail, $userPass)
	{
		
	$this->db->where('email', $userEmail);
	$this->db->where('password', $userPass);
	$q = $this->db->get('users');

	if ($q->num_rows()==0) {
		return false;
		
	} else {

		return $q->row();

		}
	}

	public function saveUser(User $user)
	{

	$inArrUser = array(
		'firstName'=>$user->get_firstName(),
		'lastName'=>$user->get_lastName(),
		'email'=>$user->get_email(),
		'password'=>$user->get_password(),
		'isAdmin'=>$user->get_isAdmin());

	//$this->db->insert('users', $inArrUser);

	return $this->db->insert('users', $inArrUser);
	}

	public function getAllUsers($id)
	{
	
	$this->db->where('user_id !=', $id);
	$this->db->order_by('isAdmin', 'desc');

	$query = $this->db->get('users');
	if ($query->num_rows==0)
		return false;
	$res = array();

		foreach ($query->result() as $row) 
		{
			if ($row->isAdmin==1) {
			$user = new AdminUser();
			$user->set_isAdmin(1);
			} else {
			$user = new ClientUser();
			$user->set_isAdmin(0);
			}

			$user->set_id($row->user_id);
			$user->set_firstName($row->firstName);
			$user->set_lastName($row->lastName);
			$user->set_email($row->email);

			$res[] = $user;
		}	
		return $res;
	}

	public function getUserById($id)
	{
		$this->db->where('user_id',$id);
		$query = $this->db->get('users');

		if ($query->num_rows==0)
			return false;

			if ($query->row()->isAdmin==1) {
			$user = new AdminUser();
			$user->set_isAdmin(1);
			} else {
			$user = new ClientUser();
			$user->set_isAdmin(0);
			}

			$user->set_id($query->row()->user_id);
			$user->set_firstName($query->row()->firstName);
			$user->set_lastName($query->row()->lastName);
			$user->set_email($query->row()->email);
			$user->set_password($query->row()->password);

			return $user;
	}

	public function deleteUser($id)
	{
		$this->db->where('user_id', $id);
		$this->db->limit(1);
		$this->db->delete('users');
	}


	public function updateUser(User $updateUser, $arrUserFiles)
	{

		 $arrUpDatedUser = array(
	 	'firstName'=>$updateUser->get_firstName(),
	 	'lastName'=>$updateUser->get_lastName(),
	 	'email'=>$updateUser->get_email(),
	 	'password'=>$updateUser->get_password(),
	 	'isAdmin'=>$updateUser->get_isAdmin());

		 $this->db->where('user_id', $updateUser->get_id());
		 $this->db->update('users', $arrUpDatedUser);

	 $arrUserAllFiles = $this->_getUserFilesById($updateUser->get_id());

	 $arrayDiff = array_diff($arrUserAllFiles, $arrUserFiles);
	 if (count($arrayDiff)>0)
		 $this->Files->deleteFiles($arrayDiff);


	}


	protected function _getUserFilesById($userId)
	{
	  $arrFileIds = array();

	  $this->db->where('owner', $userId);
	  $query = $this->db->get('files');

	  foreach ($query->result() as $row) {
	  	$arrFileIds[] = $row->file_id;
	  }

	return $arrFileIds;

	}

}

/* End of file Users.php */
/* Location: ./application/models/Users.php */