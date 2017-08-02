<?php 
	class LogicielManager
	{
		

		
		public function add(Logiciel $logiciel)
		{
			$req = $this->_db->prepare('
				INSERT INTO logiciel(name, category, genre, os, lien_article, img, date_ajout)
				VALUES(:name, :categpry, :genre, :os, :lien_article, :img, NOW()');
			//bindValue — Associe une valeur à un paramètre
			$req->bindValue(':name', $logiciel->name());
			$req->bindValue(':category', $logiciel->category(), PDO::PARAM_INT);
			$req->bindValue(':genre', $logiciel->genre(), PDO::PARAM_INT);
			$req->bindValue(':os', $logiciel->os(), PDO::PARAM_INT);
			$req->bindValue(':lien_article', $logiciel->lien_article());
			$req->bindValue(':img', $logiciel->img());

			$req->execute();
		}

		public function delete(Logiciel $logiciel)
		{
			$this->_db->execute('DELETE FROM logiciel WHERE id ='.$logiciel->id());
		}

		public function get($id)
		{
			$id = (int) $id;

			$req = $this->_db->query('
				SELECT id, name, category, genre, os, lien_article, img, date_ajout
				FROM logicielWHERE id = '.$id);
			$donnees = $req->fetch(PDO::FETCH_ASSOC);

			return new Logiciel($donnees);
		}

		public function getList()
		{
			$logiciels = [];

			$req = $this->_db->query('
				SELECT id, name, category, genre, os, lien_article, img, date_ajout
				FROM logiciel
				ORDER BY name');
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				$logiciels [] = new Logiciel($donnees);
			}
			return $logiciels;
		}
		public function update(Logiciel $logiciel)
		{
			$req = $this->_db->prepare('
				UPDATE logiciel 
				SET name = :name
					category = :category
					genre = :genre
					os = :os
					lien_article = :lien_article
					img = :img
					date_ajout = NOW()
				WHERE id = :id');

			$req->bindValue(':name', $logiciel->name());
			$req->bindValue(':category', $logiciel->category(), PDO::PARAM_INT);
			$req->bindValue(':genre', $logiciel->genre(), PDO::PARAM_INT);
			$req->bindValue(':os', $logiciel->os(), PDO::PARAM_INT);
			$req->bindValue(':lien_article', $logiciel->lien_article());
			$req->bindValue(':img', $logiciel->img());

			$req->execute();
		}

		public function setDb(PDO $db)
		{
			$this->_db = $db;
			// $db = Database::connect();
			// Database::disconnect();
		}
}

 ?>