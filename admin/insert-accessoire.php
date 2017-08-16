<?php 
require '../class/database.php';
require '../func/checkInput.php';
$nameError = $categoryError =  $osError = $marqueError = $connexionError = $articleError = $imgError = $shopError = $tarifError = $name = $category =  $os = $marque = $connexion = $article = $img = $shop = $tarif = "";
if(!empty($_POST))
{
	$name = checkInput($_POST['name']);
	$category = checkInput($_POST['category']);
	$os = checkInput($_POST['os']);
	$marque = checkInput($_POST['marque']);
	$connexion = checkInput($_POST['connexion']);
    $article = checkInput($_POST['article']);
	
	/*img de l'accessoire*/
	$img = checkInput($_FILES['img']['name']);
	$imgPath        = '../img/accessoires/'. basename($img);
	$imgExtension   = pathinfo($imgPath,PATHINFO_EXTENSION);
	/*lien vers le site du constructeur*/
	$shop = checkInput($_POST['shop']);
    $tarif = checkInput($_POST['tarif']);

	$isSuccess        = true;
	$isUploadSuccess  = false;
/*--------NAME--------*/
	if(empty($name))
	{
		$nameError = 'Ce champ ne peut pas être vide';
		$isSuccess = false;
	}
/*--------CATEGORY--------*/
	if(empty($category))
	{
		$categoryError = 'Ce champ ne peut pas être vide';
		$isSuccess = false;
	}
/*--------OS--------*/
	if(empty($os))
	{
		$osError = 'Ce champ ne peut pas être vide';
		$isSuccess = false;
	}
/*--------MARQUE--------*/
	if(empty($marque))
	{
		$marqueError = 'Ce champ ne peut pas être vide';
		$isSuccess = false;
	}
/*--------CONNEXION--------*/ 
	if(empty($connexion))
	{
		$connexionError = 'Ce champ ne peut pas être vide';
		$isSuccess = false;
	}
/*--------CONTENU--------*/
	if(empty($article))
	{
		$articleError = 'Ce champ ne peut pas être vide';
		$isSuccess = false;
	}
	
/*-----IMAGE--------*/
	if(empty($img))
	{
		$imgError = 'Ce champ ne peut pas être vide';
		$isSuccess = false;
	}
	else
	{
		$isUploadSuccess = true;
		if($imgExtension != "jpg" && $imgExtension != "png" && $imgExtension != "jpeg" && $imgExtension != "gif" ) 
		{
			$imgError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
			$isUploadSuccess = false;
		}
		if(file_exists($imgPath)) 
		{
			$imgError = "Le fichier existe deja";
			$isUploadSuccess = false;
		}
		if($_FILES["img"]["size"] > 500000) 
		{
			$imgError = "Le fichier ne doit pas depasser les 500KB";
			$isUploadSuccess = false;
		}
		if($isUploadSuccess) 
		{
			if(!move_uploaded_file($_FILES["img"]["tmp_name"], $imgPath)) 
			{
				$imgError = "Il y a eu une erreur lors de l'upload";
				$isUploadSuccess = false;
			} 
		} 
	}
/**/
/*---------shop--------*/
	if(empty($shop))
	{
		$shopError = 'Ce champ ne peut pas être vide';
		$isSuccess = false;
	}
    if(empty($tarif))
    {
        $tarifError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
	if($isSuccess && $isUploadSuccess) 
	{
		$db = Database::connect();
		$statement = $db->prepare('INSERT INTO accessoires (name, category, os, marque, connexion, article, img, shop, tarif, date_ajout) values (?,?,?,?,?,?,?,?,?, NOW())');
		$statement->execute(array($name, $category, $os, $marque, $connexion, $article, $img, $shop, $tarif));
		Database::disconnect();
		header('Location: ../pages/accessoire.php');
	}
}

include("../inc/header.php") ;
?>

 <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <?php include("../inc/navbar.php"); ?>

        <div class="container m50">
            <div class="row">
                <div class=" col-md-12 col-lg-12 div-dessin-papillon">

                  
                    <h3 class="text-aside-circle">Ajouter un accessoire</h3>
                    
                </div><!-- fin col -->
            </div><!-- fin row -->
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8">
                    <div id="page-wrapper">
                     <div class="admin jumbotron">
                        <div class="row">
                            <form class="form" action="insert-accessoire.php" role="form" method="post" enctype="multipart/form-data">
            <!-- formulaire Nom -->
                                <div class="form-group">
                                    <label for="name">Désignation:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom de l'accessoire" value="<?php echo $name;?>">
                                    <span class="help-inline"><?php echo $nameError;?></span>
                                </div>
            <!-- formulaire prix -->
                                <div class="form-group">
                                    <label for="tarif">Prix:</label>
                                    <input type="number" min="1" max="10000" class="form-control" id="tarif" name="tarif" placeholder="20" value="<?php echo $tarif;?>">
                                    <span class="help-inline"><?php echo $tarifError;?></span>
                                </div>
            <!-- formulaire categorie-->
                                <div class="form-group">
                                    <label for="category">Catégorie:</label>
                                    <select class="form-control" id="category" name="category">
                                        <?php
                                        $db = Database::connect();
                                        foreach ($db->query('SELECT * FROM category') as $row) 
                                        {
                                            echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>'; 
                                        }
                                        Database::disconnect();
                                        ?>
                                    </select>
                                    <span class="help-inline"><?php echo $categoryError;?></span>
                                </div>

            <!-- formulaire os-->
                                <div class="form-group">
                                    <label for="os">Compatibilité de l'OS:</label>
                                    <select class="form-control" id="os" name="os">
                                        <?php
                                        $db = Database::connect();
                                        foreach ($db->query('SELECT * FROM os') as $row) 
                                        {
                                            echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>'; 
                                        }
                                        Database::disconnect();
                                        ?>
                                    </select>
                                    <span class="help-inline"><?php echo $osError;?></span>
                                </div>
            <!-- formulaire marque-->
                                <div class="form-group">
                                    <label for="marque">Marque:</label>
                                    <select class="form-control" id="marque" name="marque">
                                        <?php
                                        $db = Database::connect();
                                        foreach ($db->query('SELECT * FROM marques') as $row) 
                                        {
                                            echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>'; 
                                        }
                                        Database::disconnect();
                                        ?>
                                    </select>
                                    <span class="help-inline"><?php echo $marqueError;?></span>
                                </div>
            <!-- formulaire connexion-->
                                <div class="form-group">
                                    <label for="connexion">Connexion:</label>
                                    <select class="form-control" id="connexion" name="connexion">
                                        <?php
                                        $db = Database::connect();
                                        foreach ($db->query('SELECT * FROM connection_type') as $row) 
                                        {
                                            echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>'; 
                                        }
                                        Database::disconnect();
                                        ?>
                                    </select>
                                    <span class="help-inline"><?php echo $connexionError;?></span>
                                </div>
			<!-- formulaire lien vers le site constructeur ou revendeur -->
                                <div class="form-group">
                                    <label for="shop">Lien constructeur ou revendeur</label>
                                    <input type="text" class="form-control" id="shop" name="shop" placeholder="Lien vers le site constructeur ou revendeur" value="<?php echo $shop;?>">
                                    <span class="help-inline"><?php echo $shopError;?></span>
                                </div>
            <!-- formulaire Article ulysses-->               
                               <div class="form-group">
                                    <label for="article">Rédigez votre article:</label>
                                  <textarea type="text" cols="80" rows="10" name="article" placeholder="Rédigez votre article dans cet espace" value="<?php echo $article;?>"></textarea>
                                    <!--<input type="text" id="article" name="article" placeholder="Rédigez votre article dans cet espace" value="<?php echo $article;?>">-->
                                    <span class="help-inline"><?php echo $articleError;?></span>
                                </div>
                                
            <!-- formulaire image-->               
                                <div class="form-group">
                                    <label for="img">Sélectionner une image:</label>
                                    <input type="file" id="img" name="img"> 
                                    <span class="help-inline"><?php echo $imageError;?></span>
                                </div>
								
                                <br>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                                    <a class="btn btn-primary" href="../pages/accessoire.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                                </div>
                            </form>
                            <div class="col-lg-offset-2">
                                
                            </div>
                        </div><!-- fin row -->
                    </div> <!-- fin jumbotron -->
                
                </div><!-- #page-wrapper -->
            </div><!-- fin col-lg-offset -->
        </div> <!-- fin row -->
    </div><!-- fin container m50 -->
</div><!-- fin #wrapper -->








