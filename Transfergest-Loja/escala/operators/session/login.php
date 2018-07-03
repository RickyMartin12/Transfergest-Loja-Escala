<?php
   	session_start();
        require_once 'nocsrf.php';

          $err='';

          if (!$_POST['operador'])
            $err .= '- Operador * <br>';
          else 
            $operador = $_POST['operador'];

          if (!$_POST['utilizador'])
            $err .= '- Utilizador * <br>';
          else 
            $utilizador = $_POST['utilizador']; 

          if (!$_POST['password'])
            $err .= '- Password * <br>';
          else 
            $password=$_POST['password']; 

       if ($_POST['csrf_token']){
         try
           {
        // Run CSRF check, on POST data, in exception mode, for 1 minutes, in one-time mode.
        NoCSRF::check('csrf_token', $_POST, false, 60, false );

     if(!$err){
          require_once '../../connect.php';
          if ($operador){
            $sql="SELECT id, gestao,nome FROM operador WHERE nome='$operador'LIMIT 1";
            $r = mysqli_query($conn,$sql);
            if (mysqli_num_rows($r) > 0)
            $row = mysqli_fetch_assoc($r);
            $id= $row["id"];
            $_SESSION['login_operator'] = $row['nome'];
            $access = $row["gestao"];
         }
  
/*NOME OPERADOR VALIDO ID OK E ACESSO*/
  
          if ($id && $access != 'false'){

                        //$_SESSION['login_operator'] = $operador;

                        $utilizador = $_POST['utilizador'];
			$password   = $_POST['password'];
			$utilizador = stripslashes($utilizador);
			$password = stripslashes($password);
			$utilizador = mysqli_real_escape_string($conn, $utilizador);
			$password = mysqli_real_escape_string($conn, $password);
			$salt = '$G.Om3us3gr3do.SalT.StringG$';
			$password = crypt($password, $salt);

/*TABELA OPERADORES UTILIZADORES VERIFICAR DADOS*/

			$query = "SELECT * FROM operador_utilizadores WHERE operador_id=$id AND utilizador='$utilizador' AND password='$password' LIMIT 1";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);
			if(isset($row['utilizador']) && !empty($row['utilizador'])){
				mysqli_close($conn);
				$_SESSION['login_user'] = $row['utilizador'];
                                //$_SESSION['login_operator'] = $row['nome'];
                                $_SESSION['login_id_operator'] = $id;
                                $success='operators';
                        }


/*TABELA OPERADORES ADMINISTRADORES VERIFICAR DADOS*/
                       else {
                        $query = "SELECT * FROM operador WHERE id=$id AND utilizador='$utilizador' AND password='$password' LIMIT 1";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);
			if(isset($row['utilizador']) && !empty($row['utilizador'])){
				mysqli_close($conn);
				$_SESSION['login_user'] = $row['utilizador'];
                               // $_SESSION['login_operator'] = $row['nome'];
                                $_SESSION['login_id_operator'] = $id;
                                $success='operators';
                        }

/*AMBAS TABELAS DADOS KO*/

                       else $err ='Utilizador ou Password incorretos'; 

            }
                           
    }

    /*NOME OPERADOR ACESSOS NEGADOS*/

        else if ($id && $access == 'false'){
          $err .= '- Acesso negado, contate o administrador para obter acesso.<br>';
        }



/*NOME OPERADOR INVALIDO ID KO*/

         else{
           $err .= '- Operador Inválido <br>';
           }

}

          $arr = array('error'=>$err, 'id'=>$id, 'success'=>$success);


    }
    catch ( Exception $e )
    {
        // CSRF attack detected
         $arr = array('error'=>'Por favor atualize a página, e tente de novo!', 'id'=>'', 'success'=>'');
    }
}



          echo json_encode($arr);
?>
