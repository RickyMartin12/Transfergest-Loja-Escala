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
        $staff = $_GET['st'];
        $s = 0;
        $RAW_SQL_QUERY="SELECT *, hrs AS tstp, (px+cr+bebe) AS totalpax, '$s' AS v FROM excel WHERE staff='$staff' ORDER BY hrs";
        $r = $db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr = array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '1':
        $s = '';

        if(strlen($_GET['di']) > 10) {
          $tt = explode(' ',trim($_GET['di']));
          $diis = $tt[0];
          }
          else $diis = $_GET['di'];

        $date_array=explode('/',$diis);
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $RAW_SQL_QUERY="SELECT *, hrs AS tstp, (px+cr+bebe) AS totalpax, '0' AS v FROM excel WHERE data_servico = $di ORDER BY hrs";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '2':
        $s = 0;
        $date_array=explode('/',trim($_GET['di']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $date_array=explode(' ',trim($_GET['df']));
        $date_array_df = explode('/', $date_array[0]);
        $df=strtotime($date_array_df[2].'-'.$date_array_df[1].'-'.$date_array_df[0].' '.$date_array[1]);
        $RAW_SQL_QUERY="SELECT *, hrs AS tstp, (px+cr+bebe) AS totalpax, '$s' AS v FROM excel WHERE data_servico >= $di AND hrs <= $df ORDER BY hrs";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '3':
        $staff = $_GET['st'];

        $s = 0;

         if(strlen($_GET['di']) > 10) {
          $tt = explode(' ',trim($_GET['di']));
          $diis = $tt[0];
          }
          else $diis = $_GET['di'];

        $date_array=explode('/',$diis);
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $RAW_SQL_QUERY="SELECT *, hrs AS tstp, (px+cr+bebe) AS totalpax, '$s' AS v FROM excel WHERE staff='$staff' AND data_servico = $di ORDER BY hrs";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '4':

        $staff = $_GET['st'];
        $s = 0;

        $date_array=explode('/',trim($_GET['di']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $date_array=explode(' ',trim($_GET['df']));
        $date_array_df = explode('/', $date_array[0]);
        $df=strtotime($date_array_df[2].'-'.$date_array_df[1].'-'.$date_array_df[0].' '.$date_array[1]);

        $RAW_SQL_QUERY="SELECT *, hrs AS tstp, (px+cr+bebe) AS totalpax,'$s' AS v FROM excel WHERE staff = '$staff' AND data_servico >= $di AND hrs <= $df ORDER BY hrs";
 
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;
}

exit();
