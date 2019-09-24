<?php

	require_once("UserDAO.php");
	require_once("User.php");

	class sqlite_connection_test {

		private $user;

		function __construct(){}

		public function test(){
			//$this->user = new User();
			//$this->user->init('yoann@yaiche.fr','yaiche','yoann','06/02/2000','Masculin',60,180,'password');
			$userDao = UserDAO::getInstance();
			//$userDao->insert($this->user);
			$array = $userDao->findAll();
			foreach ($array as $answer){
				echo $answer->__toString();
			}
		}
	}

	$test = new sqlite_connection_test();
	$test->test();