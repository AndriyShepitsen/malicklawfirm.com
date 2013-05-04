<?php
//LOCATION: admin/editUser/2
include_once APPPATH . 'include.php';
?>
<div id="editUserContainer">
	

	<div id="editUser">
		<?php 


		$hidden = array('userId'=> ((int)$this->uri->segment(3)));

		echo form_open('admin/updateUser/', '', $hidden);

		$formFieldSetEditUser = array('id'=>'formFieldSetEditUser');

		echo form_fieldset('Edit User Information', $formFieldSetEditUser);




		$fr1 = form_label('First Name', 'firstName', array('class'=>'formLabelsEditUser'));
		$arr1 = array(
			'id'=>'firstName',
			'name'=>'firstName',
			'label'=>'First Name');




		$fr2 = form_label('Last Name', 'lastName', array('class'=>'formLabelsEditUser'));
		$arr2 = array(
			'id'=>'lastName',
			'name'=>'lastName',
			'label'=>'Last Name');





		$fr3 = form_label('Email', 'email', array('class'=>'formLabelsEditUser'));
		$arr3 = array(
			'id'=>'email',
			'name'=>'email',
			'label'=>'Email');


		$fr31 = form_label('Password', 'password', array('class'=>'formLabelsEditUser'));
		$arr31 = array(
			'id'=>'password',
			'name'=>'password',
			'label'=>'password');


		if ($this->input->post()) 
		{
			$arr1['value'] = $this->input->post('firstName');
			$arr2['value'] = $this->input->post('lastName');
			$arr3['value'] = $this->input->post('email');
			$arr31['value'] = $this->input->post('password');

		} 

		$arr1['value'] = $firstName;
		$arr2['value'] = $lastName;
		$arr3['value'] = $email;
		$arr31['value'] = $password;




		$inp1 = form_input($arr1);
		$inp2 = form_input($arr2);
		$inp3 = form_input($arr3);
		$inp31 = form_input($arr31);


		$this->table->add_row($fr1);	
		$this->table->add_row($inp1);	
		$this->table->add_row($fr2);
		$this->table->add_row($inp2);
		$this->table->add_row($fr3);	
		$this->table->add_row($inp3);	
		$this->table->add_row($fr31);	
		$this->table->add_row($inp31);	

		$fr4 = form_label('Is Administrator', 'isAdmin', array('class'=>'formLabelsEditUser'));
		$inp4 =  form_checkbox('isAdmin', 'Administrator', $isAdminView); 

		$this->table->add_row($fr4);	
		$this->table->add_row($inp4);	

		$arrWspace =array(
			'data'=>'		-	', 
			'colspan'=>'2'); 

		$arrUserFiles =array(
			'data'=>'User Files', 
			'class'=>'userFiles',
			'colspan'=>'2'); 

		// $this->table->add_row($arrWspace);
		$this->table->add_row($arrUserFiles);
		// $this->table->add_row($arrWspace);

		foreach ($userFiles as $file) {

			$arrFileIdFileName = explode('  ', $file);

			$userFileLink = anchor(base_url().'uploads/'.$arrFileIdFileName[1], $arrFileIdFileName[1], array('class'=>'fileLinks', 'target'=>'_blank'));


			$this->table->add_row($userFileLink);
			$this->table->add_row(form_checkbox($arrFileIdFileName[0], $arrFileIdFileName[1], TRUE) );

		}

		$fr5 = form_submit('Submit', 'Save Changes');
		$this->table->add_row($fr5, '');	

		echo $this->table->generate();
		if (isset($val_errors_form2)) {
			echo $val_errors_form2;
		}
		echo form_fieldset_close();
		echo form_close();


		?>

	</div>

	<div id="UploadFile">

		<?php

		if (isset($error))
			echo $error;
		?>

		<?php 

		echo form_open_multipart('upload/do_upload','',$hidden );

//echo form_input('name', 'value', $attributes);
		?>
		<input type="file" name="userfile" size="20" />

		

		<input type="submit" value="Upload" />	


	</div>

</div> 
<!-- EditContainer -->