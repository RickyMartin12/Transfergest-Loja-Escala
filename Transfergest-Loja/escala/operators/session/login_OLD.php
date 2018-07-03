<?php
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}
	$error=''; 

   if (isset($_POST['operador'])){
      $sql = "SELECT id FROM operador WHERE nome ='$operador'";
      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_assoc($result);
      $id = $row['id'];
    }



	if (isset($_POST['utilizador']) && isset($_POST['password']) && isset($id) ) {

		if (empty($_POST['utilizador']) || empty($_POST['password'])) {
			$error = "Utilizador ou Password incorretos.";
		}else{
			require ROOTDIR."/config/database.php";

			$utilizador = $_POST['utilizador'];
			$password   = $_POST['password'];
			$utilizador = stripslashes($utilizador);
			$password = stripslashes($password);
			$utilizador = mysqli_real_escape_string($conn, $utilizador);
			$password = mysqli_real_escape_string($conn, $password);
			$salt = '$G.Om3us3gr3do.SalT.StringG$';
			$password = crypt($password, $salt);

			//operador_utilizadores table
			$query = "SELECT * FROM operador_utilizadores WHERE operador_id=$id AND utilizador='{$utilizador}' AND password='{$password}'";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);
			if(isset($row['utilizador']) && !empty($row['utilizador'])){
				mysqli_close($conn);
				$_SESSION['login_user'] = $row['utilizador'];
				header("location: /operators/");
			}else{
				//operador table
				$query2 = "SELECT * FROM operador WHERE id=$id AND utilizador='{$utilizador}' AND password='{$password}'";
				$result2 = mysqli_query($conn,$query2);
				$row2 = mysqli_fetch_assoc($result2);
				mysqli_close($conn);
				if(isset($row2['utilizador']) && !empty($row2['utilizador'])){
					$_SESSION['login_user'] = $row2['utilizador'];
					header("location: /operators/");
				}else{
					$error = "Utilizador ou Password incorretos.";
				}
			}
		}
	}