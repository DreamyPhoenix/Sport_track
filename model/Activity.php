<?php

	public class Activity {

		private $id;
		private $date;
		private $description;
		private $duree;
		private $emailU;

		function __construct(){

		}

		public function init($i, $da, $de, $du, $e){

			$this->id = $i;
			$this->date = $da;
			$this->description = $de;
			$this->duree = $du;
			$this->emailU = $e;
		}

		public function getId(){

			return $this->id;
		}

		public function getDate(){

			return $this->date;
		}

		public function getDes(){

			return $this->description;
		}

		public function getDuree(){

			return $this->duree;
		}

		public function getEmailU(){

			return $this->emailU;
		}
	}