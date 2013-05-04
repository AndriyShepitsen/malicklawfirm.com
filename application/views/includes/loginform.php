			<?php

//LOCATION: q/home/
			
			echo form_open('home/login', array('class'=>'user_Form'));
			//////
			
			echo form_input(array(
				'id'=>'userName',
				'name'=>'userName',
				 'Placeholder'=>'E-mail'
				));
			/////

						echo form_password(array(
				'id'=>'userPass',
				'name'=>'userPass',
				'Placeholder'=>'Password'

				));

			echo form_submit('submit', 'Log in');

			//echo form_submit('login', 'LogIn');
			echo form_close();
			echo validation_errors('<p class="valError">');
			//echo '<p class="valError">Test</p>';

			if (isset($isTriedToLogIn)) {
				echo '<p class="valError">Login credentials are incorrect</p>';
			}