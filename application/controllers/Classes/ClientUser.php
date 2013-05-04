<?php

class ClientUser extends User
{
	
	function __construct()
	{
		parent::__construct();
		$this->_isAdmin = 0;
	}
}