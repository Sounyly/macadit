<?php 
	


	require 'database.php';
	require '../func/checkInput.php';

	$nameError = $categoryError = $contenuError = $osError = $linkError = $imgError = $name = $category = $contenu = $os = $link = $img = "";

	if(!empty($_POST))
	{
		$name = checkInput($_POST['name']);
		$category = checkInput($_POST['category']);
		$contenu = checkInput($_POST['contenu']);
		$os = checkInput($_POST['os']);
		$link = checkInput($_POST['link_download']);
		$img = checkInput($_FILES['img']['name']);
		$imgPath        = '../images/'. basename($img);
	    $imgExtension   = pathinfo($imgPath,PATHINFO_EXTENSION);
	    $isSuccess        = true;
	    $isUploadSuccess  = false;
	    if(empty($name))
	    {
	    	$nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
	    }
	    if(empty($category))
	    {
	    	$categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
	    }
	    if(empty($contenu))
	    {
	    	$contenuError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
	    }
	    if(empty($os))
	    {
	    	$osError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
	    }
	    if(empty($link))
	    {
	    	$linkError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
	    }
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
            if(file_exists($imPath)) 
            {
                $imgError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $imgError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imgPath)) 
                {
                    $imgError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
	    }
	     if($isSuccess && $isUploadSuccess) 
	     {
	     	$db = Database::connect();
	     	$statement = $db->prepare('INSERT INTO articles (name, category, contenu, os, link_download)')
	     }

	}




?>
