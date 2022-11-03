<?php 

class Branch {
		private $con = "";
		function __construct()
		{
			$this->con= new mysqli("localhost","root","","pos_batch05");
		}

		function addBranch($allData){
			$bName = $allData["bName"];
			$mName = $allData["mName"];
			$email = $allData["email"];
			$phone = $allData["phone"];
			$password = $allData["password"];
			$rpassword = $allData["rpassword"];
			if($password !=$rpassword){
				return '<div class="alert alert-danger"><strong>Error: </strong>Password Not Match</div>';
			}
			else{
				$password =md5($password);
				$sql = $this->con->query("INSERT INTO tbl_branch(bName,mName,email,phone,password)VALUES('$bName','$mName','$email','$phone','$password')");
				if ($sql) {
					return '<div class="alert alert-success"><strong>Success: </strong>Registration Completed</div>';
				}
			}
		}

}

?>