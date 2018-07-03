<?php
 
// DataTables PHP library
include( "../dataTables/php/DataTables.php" );
 
use
DataTables\Database,
DataTables\Database\Query,
DataTables\Database\Result;

$action = $_GET['action'];

switch ($action) {
        case '0':
        $op = $_GET['st'];
        $RAW_SQL_QUERY="SELECT *, hrs AS tstp, (px+cr+bebe) AS totalpax FROM excel WHERE operador='$op' AND (cobrar_operador > 0  OR cobrar_operador != null )  ORDER BY hrs";
        $r = $db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr = array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '1':
        if(strlen($_GET['di']) > 10) {
          $tt = explode(' ',trim($_GET['di']));
          $diis = $tt[0];
          }
          else $diis = $_GET['di'];

        $date_array=explode('/',$diis);
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $RAW_SQL_QUERY="SELECT *, hrs AS tstp, (px+cr+bebe) AS totalpax FROM excel WHERE data_servico = $di AND (cobrar_operador > 0  OR cobrar_operador != null )   ORDER BY hrs";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '2':
        $date_array=explode('/',trim($_GET['di']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $date_array=explode(' ',trim($_GET['df']));
        $date_array_df = explode('/', $date_array[0]);
        $df=strtotime($date_array_df[2].'-'.$date_array_df[1].'-'.$date_array_df[0].' '.$date_array[1]);
        $RAW_SQL_QUERY="SELECT *, hrs AS tstp, (px+cr+bebe) AS totalpax FROM excel WHERE data_servico >= $di AND hrs <= $df AND (cobrar_operador > 0  OR cobrar_operador != null )   ORDER BY hrs";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '3':
        $op = $_GET['st'];

         if(strlen($_GET['di']) > 10) {
          $tt = explode(' ',trim($_GET['di']));
          $diis = $tt[0];
          }
          else $diis = $_GET['di'];

        $date_array=explode('/',$diis);
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $RAW_SQL_QUERY="SELECT *, hrs AS tstp, (px+cr+bebe) AS totalpax FROM excel WHERE operador='$op' AND data_servico = $di AND (cobrar_operador > 0  OR cobrar_operador != null )  ORDER BY hrs";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '4':

        $op = $_GET['st'];

        $date_array=explode('/',trim($_GET['di']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $date_array=explode(' ',trim($_GET['df']));
        $date_array_df = explode('/', $date_array[0]);
        $df=strtotime($date_array_df[2].'-'.$date_array_df[1].'-'.$date_array_df[0].' '.$date_array[1]);

        $RAW_SQL_QUERY="SELECT *, hrs AS tstp, (px+cr+bebe) AS totalpax FROM excel WHERE operador='$op' AND data_servico >= $di AND hrs <= $df AND (cobrar_operador > 0  OR cobrar_operador != null ) ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;
}

exit();

