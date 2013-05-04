<div class='userArea'>
	<p id='userNameEm'>
<?php
echo $this->session->userdata('userName');		
?>

	</p>
<div class='FileLinksPartner'>
<p id='partnerAreap'>Personal Files</p>

<?php
//LOCATION: q/partner
$httpHeader = str_replace('http://', 'file:///', base_url());

$counter = 1;
foreach ($arrUserFileNames as $file) {
$fileAnch = anchor(base_url().'uploads/'.$file, $counter++.'.'. $file, array('class'=>'fileLinks', 
	'target'=>'_blank'))."<br/>";

echo $fileAnch;
}

?>

</div>
</div>