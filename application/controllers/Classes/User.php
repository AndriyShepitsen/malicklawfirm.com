<?php
include_once 'PassGenerator.php';

//LOCATION: home/

abstract class User extends CI_Controller
{

	protected $_id;
	protected $_firstName;
	protected $_lastName;
	protected $_email;
	protected $_password;
	protected $_isAdmin;
	public $filesList = array();

    protected $_usersModel;
    protected $_filesModel;


    public function __construct()
    {
        parent::__construct();

        $_usersModel = $this->load->model('Users');
        $_filesModel = $this->load->model('Files');
    }

        public function generatePassword()
    {
        $this->_password =  $this->generate(8);
        return true;
    }


    public function getUpUserById($id)
    {
        return 
        $this->Users->getUserById($id);
    }


    public function isAdmin() {

        if ($this->_isAdmin==1)
            return true;

        return false;
    }



    public function extractFiles()
    {
     $this->filesList = $this->Files->getUserFiles($this->_id);
    }

   

public function get_id()
{
    return $this->_id;
}

public function set_id($Id)
{
    $this->_id = $Id;
    return $this;
}



public function get_firstName()
{
    return $this->_firstName;
}

public function set_firstName($FirstName)
{
    $this->_firstName = $FirstName;
    return $this;
}



public function get_lastName()
{
    return $this->_lastName;
}

public function set_lastName($LastName)
{
    $this->_lastName = $LastName;
    return $this;
}



public function get_email()
{
    return $this->_email;
}

public function set_email($Email)
{
    $this->_email = $Email;
    return $this;
}


public function get_password()
{
    return $this->_password;
}

public function set_password($Password)
{
    $this->_password = $Password;
    return $this;
}




public function get_isAdmin()
{
    return $this->_isAdmin;
}

public function set_isAdmin($IsAdmin)
{
    $this->_isAdmin = $IsAdmin;
    return $this;
}


public function fullName()
{
	return $this->get_firstName() .' ' .$this->get_lastName();
}



    protected  function generate($length)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }



} 