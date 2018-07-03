<?php
 
// DataTables PHP library

include( "../dataTables/php/DataTables.php" );
 
use
DataTables\Database,
DataTables\Database\Query,
DataTables\Database\Result;

$action = $_GET['action'];

switch ($action) {

        case '1':

        $staff = $_GET['staff'];

        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where staff='$staff' ORDER BY hrs";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();

        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        
        echo json_encode($arr);
        break;

        case '2':

        $operador = $_GET['operador'];
        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where operador='$operador' ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '3':

        $staff = $_GET['staff'];
        $operador = $_GET['operador'];

        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where staff='$staff' AND operador='$operador' ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '4':

        $data_servico = $_GET['data_servico'];
        $date_array=explode('/',trim($_GET['data_servico']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where data_servico = $di ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '5':

        $data_inicio = $_GET['data_inicio'];
        $date_array=explode('/',trim($_GET['data_inicio']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

        $data_fim = $_GET['data_fim'];
        $date_array=explode('/',trim($_GET['data_fim']));
        $df=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where (data_servico BETWEEN $di AND $df) ORDER BY hrs";


        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES


        echo json_encode($arr);
        break;

        case '6':

        $staff = $_GET['staff'];

        $data_inicio = $_GET['data_inicio'];
        $date_array=explode('/',trim($_GET['data_inicio']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

        $data_fim = $_GET['data_fim'];
        $date_array=explode('/',trim($_GET['data_fim']));
        $df=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where staff='$staff' AND (data_servico BETWEEN $di AND $df) ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '7':

        $staff = $_GET['staff'];

        $data_servico = $_GET['data_servico'];
        $date_array=explode('/',trim($_GET['data_servico']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        
        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where staff='$staff' AND data_servico='$di' ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '8':

        $staff = $_GET['staff'];
        $operador = $_GET['operador'];

        $data_servico = $_GET['data_servico'];
        $date_array=explode('/',trim($_GET['data_servico']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        
        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where staff='$staff' AND operador='$operador' AND data_servico=$di ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '9':

        $operador = $_GET['operador'];

        $data_inicio = $_GET['data_inicio'];
        $date_array=explode('/',trim($_GET['data_inicio']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

        $data_fim = $_GET['data_fim'];
        $date_array=explode('/',trim($_GET['data_fim']));
        $df=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        
        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where operador='$operador' AND (data_servico BETWEEN $di AND $df) ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '10':

        $operador = $_GET['operador'];
        $data_servico = $_GET['data_servico'];
        $date_array=explode('/',trim($_GET['data_servico']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        
        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where operador='$operador' AND data_servico=$di ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '11':

        $staff = $_GET['staff'];
        $operador = $_GET['operador'];
        $data_inicio = $_GET['data_inicio'];
        $date_array=explode('/',trim($_GET['data_inicio']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $data_fim = $_GET['data_fim'];
        $date_array=explode('/',trim($_GET['data_fim']));
        $df=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        
        $RAW_SQL_QUERY="select *, hrs AS tstp from excel where staff='$staff' AND operador='$operador' AND (data_servico BETWEEN $di AND $df) ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;    

case '12':

        $id=$_GET['id'];

        $RAW_SQL_QUERY="SELECT estado,cmx_st,cmx_op FROM excel WHERE id = $id";
        
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;    

}




exit();

