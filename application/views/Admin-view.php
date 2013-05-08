<?php
//LOCATION: q/admin/
include_once APPPATH . 'include.php';
?>
<div id="adminWrapper">
	<div id="addUserForm">
		<?php 
		echo form_open('admin/createUser/');

		$formFieldSetAdmin = array('id'=>'formFieldSetAdmin');

		echo form_fieldset('New User Registration', $formFieldSetAdmin);
		
		///echo create_user_validation_errors('<p class="valError">');


		$fr1 = form_label('First Name', 'firstName', array('class'=>'formLabelsAdmin'));
		$arr1 = array(
			'id'=>'firstName',
			'name'=>'firstName',
			'label'=>'First Name');
		

		

		$fr2 = form_label('Last Name', 'lastName', array('class'=>'formLabelsAdmin'));
		$arr2 = array(
			'id'=>'lastName',
			'name'=>'lastName',
			'label'=>'Last Name');

		
		


		$fr3 = form_label('Email', 'email', array('class'=>'formLabelsAdmin'));
		$arr3 = array(
			'id'=>'email',
			'name'=>'email',
			'label'=>'Email');

		if ($this->input->post()) 
		{
			$arr1['value'] = $this->input->post('firstName');
			$arr2['value'] = $this->input->post('lastName');
			$arr3['value'] = $this->input->post('email');

		} 

		// $arr1['value'] = 'firstName';
		// $arr2['value'] = 'lastName';
		// $arr3['value'] = 'email@gjg.com';


		
		$fr4 = form_label('Is Administrator', 'isAdmin', array('class'=>'formLabelsEditUser', 'for'=>'isAdmin'));
		//$inp4 =  form_checkbox('isAdmin', 'Administrator', $isAdminView, array('id'=>'isAdmin')); 
		$inp4 =  form_checkbox(array('id'=>'isAdmin', 'name'=>'isAdmin', 'checked'=>FALSE, 'value'=>'Administrator')); 

		

		$inp1 = form_input($arr1);
		$inp2 = form_input($arr2);
		$inp3 = form_input($arr3);


		$this->table->add_row($fr1);	
		$this->table->add_row($inp1);	
		$this->table->add_row($fr2);
		$this->table->add_row($inp2);
		$this->table->add_row($fr3);	
		$this->table->add_row($inp3);

		$this->table->add_row($fr4 .'    '. $inp4);	


		$arrSubmit = array(
			'type'=>'Submit',
			'value'=>'Add User',
			'id'=>'submitButtonAdmin');
		$fr5 = form_submit($arrSubmit);


		$this->table->add_row($fr5);	
			if (isset($val_errors_form2)) {
			echo $val_errors_form2;
		}

		
		echo $this->table->generate();
	
		echo form_fieldset_close();

		
		echo form_close();

		

		?>

	</div>

	<div id="adminContent">
		<?php

		$this->table->set_heading('Id','Client Names ', 'Admin', 'Delete');

		$iTableCounter = 1;

		foreach ($sUsers as $user) {

			$cell1 =$iTableCounter++; 
			$cell2 = anchor('admin/editUser/'.$user->get_id(), $user->fullName(), array('class'=>'linkEdit'));
			$cell3 = $user->isAdmin() === TRUE ? 'Admin' : '';

			$cell5 = anchor('admin/delete/'.$user->get_id(), 'delete', array('class'=>'linkEdit', 
				'onClick' => "return confirm('Are you sure you want to delete this user?')"
				));

			$this->table->add_row($cell1, $cell2, $cell3, $cell5);

		}
		if (isset($admin_error)){
			echo "<p class=\"valError\">" . $admin_error . "</p>";
		}
		?>
		<p class='sysUsers'>System Users</p>



		<?php
		echo $this->table->generate();

		?>

	</div>
</div>






