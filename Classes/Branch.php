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


          function login($allData){
			$userName = $allData["userName"];
			$password = $allData["password"];
			if($userName ==""){
				return '<div class="alert alert-danger"><strong>Error: </strong>User Name is Empty</div>';
			}

			elseif($password ==""){

				return '<div class="alert alert-danger"><strong>Error: </strong>Password is Empty</div>';

			}
			else{
				//$password = md5($password);
				$sql = $this->con->query("SELECT * FROM tbl_branch WHERE (mName='$userName' OR email = '$userName' OR phone = '$userName') AND password = '$password' AND status = '1' ");
				if ($sql->num_rows > 0) {
					$sql = $sql->fetch_assoc();
					session_start();
					$_SESSION['id'] = $sql["id"];
					$_SESSION['bName'] = $sql["bName"];
					$_SESSION['mName'] = $sql["mName"];
					header("location: dashboard.php");
				}
				else{
					return '<div class="alert alert-danger"><strong>Error: </strong>User Name or Password not Found</div>';
				}
			}
		 }
      }
