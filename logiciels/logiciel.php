<?php 
	include '../class/database.php';
	include '../class/logiciel.php';
	include '../inc/header.php';
 ?>

 <body>
<div class="container-fluid">
	<?php include '../inc/navbar.php'; ?>

	<div class="row header-index">
		<div class="container">
				<div class="col-lg-12">
				<h1 class="texte-header">Mac a dit!</h1>
				</div>
		</div>
	</div><!-- fin row -->

	
	<div class="container" id ="page">
		
	
	<h2 class="">Les logiciels mac0S.</h2><br>
	<!--______________________________________________
	CONTAINER principal
	Accueil avec listes des derniers articles parus
	______________________________________________-->
		<div class="row content">
			<div class="col-lg-9"><!-- les derniers articles -->
			
				<?php 

				$db = Database::connect(); 
				$statement = $db->query('
					SELECT id, name, category, genre, os, lien_article, img, date_ajout 
					FROM logiciel');

				// Chaque entrée sera récupérée et placée dans un array.
				while($donnees = $statement->fetch(PDO::FETCH_ASSOC))
				{
					$logiciel = new Logiciel($donnees);

					echo '<div class="row articles-logiciel">
							<div class="col-lg-3"><img src="/macadit/img/',$logiciel->img(),'" class="icon-logiciel" alt=""></div>
							<div class="col-lg-9">
							<h3>',$logiciel->name(),'</h3>
							<span class="date-poste">',$logiciel->date_ajout(),'</span><br>
							<span class="nbr-comment">0 Commentaires</span><br><br>
							<p>',$logiciel->lien_article(),'</p><br>
							';
				}


				Database::disconnect();
				 ?>
			

				<!--<div class="row articles-logiciel">
					<div class="col-lg-3"><img src="../img/logiciel/wunderlist.png" class="icon-logiciel" alt=""></div>
					<div class="col-lg-9">
						<h3>Wunderlist</h3>
						<span class="date-poste">Posté le 26 juil 2017</span><br>
						<span class="nbr-comment">0 Commentaires</span>
						<br><br>
							<p>Gestionnaire de tâches très complet multi plates-formes, Wunderlist pour permetant de mener à bien vos projets, en collaborant avec vos collaborateurs.</p><br>-->
						<div class="row">
							<div class="col-lg-12 span-detail">
								<a href="#"><span class="">Détails </span><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
							</div>
						</div><!-- fin row -->
					</div><!-- fin col-lg-9 -->
				</div><!-- fin articles-logiciel -->
				<hr>
				
			</div><!-- fin col-lg-9 -->
<!--___________________________________________
	SIDEBAR des category
	__________________________________________-->
			<div class="col-lg-3"><!-- tag des category -->
				<aside class="aside-principal">
					<h2>Tags des genres</h2>
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-2"><div class="tag"></div></div>
								<div class="col-lg-10">Objets connectés</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-2"><div class="tag"></div></div>
								<div class="col-lg-10">Supports</div>
							</div>
						</div>
					</div>
				</aside>
			</div><!-- fin col-lg tag -->
		</div><!-- fin row content -->








	</div><!-- fin #page-->
	</div>

	<?php include '../inc/footer.php'; ?><!-- fin container fluid dans footer -->