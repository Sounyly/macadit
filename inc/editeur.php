<?php 
	
	include '../inc/header.php';
 ?>


<div class="container-fluid">
	<?php include '../inc/navbar.php'; ?>

	<div class="row header">
		<div class="container">
				<div class="col-lg-12">
				<img src="/macadit/img/logo/macky-logo.png" alt="Logo du robot Macky" class="logo-macky">
				<h1 class="texte-header">Mac a dit!</h1>
				</div>
		</div>
	</div><!-- fin row -->

	
	<div class="container" id ="page">
		

<textarea id="markItUp" cols="80" rows="20" class="border">

</textarea>


<script type="text/javascript">
$(function() {
	// Add markItUp! to your textarea in one line
	// $('textarea').markItUp( { Settings }, { OptionalExtraSettings } );
	// le parametre "mySetting" correspond à la variable dans set.js
	$('#markItUp').markItUp(mySettings);
});
</script>
