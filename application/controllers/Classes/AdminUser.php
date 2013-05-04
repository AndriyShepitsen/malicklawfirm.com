<?php

include_once 'User.php';

class AdminUser extends User
{
	//$allUsers = array();	

	function __construct()
	{
		parent::__construct();
		$this->_isAdmin = 1;
	}



 	public function loginUser($email, $password)
    {
    
    $myUser = $this->Users->getUser($email, $password);

    if ($myUser) {

    	$createdUser = $this->createUser($myUser->user_id, $myUser->firstName, $myUser->lastName, $myUser->email, $myUser->isAdmin);
        return $createdUser;
        }
        
    return false;

    }

    public function extractAllUsers()
    {
	  return $this->Users->getAllUsers($this->get_id()); 	
    }


	protected function createUser($id, $firstName, $lastName, $email, $isAdmin)
	{

		$isAdmin == 1 ? $newUser = new AdminUser() : $newUser = new ClientUser();

		$newUser->set_Id($id);
		$newUser->set_firstName($firstName);
		$newUser->set_lastName($lastName);
		$newUser->set_email($email);
		$newUser->set_isAdmin($isAdmin);
		$newUser->extractFiles();

		return $newUser;

	}

	protected function saveUserToDB(User $user)
	{
		$this->load->model('Users');
		$this->Users->saveUserToDB($user);
	}




}