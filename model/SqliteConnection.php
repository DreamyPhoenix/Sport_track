<?php

	class SqliteConnection {

		private $connection;

		function __construct(){
			try{
				$this->connection = new PDO('sqlite:sport_track.db');
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				print "Error! : " . $e->getMessage(). "<br/>";
				die(); 

			}
		}

		public function getConnection(){
			return $this->connection;
		}
	}