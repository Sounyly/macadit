	<?php
	require '../class/database.php';
	require '../func/checkInput.php';
	include("../inc/header.php") ;
	?>
	<div class="container-fluid admin">
		<div class="row">
		<div class="col-lg-offset-1 col-lg-10">
			<h1><strong>Liste des items   </strong><a href="insert-accessoire.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Categorie</th>
						<th>os</th>
						<th>marque</th>
						<th>connexion</th>
						<th>article</th>
						<th>Prix</th>
						<th>lien</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
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
					while($donnees = $statement->fetch())
					{
						$nb = 45;
						$strLienAccessoire = $donnees['lien_constructeur_accessoire'];
						$strArticle = $donnees['article_accessoire'];
						echo strlen($strLienAccessoire);
						echo '<tr >';
						echo '<td>'. $donnees['nom_accessoire'] . '</td>';
						echo '<td>'. $donnees['nom_category'] . '</td>';
						echo '<td>'. $donnees['nom_os'] . '</td>';
						echo '<td>'. $donnees['nom_marque'] . '</td>';
						echo '<td>'. $donnees['nom_connection'] . '</td>';
            //on coupe les articleslorsqu'ils sont trop longs              			
						echo '<td  width=330>';
						if (strlen($strArticle) > $nb) 
						{
							$strArticle = substr($strArticle, 0, $nb);
							$position_espace = strrpos($strArticle, " "); //on récupère l'emplacement du dernier espace dans la chaine, pour ne pas découper un mot.
					        $texte = substr($strArticle, 0, $position_espace);  //on redécoupe à la fin du dernier mot
					        $strArticle = $strArticle."..."; //puis on rajoute des ...
					    }
					    echo $strArticle; //on retourne la variable modifiée
					    echo '</td>';
                        echo '<td>'. number_format($donnees['tarif_accessoire'], 2, '.', '') . ' €</td>';// 2 = nbre de chiffre aprés la virgule, . =  caractere utilisé pour séparer les entiers des décimales,
            //on coupe les liens lorsqu'ils sont trop longs
                        echo '<td  width=330>';
                        if (strlen($strLienAccessoire) > $nb) 
                        {
                        	$strLienAccessoire = substr($strLienAccessoire, 0, $nb);
						        $position_espace = strrpos($strLienAccessoire, " "); //on récupère l'emplacement du dernier espace dans la chaine, pour ne pas découper un mot.
						        $texte = substr($strLienAccessoire, 0, $position_espace);  //on redécoupe à la fin du dernier mot
						        $strLienAccessoire = $strLienAccessoire."..."; //puis on rajoute des ...
						    }
						    echo $strLienAccessoire; //on retourne la variable modifiée
						    echo '</td>';
						    echo '<td width=300>';
						    echo '<a class="btn btn-default" href="view.php?id='.$donnees['id_accessoire'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
						    echo ' ';
						    echo '<a class="btn btn-primary" href="update.php?id='.$donnees['id_accessoire'].'"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
						    echo ' ';
						    echo '<a class="btn btn-danger" href="delete.php?id='.$donnees['id_accessoire'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
						    echo '</td>';
						    echo '</tr>';
						}
						Database::disconnect();
		?>
						</tbody>
					</table>
					</div>
					<div class="col-lg-offset-1"></div>
				</div>
			</div>