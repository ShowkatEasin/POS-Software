<?php 

	class Connection{
		private $con="";

		function connect(){
			$con = $this->con= new mysqli("localhost","root","","pos_batch05");
			return $con;
		}
	}