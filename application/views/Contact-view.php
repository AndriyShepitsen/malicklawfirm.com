<div id="content">
	<div class="innerContent"><h1>Contact Malick Law Firm</h1>
	<hr/>
	<?php 
	echo form_open('Legal-Partner-Skokie-Northbrook/send')
	?>
	
			<ul id="contactUsForm">
				<li><label for="firstName">First Name</label>
					<input type="text" name="firstName" id="firstName"> </li>
				<li><label for="lastName">Last Name</label>
					<input type="text" name="lastName" id="lastName"></li>
				<li><label for="email">Email</label>
					<input type="text" name="email" id="email"></li>
				<li><label for="phone">Phone</label>
					<input type="text" name="phone" id="phone"></li>
				<li><label for="subject">Subject</label>
					<input type="text" name="subject" id="subject"></li>
				<li><label for="message">Message</label>
					<textarea id="message" name="message" cols="50" rows="15"></textarea></li>
				<li>
					<input id="submit" type="submit" name="submit" value="Send"></li>
			</ul>
	
		<?php 
		echo form_close();
		?>
	
	
	</div>
</div>
<!-- //LOCATION: q/Legal-Partner-Skokie-Northbrook/Contact-Information
-->
<script type="text/javascript">

$(function() {
	
	menuModifier(7);
});

</script>