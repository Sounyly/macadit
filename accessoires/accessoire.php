<?php
require '../class/database.php';
include("../inc/header.php") ;
?>
<div class="container">
<div>
	<?php 
	$db = Database::connect();
	$statement = $db->query('
		SELECT 
		/*requête accessoire*/
		a.id AS id_accessoire, a.name AS nom_accessoire, a.category AS category_accessoire, a.os AS os_accessoire, a.marque AS marque_accessoire, a.connexion AS connexion_accessoire, a.article AS article_accessoire, a.img AS img_accessoire, a.shop AS lien_constructeur_accessoire, a.tarif AS tarif_accessoire, a.date_ajout AS dateAjout_accessoire,
		/*requête category*/
		c.id AS id_category, c.name AS nom_category,
		/*requête connection_type*/
		ct.id AS id_connection, ct.name AS nom_connection,
		/*requête marques*/
		m.id AS id_marque, m.name AS nom_marque,
		/*requête os*/
		o.id AS id_os, o.name AS nom_os
		FROM accessoires AS a
		INNER JOIN category AS c ON a.category = c.id
		INNER JOIN connection_type AS ct ON a.connexion = ct.id
		INNER JOIN marques AS m ON a.marque = m.id
		INNER JOIN os AS o ON a.os = o.id
		
		');
	
	$donnees = $statement->fetchAll();
	Database::disconnect();
	foreach($donnees as $article)
	{
		/*$path_accessoire = pathinfo('/macadit/ulysses/accessoires/'.$donnees['contenu']);
		<a href="'.$path_accessoire ['dirname'].'/'.$path_accessoire['basename'].'">article</a><br>*/
		echo'
		<h1>'.$article['nom_accessoire'].'</h1><br>
		<img src="../img/accessoires/'.$article['img_accessoire'] .'" alt="image accessoires" width="150px" ><br>
		
		<a href="'.$article['shop'].'">Lien vers le site du constructeur</a><br>
		<div>'.nl2br($article['article_accessoire']).'</div>
		';
	}
	?>
	 <!--echo $path_accessoire ['dirname'], "<br>";
				echo $path_accessoire ['basename'], "<br>";
				echo $path_accessoire ['extension'], "<br>";
				echo $path_accessoire ['filename'], "<br>";-->

</div>
<br><br><br><br>

</div>