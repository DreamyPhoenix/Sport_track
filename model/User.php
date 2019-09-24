<?php

	class User{

		private $mail;
		private $nom;
		private $prenom;
		private $dateDeNaissance;
		private $sexe;
		private $poids;
		private $taille;
		private $motDePasse;

		function __construct(){}

		public function init($m, $n, $p, $d, $s, $po, $t, $mo){
			$this->mail = $m;
			$this->nom = $n;
			$this->prenom = $p;
			$this->dateDeNaissance = $d;
			$this->sexe = $s;
			$this->poids = $po;
			$this->taille = $t;
			$this->motDePasse = $mo;

		}

		public function getMail(){
			return $this->mail;
		}

		public function getNom(){
			return $this->nom;
		}

		public function getPrenom(){
			return $this->prenom;
		}

		public function getDate(){
			return $this->dateDeNaissance;
		}

		public function getSexe(){
			return $this->sexe;
		}

		public function getPoids(){
			return $this->poids;
		}

		public function getTaille(){
			return $this->taille;
		}

		public function getMotDePasse(){
			return $this->motDePasse;
		}

		public function __toString(){
			return $this->nom. " ". $this->prenom;
		}
	}