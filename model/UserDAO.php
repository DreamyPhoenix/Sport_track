<?php

	require_once("SqliteConnection.php");

	class UserDAO {

		private static $dao;

		private function __construct(){}

		public final static function getInstance(){
			if(!isset(self::$dao)){
				self::$dao = new UserDAO();
			}

			return self::$dao;
		}

		public final function findAll(){
			$dbcTest = new SqliteConnection();
			$dbc = $dbcTest->getConnection();
			$query = "select * from User order by nom, prenom";
			$stmt = $dbc -> query($query);
			$results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
			return $results;
		}

		public final function insert($st){
			if($st instanceof User){
				$dbcTest = new SqliteConnection();
				$dbc = $dbcTest->getConnection();
				$query = "insert into User(mail, nom, prenom, dateDeNaissance, sexe, poids, taille, motDePasse) values (:m, :n, :p, :d, :s, :po, :t, :mo)";
				$stmt = $dbc->prepare($query);

				$stmt->bindValue(':m',$st->getMail(), PDO::PARAM_STR);
				$stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
				$stmt->bindValue(':p',$st->getPrenom(), PDO::PARAM_STR);
				$stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
				$stmt->bindValue(':s',$st->getSexe(), PDO::PARAM_STR);
				$stmt->bindValue(':po',$st->getPoids(), PDO::PARAM_STR);
				$stmt->bindValue(':t',$st->getTaille(), PDO::PARAM_STR);
				$stmt->bindValue(':mo',$st->getMotDePasse(), PDO::PARAM_STR);

				$stmt->execute();

			}
		}

		public function delete($obj){

			if($obj instanceof User){
				$dbcTest = new SqliteConnection();
				$dbc = $dbcTest->getConnection();
				$query = "delete from User where id = ':m'";
				$stmt = $dbc->prepare($query);

				$stmt ->bindValue(':m',$st->getMail(), PDO::PARAM_STR);

				$stmt->execute();

			}

		}

		public function update($obj){

			if($obj instanceof User){
				$dbcTest = new SqliteConnection();
				$dbc = $dbcTest->getConnection();
				$query = "update User set mail = ':m'
										  nom = ':n'
										  prenom = ':p'
										  dateDeNaissance = ':d'
										  sexe = ':s'
										  poids = ':po'
										  taille = ':t'
										  motDePasse = ':mo'";
				$stmt = $dbc->prepare($query);

				$stmt ->bindValue(':m',$st->getMail(), PDO::PARAM_STR);
				$stmt ->bindValue(':p',$st->getPrenom(), PDO::PARAM_STR);
				$stmt ->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
				$stmt ->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
				$stmt ->bindValue(':s',$st->getSexe(), PDO::PARAM_STR);
				$stmt ->bindValue(':po',$st->getPoids(), PDO::PARAM_STR);
				$stmt ->bindValue(':t',$st->getTaille(), PDO::PARAM_STR);
				$stmt ->bindValue(':mo',$st->getMotDePasse(), PDO::PARAM_STR);

				$stmt->execute();
			}

		}
	}