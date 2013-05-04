<?php	

class UploadedFile
{
		
protected $_fileId;
protected $_filePath;

public function __construct($fileId, $filePath) {
	$this->_fileId = $fileId;
	$this->_filePath = $filePath;
}


public function get_fileId()
{
    return $this->_fileId;
}


public function get_filePath()
{
    return $this->_filePath;
}

public function __toString()
{
	return $this->_filePath;
}

}