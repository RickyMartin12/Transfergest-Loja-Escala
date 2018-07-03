<?php

date_default_timezone_set('Europe/Lisbon');
 
// DataTables PHP library
include( "php/DataTables.php" );
 
use
DataTables\Database,
DataTables\Database\Query,
DataTables\Database\Result;

$action = $_GET['action'];
switch ($action) {
        case '1':
        
        $nm = $_GET['nmop'];
        $id = $_GET['idop'];

        if (!$_GET['di'])
          $di = 0;
        else{
          $date_array = explode('/',trim($_GET['di']));
          $di = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00'); 
        }

        if (!$_GET['df'])
          $df = 0;
        else{
          $date_array = explode('/',trim($_GET['df']));
          $df = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00'); 
        }
        $sql = "SELECT id,nome FROM operador WHERE nome = '$nm' AND id = $id";
         $result = mysqli_query($conn,$sql );
          if (mysqli_num_rows($result) > 0)
            {  
            while($row = mysqli_fetch_assoc($result))
              {
                $nomeok = $row["nome"];
                $idok = $row["id"];
              }
            }
           else {
	  $arr=array("data"=>'0',"options"=>'',"files"=>'');  
          echo json_encode($arr);
        }
        if ($nomeok && $idok){
          $RAW_SQL_QUERY=" SELECT *, hrs AS tstp FROM excel WHERE operador ='$nm' AND data_servico BETWEEN  $di AND $df";
          $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
          $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES        
          echo json_encode($arr);
        }
        break;

        case '2':
        $nm = $_GET['nmop'];
        $id = $_GET['idop'];
        if (!$_GET['di'])
          $di = 0;
        else{
          $date_array = explode('/',trim($_GET['di']));
          $di = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00'); 
        }
        $sql = "SELECT id,nome FROM operador WHERE nome ='$nm' AND id = $id";
         $result = mysqli_query($conn,$sql );
          if (mysqli_num_rows($result) > 0)
            {  
            while($row = mysqli_fetch_assoc($result))
              {
                $nomeok = $row["nome"];
                $idok = $row["id"];
              }
            }
           else {
	  $arr=array("data"=>'0',"options"=>'',"files"=>'');  
          echo json_encode($arr);
        }
        if ($nomeok && $idok){

        $RAW_SQL_QUERY="SELECT *, hrs AS tstp FROM excel WHERE operador ='$nm' AND data_servico = $di";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        }
        break;
    }

exit();

