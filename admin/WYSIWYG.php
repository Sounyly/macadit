<?php
include("../inc/header.php") ;
?>


<div class="container-fluid">
	<?php include '../inc/navbar.php'; ?>

	<div class="row header">
		<div class="container">
			<div class="col-lg-12">
				<img src="/macadit/img/macky-logo.png" alt="Logo du robot Macky" class="logo-macky">
				<h1 class="texte-header">Mac a dit!</h1>
			</div>
		</div>
	</div><!-- fin row -->

	
	<div class="container" id ="page">
	

	
		<!-- Un bouton pour mettre en gras le texte --> 
			 <input type="button" value="G" style="font-weight:bold;" onclick="commande('bold');" ></code>
		<!-- Un autre pour le mettre en italique  --> 
	        <input type="button" value="I" style="font-style:italic;" onclick="commande('italic');" ></code>
	    <!-- un bouton pour le souligner  --> 
	        <input type="button" value="S" style="text-decoration:underline;" onclick="commande('underline');" ></code> 
	    <!-- un bouton pour le barrer  --> 
	        <input type="button" value="B" style="text-decoration:line-through;" onclick="commande('strikethrough');" ></code>
	    <!-- un bouton pour créer un lien -->
	    	<input type="button" value="Lien" onclick="commande('createLink');" ></code>
		<!-- un bouton pour insérer une image -->
			<input type="button" value="Image" onclick="commande('insertImage');" ></code>
		<!-- un bouton pour les titres -->
			<input type="button" value="h3"  onclick="commande('1');"></code>
			<!--<select>
			    <option value="">Titre</option>
			    <option value="h1" style="font-size:1;" onclick="commande('fontSize');">Titre 1</option>
			    <option value="2" style="font-size:2;" onclick="commande('fontSize');">Titre 2</option>
			    <option value="3" style="font-size:3;" onclick="commande('fontSize');">Titre 3</option>
			    <option value="4" style="font-size:4;" onclick="commande('fontSize');">Titre 4</option>
			    <option value="5" style="font-size:5;" onclick="commande('fontSize');">Titre 5</option>
			    <option value="6" style="font-size:6;" onclick="commande('fontSize');">Titre 6</option>
			</select>-->






    <!-- Et votre <div> devient éditable ! -->
        <div id="editeur" contentEditable ></div> 
		
	</div><!-- fin #page-->
</div>

<?php include '../inc/footer.php'; ?><!-- fin container fluid dans footer -->
