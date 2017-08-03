<?php
require '../class/database.php';
include("../inc/header.php") ;
?>
<div class="container">
	

	<?php 

		$db = Database::connect();
		$statement = $db->query('SELECT * FROM accessoires');
		
		Database::disconnect();

		$donnees = $statement->fetchAll();

		foreach($donnees as $accessoire)
		{
			$path_accessoire = pathinfo('/macadit/ulysses/accessoires/'.$accessoire['contenu']);

			echo'
				<h1>'.$accessoire['name'].'</h1><br>
				<img src="../img/accessoires/'.$accessoire['img'] .'" alt="image accessoires" width="150px" >';
				echo'<article>';
				echo $path_accessoire ['dirname'], "<br>";
				echo $path_accessoire ['basename'], "<br>";
				echo $path_accessoire ['extension'], "<br>";
				echo $path_accessoire ['filename'], "<br>";

				echo'</article>
				<a href="'.$path_accessoire ['dirname'].'/'.$path_accessoire['basename'].'">article</a><br>
				<a href="'.$accessoire['shop'].'">Lien vers le site du constructeur</a>

				
			';
			
			/*$homepage = file_get_contents('$path_accessoire ['dirname']/$path_accessoire['basename']');
			echo $homepage;*/

			$handle = fopen("/macadit/ulysses/accessoires/ '.$accessoire['contenu'].' ", "r") or die("Unable to open file!");
			
		}

	 ?>
</div>