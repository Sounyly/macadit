<?php 
class Logiciel
{
	private $_id;
	private $_name;
	private $_category;
	private $_genre;
	private $_os;
	private $_lien_article;
	private $_img;
	private $_date_ajout;

	// Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
	  public function hydrate(array $donnees)
	  {
	 	if(isset($donnees['id']))
	 	{
	 		$this->setId($donnees['id']);
	 	}
	 	if(isset($donnees['name']))
	 	{
	 		$this->setName($donnees['name']);
	 	}
	 	if(isset($donnees['category']))
	 	{
	 		$this->setCategory($donnees['category']);
	 	}
	 	if(isset($donnees['genre']))
	 	{
	 		$this->setGenre($donnees['genre']);
	 	}
	 	if(isset($donnees['os']))
	 	{
	 		$this->setOs($donnees['os']);
	 	}
	 	if(isset($donnees['lien_article']))
	 	{
	 		$this->setLien_article($donnees['lien_article']);
	 	}
	 	if(isset($donnees['img']))
	 	{
	 		$this->setImg($donnees['img']);
	 	}
	 	if(isset($donnees['date_ajout']))
	 	{
	 		$this->setDateAjout($donnees['date_ajout']);
	 	}
	 	foreach($donnees as $key => $value)
	 	{
	 		// On récupère le nom du setter correspondant à l'attribut.
	 		$method = 'set' .ucfirst($key);
	 		 // Si le setter correspondant existe.
	 		if(method_exists($this, $method))
	 		{
	 			// On appelle le setter.
      			$this->$method($value);
	 		}
	 	}
	  }
// liste de getters 
	// méthode chargée de renvoyer la valeur d'un attribut
	
	public function id()
	{
		return $this->_id;
	}
	public function name()
	{
		return $this->_name;
	}
	public function category()
	{
		return $this->_category;
	}
	public function genre()
	{
		return $this->_genre;
	}
	public function os()
	{
		return $this->_os;
	}
	public function lien_article()
	{
		return $this->_lien_article;
	}
	public function img()
	{
		return $this->_img;
	}
	public function date_ajout()
	{
		return $this->_date_ajout;
	}

// Liste de setters
	// méthode chargée d'assigner une valeur à un attribut
	
	public function setId($id)
	{
		// On convertit l'argument en nombre entier.
	    // Si c'en était déjà un, rien ne changera.
	    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
	    $id = (int) $id;

	    // On vérifie ensuite si ce nombre est bien strictement positif.
	    if ($id > 0)
	    {
	      // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
	      $this->_id = $id;
	    }
	}

	public function setName($name)
	{	
		// On vérifie qu'il s'agit bien d'une chaîne de caractères.
		if(is_string($name))
		{
			$this->_name = $name;
		}
	}

	public function setCategory($category)
	{
		// on convertit l'argument en nbre entier
		$category = (int) $category;
		if($category > 0)
		{
			$this->_category = $category;
		}
	}

	public function setGenre($genre)
	{
		// on convertit l'argument en nbre entier
		$genre = (int) $genre;
		if($genre > 0)
		{
			$this->_genre = $genre;
		}
	}

	public function setOs($os)
	{
		$os = (int) $os;
		if($os > 0)
		{
			$this ->_os = $os;
		}
	}

	public function setLien_article($lien_article)
	{
		if(is_string($lien_article))
		{
			$this->_lien_article = $lien_article;
		}
	}

	public function setImg($img)
	{
		if(is_string($img))
		{
			$this->_img = $img;
		}
	}

	public function setDateAjout(DataTime $date_ajout)
	{
		$this->_date_ajout = $date_ajout;
	}

















}

 ?>