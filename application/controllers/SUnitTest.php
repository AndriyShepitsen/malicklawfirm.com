<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//LOCATION: SUnitTest/


include_once APPPATH . 'include.php';



class SUnitTest extends CI_Controller {
	
	
	public function __construct()
	{
	parent::__construct();
	$this->load->model('Files');
	//$this->load->model('Users');

	$this->load->library('unit_test');
	}

	public function index()
	{
	$this->testClasses();
	}

	public function testClasses()
	{

	
	// $results  = $this->Files->getUserFiles(1);

	// //echo $this->_unitTest->run($results, 'is_array(3)');
	// echo $this->unit->run($results, 'is_array');
	// echo $this->unit->run(count($results), 3);
	
	// /////////////////////////////////////////

	// echo $this->unit->run($results[1]->get_fileId(), '2');
	// echo $this->unit->run($results[1]->get_filePath(), 'path\file2.pdf');
	
	/////////////////////////////////////////
	$testUser = new AdminUser();

	// echo $this->unit->run(FALSE, $testUser->logIn('anita@malicklawfirm.com',''));
	// echo $this->unit->run(TRUE, $testUser->logIn('anita@malicklawfirm.com','pass'));
	// /////////////////////////////////////////

	// echo $this->unit->run($testUser->get_id(), '1');
	// echo $this->unit->run($testUser->get_firstName(), 'Anita');
	// echo $this->unit->run($testUser->get_lastName(), 'Malick');
	
	// echo $this->unit->run($testUser->get_email(), 'anita@malicklawfirm.com');
	// echo $this->unit->run($testUser->get_password(), 'pass');
	// echo $this->unit->run($testUser->get_isAdmin(), '1');
	// echo $this->unit->run($testUser->fullName(), 'Anita Malick');
	
	// echo $this->unit->run(count($testUser->filesList), 3);
	// echo $this->unit->run($testUser->filesList[2]->get_fileId(), '3');
	// echo $this->unit->run($testUser->filesList[2]->get_filePath(), 'path\file3.pdf');


	$aUser = $testUser->loginUser('anita@malicklawfirm.com', 'pass');

	$user = new AdminUser();

	$nUser = $user->getUpUserById(4);
	echo $this->unit->run('Karim',$nUser->get_firstName());
	echo $this->unit->run(TRUE, $nUser->isAdmin());
	echo $this->unit->run('Karim Malick', $nUser->fullName());

	


	// $allUsers = $aUser->extractAllUsers();
	// echo $this->unit->run(3, count($allUsers));
	

	// echo($karim->get_firstName());


	

		


	// echo $this->unit->run(TRUE, $aUser);
	// echo $this->unit->run(1, $aUser->get_id());
	// echo $this->unit->run('Anita', $aUser->get_firstName());
	// echo $this->unit->run('Malick', $aUser->get_lastName());
	// echo $this->unit->run('anita@malicklawfirm.com', $aUser->get_email());
	// echo $this->unit->run(1, $aUser->get_isAdmin());
	// echo $this->unit->run(3, count($aUser->filesList));
	// ////////////////////////////////////////////////////////////////////////
	// $aUser = $testUser->loginUser('borisoberman@aol.com', 'bpass');
	// echo $this->unit->run(TRUE, $aUser);
	// echo $this->unit->run(0, $aUser->get_isAdmin());
	// echo $this->unit->run('Boris Oberman', $aUser->fullName());

	///$aUser = $testUser->createUser('anita@malicklawfirm.com', 'pass');

	
	
	}

	public function testFunctionality()
	{
		


	}

}

/* End of file UnitTest.php */
/* Location: ./application/controllers/UnitTest.php */

