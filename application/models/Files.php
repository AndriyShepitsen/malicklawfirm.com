<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once APPPATH . 'include.php';

//LOCATION: admin/editUser/2

class Files extends CI_Model {

	public function getUserFiles($id)
	{
		$this->db->where('owner', $id);
		$q = $this->db->get('files');
		$userFiles = array();

		foreach ($q->result() as $row) 
		{
			$userFiles[] = new UploadedFile($row->file_id, $row->file_path);
		}

		return $userFiles;
	}

	public function deleteFiles($userFiles)
	{
	 	foreach ($userFiles as $uFile) {

	 	$this->deleteFileById($uFile);
	 	
	 	}

	 	return TRUE;
	}

	public function deleteFileById($fileId)
	{
		$this->db->where('file_id', $fileId);
		$this->db->limit(1);
	return	$this->db->delete('files');

	}

	public function insertFile($owner, $fileName)
	{
		$arrInsert = array(
			'owner' => $owner,
			'file_path'=>$fileName);

		return $this->db->insert('files', $arrInsert);

	}

}

/* End of file Files.php */
/* Location: ./application/models/Files.php */