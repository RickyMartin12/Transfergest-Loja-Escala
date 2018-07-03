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
        $RAW_SQL_QUERY="SELECT *, data AS sort, CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE staff='$staff' ORDER BY data";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSE
        echo json_encode($arr);
        break;

        case '2':
        if (isset($_GET['matricula']))
        $m = str_replace("-", "",trim($_GET['matricula']));
        else $m ='';
        $RAW_SQL_QUERY="SELECT *, data AS sort,CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE matricula='$m' ORDER BY data";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '3':

        $staff = $_GET['staff'];
         if (isset($_GET['matricula']))
        $m = str_replace("-", "",trim($_GET['matricula']));
        else $m ='';

        $RAW_SQL_QUERY="SELECT *, data AS sort,CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE matricula='$m' AND staff = '$staff' ORDER BY data";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '4':
        $data_servico = $_GET['data_servico'];
        $date_array=explode('/',trim($_GET['data_servico']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $RAW_SQL_QUERY="SELECT *, data AS sort,CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE data= $di ORDER BY data";
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
        $RAW_SQL_QUERY="SELECT *, data AS sort,CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE (data BETWEEN $di AND $df) ORDER BY data";
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
        $RAW_SQL_QUERY="SELECT *, data AS sort,CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE (data BETWEEN $di AND $df) AND staff ='$staff' ORDER BY data";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '7':
        $staff = $_GET['staff'];
        $data_servico = $_GET['data_servico'];
        $date_array=explode('/',trim($_GET['data_servico']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $RAW_SQL_QUERY="SELECT *, data AS sort,CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE data = $di AND staff ='$staff' ORDER BY data";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '8':
        $staff = $_GET['staff'];
        if (isset($_GET['matricula']))
        $m = str_replace("-", "",trim($_GET['matricula']));
        else $m ='';

        $data_servico = $_GET['data_servico'];
        $date_array=explode('/',trim($_GET['data_servico']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $RAW_SQL_QUERY="SELECT *, data AS sort,CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE matricula='$m' AND staff = '$taff' AND data = $di ORDER BY data";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '9':

        if (isset($_GET['matricula']))
        $m = str_replace("-", "",trim($_GET['matricula']));
        else $m ='';
        $data_inicio = $_GET['data_inicio'];
        $date_array=explode('/',trim($_GET['data_inicio']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $data_fim = $_GET['data_fim'];
        $date_array=explode('/',trim($_GET['data_fim']));
        $df=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $RAW_SQL_QUERY="SELECT *, data AS sort,CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE (data BETWEEN $di AND $df) AND matricula ='$m' ORDER BY data";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '10':

        if (isset($_GET['matricula']))
        $m = str_replace("-", "",trim($_GET['matricula']));
        else $m ='';

        $data_servico = $_GET['data_servico'];
        $date_array=explode('/',trim($_GET['data_servico']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');        
        $RAW_SQL_QUERY="SELECT *, data AS sort,CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE data = $di AND matricula ='$m' ORDER BY data";
        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;

        case '11':

        $staff = $_GET['staff'];
        if (isset($_GET['matricula']))
        $m = str_replace("-", "",trim($_GET['matricula']));
        else $m ='';
        $data_inicio = $_GET['data_inicio'];
        $date_array=explode('/',trim($_GET['data_inicio']));
        $di=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        $data_fim = $_GET['data_fim'];
        $date_array=explode('/',trim($_GET['data_fim']));
        $df=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
        
        $RAW_SQL_QUERY="SELECT *, data AS sort,CONCAT(lat_inicio,', ',long_inicio) AS gps_ini, CONCAT(lat_fim,', ',long_fim) AS gps_fim FROM diario WHERE (data BETWEEN $di AND $df) AND matricula ='$m' ORDER BY data";

        $r=$db ->sql($RAW_SQL_QUERY)->fetchAll();
        $arr=array("data"=>$r,"options"=>'',"files"=>'');//DATATABLE CLIENT SIDE PARSES
        echo json_encode($arr);
        break;      
}



exit();

?>