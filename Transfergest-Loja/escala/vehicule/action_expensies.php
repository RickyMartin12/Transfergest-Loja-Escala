<?php
require_once '../connect.php';

switch ($_POST['action']){


case '13':
	$staff = $_POST['staff'];
	$count = 0;
	$i=0;


//Mostra os dados dos campos da tabela Diario
$query = "SELECT id, matricula, staff, km_inicio, km_fim, data ,proximo_km, data_inicio, hora_inicio, horas_fim, lat_inicio, long_inicio, lat_fim, long_fim, total FROM diario WHERE staff = '$staff' ORDER BY data, matricula ASC" ;
	
	$sql = mysqli_query($conn, $query);
	if (mysqli_num_rows($sql) > 0) 
	{
    	while($row = mysqli_fetch_assoc($sql)) 
    	{
    		$matricula = $row['matricula'];
			$valor_data = date("d/m/Y", $row['data']);
			$coord_init = $row['lat_inicio'].",".$row['long_inicio'];
			$coord_fim = $row['lat_fim'].",".$row['long_fim'];
			$hrs_init = gmdate("H:i", $row['hora_inicio']);
			$hrs_fim = gmdate("H:i", $row['horas_fim']);
			$hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
			$hrs_total = gmdate("H:i", $hrs_total_row);
			$km = $row['km_fim'] - $row['km_inicio'];
			$total = $row['total'];
   				$arr[] = array(
		            	'id' => $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 
		            	'matricula' => $matricula, 'gps_init' => $coord_init, 
		            	'lat_ini' => $row['lat_inicio'],'long_ini' => $row['long_inicio'], 
		            	'hrs_init' => $hrs_init, 'hrs_fim' => $hrs_fim, 'hrs_total' => $hrs_total,
		            	'km_init' => $row['km_inicio'], 'km_fim' => $row['km_fim'], 'km' => $km,
		            	'gps_fim' => $coord_fim, 'lat_fim' => $row['lat_fim'],'long_fim' => $row['long_fim'],
		            	'horas_i' => $row['hora_inicio'], 'horas_f' => $row['horas_fim'], 'total' => $total,
		            	'horas_total1' => $hrs_total_row);   
   				$a = $arr;
        }
    }
    $b = $a;
    $final = array();
	foreach($b as $value) 
	{
		$id = $value['id'];
		$matricula = $value['matricula'];
		$dt = $value['data'];
		$total = $value['total'];
		$staff = $value['staff'];
		$gps_init = $value['gps_init'];
		$lat_ini = $value['lat_ini'];
		$long_ini = $value['long_ini'];
		$hrs_init = $value['hrs_init'];
		$hrs_fim = $value['hrs_fim'];
		$hrs_total = $value['hrs_total'];
		$km_init = $value['km_init'];
		$km_fim = $value['km_fim'];
		$km = $value['km'];
		$gps_fim = $value['gps_fim'];
		$lat_fim = $value['lat_fim'];
		$long_fim = $value['long_fim'];
		$horas_i = $value['horas_i'];
		$horas_f = $value['horas_f'];
		$horas_total1 = $value['horas_total1'];
	    $filter = array_filter($b, function($ar) {
	        GLOBAL $dt, $matricula;
	        $valueArr = (($ar['data'] == $dt) && ($ar['matricula'] == $matricula));
	        return $valueArr;
	    });

	    $sum = array_sum(array_column($filter, 'total'));
	    $final[$id] = array('id' => $id, 'data' => $dt, 'staff' => $staff, 'matricula' => $matricula,  'gps_init' => $gps_init, 'lat_ini' => $lat_ini, 'long_ini' => $long_ini, 'hrs_init' => $hrs_init, 'hrs_fim' => $hrs_fim, 'hrs_total' => $hrs_total, 'km_init' => $km_init, 'km_fim' => $km_fim, 'km' => $km, 'gps_fim' => $gps_fim, 'lat_fim' => $lat_fim, 'long_fim' => $long_fim, 'horas_i' => $horas_i, 'horas_f' => $horas_f, 'horas_total1' => $horas_total1, 'total' => $sum);
	}
	$newArr = array();
	$newArr2 = array();
	foreach ($final as $val) {
	    $newArr[$val['data']] = $val;    
	}
	foreach ($final as $val2) {
	    $newArr2[$val2['matricula']] = $val2;    
	}
	$array = array_merge($newArr, $newArr2);
	$uniqueArray = array_unique($array, SORT_REGULAR);
	for($i=0;$i<count($uniqueArray);$i++)
    {
		for($j=$i+1;$j<count($uniqueArray); $j++)
		{

		    $tmp1=$uniqueArray[$i]["id"];
		    $tmp2=$uniqueArray[$j]["id"];

		    if($tmp1==$tmp2)
		    { 

		        unset($uniqueArray[$j]);

		    }
		    $tmp3=array_values($uniqueArray);

		    $uniqueArray=$tmp3;
		  }
      }
	      function cmp($a, $b)
			{
			    return strcmp($a["data"], $b["data"]);
			}

		usort($uniqueArray, "cmp");

			//Mostra os dados dos campos da tabela Diario
		$query2 = "SELECT diario.id, diario.matricula, diario.staff, diario.data, excel.cobrar_operador, excel.cobrar_direto FROM diario, excel WHERE diario.staff = '$staff' AND diario.data = excel.data_servico AND diario.matricula = excel.matricula ORDER BY data, matricula ASC" ;
		$sql2 = mysqli_query($conn, $query2);
	if (mysqli_num_rows($sql2) > 0) 
	{
    	while($row = mysqli_fetch_assoc($sql2)) 
    	{
    		$matricula = $row['matricula'];
			$valor_data = date("d/m/Y", $row['data']);
			$staff = $row['staff'];
			$cobrar_operador = $row['cobrar_operador'];
			$cobrar_direto = $row['cobrar_direto'];

			$cob = $cobrar_direto + $cobrar_operador;


			$arr2[] = array(
		            	'id' => $row['id'], 'matricula' => $matricula, 'staff' => $staff, 'data' => $valor_data,
		            	'cobrar_operador' => $cobrar_operador, 'cobrar_direto' => $cobrar_direto, 'cob' => $cob);

			$c = $arr2;
    	}
    }


    $d = $c;
    $final2 = array();
	foreach($d as $value) 
	{
		$id = $value['id'];
		$matricula = $value['matricula'];
		$staff = $value['staff'];
		$dt = $value['data'];
		$cob = $value['cob'];
		$filter2 = array_filter($d, function($ar) {
	        GLOBAL $dt, $matricula;
	        $valueArr = (($ar['data'] == $dt) && ($ar['matricula'] == $matricula));
	        return $valueArr;
	    });

	    $sum2 = array_sum(array_column($filter2, 'cob'));

	    $final2[$id] = array('id' => $id, 'data' => $dt, 'staff' => $staff, 'matricula' => $matricula, 'cob' => $sum2);

	}



		
	$newArr3 = array();
	$newArr4 = array();
	foreach ($final2 as $val) {
	    $newArr3[$val['data']] = $val;    
	}
	foreach ($final2 as $val2) {
	    $newArr4[$val2['matricula']] = $val2;    
	}
	$array2 = array_merge($newArr3, $newArr4);
	$uniqueArray2 = array_unique($array2, SORT_REGULAR);


	for($i=0;$i<count($uniqueArray2);$i++)
    {
		for($j=$i+1;$j<count($uniqueArray2); $j++)
		{

		    $tmp1=$uniqueArray2[$i]["id"];
		    $tmp2=$uniqueArray2[$j]["id"];

		    if($tmp1==$tmp2)
		    { 

		        unset($uniqueArray2[$j]);

		    }
		    $tmp3=array_values($uniqueArray2);

		    $uniqueArray2=$tmp3;
		  }
      }

      //print_r($uniqueArray2);


		usort($uniqueArray2, "cmp");

		$arr_t[]  = array('diario' => $uniqueArray, 'excel' => $uniqueArray2);



if ($uniqueArray2 != null)
{



    for($i=0;$i<count($arr_t[0]['diario']);$i++)
	    {

	    	$data1 = $arr_t[0]["diario"][$i]["data"];
	    	for($j=0;$j<count($arr_t[0]['excel']);$j++)
		    {
		    	$data2 = $arr_t[0]["excel"][$j]["data"];
		    	if ($data1 == $data2)
		    	{
		    		$t = array_merge($arr_t[0]["excel"][$j], $arr_t[0]["diario"][$i]);
		    	}
		    	
		    	
		    	$vt = array($t);
		    }
	    }


    $a = array_merge($vt, $uniqueArray);


    $fr = array_unique($a, SORT_REGULAR);

    //print_r($fr);


    function unique_multidim_array($array, $key) { 
    $temp_array = array(); 
    $i = 0; 
    $key_array = array(); 
    
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) { 
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    	return $temp_array; 
	} 


	$abb = unique_multidim_array($fr,'id'); 


		usort($abb, "cmp");

	$arr_t2[]  = array('diario' => $abb);


}
else
{
	$arr_t2[]  = array('diario' => $uniqueArray);
}

echo json_encode($arr_t2);

break;











case '14':
	$matricula = $_POST['matricula'];
	$matr = explode("-", trim($matricula));
	$m = $matr[0].''.$matr[1].''.$matr[2];
	$query = "SELECT DISTINCT diario.id, diario.data, diario.staff, diario.matricula, diario.lat_inicio, diario.lat_fim, diario.long_inicio, diario.long_fim, diario.hora_inicio, diario.horas_fim, diario.km_inicio, diario.km_fim, diario.combustivel, diario.portagem, diario.lavagem, diario.parque, diario.diversos, diario.revisao, diario.mecanica, diario.sinistro, diario.total, excel.cobrar_operador, excel.cobrar_direto 
	FROM diario, excel WHERE diario.matricula='$m' GROUP BY diario.id";

	$sql = mysqli_query($conn, $query);
    if (mysqli_num_rows($sql) > 0) {
    	while($row = mysqli_fetch_assoc($sql)) {
			$valor_data = date("d/m/Y", $row['data']);
			$coord_init = $row['lat_inicio'].",".$row['long_inicio'];
			$coord_fim = $row['lat_fim'].",".$row['long_fim'];
			$hrs_init = gmdate("H:i", $row['hora_inicio']);
			$hrs_fim = gmdate("H:i", $row['horas_fim']);
			$hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
			$hrs_total = gmdate("H:i", $hrs_total_row);
			$km = $row['km_fim'] - $row['km_inicio'];
			$total = $row['combustivel'] + $row['portagem'] +  $row['lavagem']  + $row['parque'] + $row['diversos'] + $row['revisao'] + $row['mecanica'] + $row['sinistro'] + $row['total'];
			$total_receitas = $row['cobrar_operador'] + $row['cobrar_direto'];               
			$arr[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'],
				'matricula' => $row['matricula'], 'gps_init' => $coord_init, 'lat_ini' => $row['lat_inicio'],
				'long_ini' => $row['long_inicio'], 'hrs_init' => $hrs_init, 'hrs_fim' => $hrs_fim, 'hrs_total' => $hrs_total,
				'km_init' => $row['km_inicio'], 'km_fim' => $row['km_fim'], 'km' => $km, 'gps_fim' => $coord_fim,
				'lat_fim' => $row['lat_fim'],'long_fim' => $row['long_fim'], 'horas_i' => $row['hora_inicio'],
				'horas_f' => $row['horas_fim'], 'total' => $total, 'cmx_op'=> $row['cobrar_operador'],
				'cmx_dr' => $row['cobrar_direto'], 'total_receitas' => $total_receitas);
		}
	}

	echo json_encode($arr);

break;

case '15':
	$staff = $_POST['staff'];
	$data_inicio = $_POST['data_inicio'];
	$data_fim = $_POST['data_fim'];

	$date_array=explode('/',trim($data_inicio));
	$date_inicio=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
	$date_array2=explode('/',trim($data_fim));
	$date_fim=strtotime($date_array2[2].'-'.$date_array2[1].'-'.$date_array2[0].'-00');

	$query = "SELECT DISTINCT diario.id, diario.data, diario.staff, diario.matricula, diario.lat_inicio, diario.lat_fim, diario.long_inicio, diario.long_fim, diario.hora_inicio, diario.horas_fim, diario.km_inicio, diario.km_fim, diario.combustivel, diario.portagem, diario.lavagem, diario.parque, diario.diversos, diario.revisao, diario.mecanica, diario.sinistro, diario.total, excel.cobrar_operador, excel.cobrar_direto  
	FROM diario, excel WHERE diario.staff='$staff' AND (data BETWEEN '$date_inicio' AND '$date_fim') GROUP BY diario.id";

	$sql = mysqli_query($conn, $query);
	if (mysqli_num_rows($sql) > 0) {
    	while($row = mysqli_fetch_assoc($sql)) {
			$valor_data = date("d/m/Y", $row['data']);
			$coord_init = $row['lat_inicio'].",".$row['long_inicio'];
			$coord_fim = $row['lat_fim'].",".$row['long_fim'];
			$hrs_init = gmdate("H:i", $row['hora_inicio']);
			$hrs_fim = gmdate("H:i", $row['horas_fim']);
			$hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
			$hrs_total = gmdate("H:i", $hrs_total_row);
			$km = $row['km_fim'] - $row['km_inicio'];
			$total = $row['total'];
			$total_receitas = $row['cobrar_operador'] + $row['cobrar_direto'];   
			$arr[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'],
				'matricula' => $row['matricula'], 'gps_init' => $coord_init, 'lat_ini' => $row['lat_inicio'],
				'long_ini' => $row['long_inicio'], 'hrs_init' => $hrs_init, 'hrs_fim' => $hrs_fim,
				'hrs_total' => $hrs_total, 'km_init' => $row['km_inicio'], 'km_fim' => $row['km_fim'],
				'km' => $km, 'gps_fim' => $coord_fim, 'lat_fim' => $row['lat_fim'],'long_fim' => $row['long_fim'],
				'horas_i' => $row['hora_inicio'], 'horas_f' => $row['horas_fim'], 'total' => $total,
				'cmx_op'=> $row['cobrar_operador'], 'cmx_dr' => $row['cobrar_direto'], 'total_receitas' => $total_receitas);
        }
    }

	echo json_encode($arr);

break;

case '16':
	$matricula = $_POST['matricula'];
	$data_inicio = $_POST['data_inicio'];
	$data_fim = $_POST['data_fim'];
	$matr = explode("-", trim($matricula));
	$m = $matr[0].''.$matr[1].''.$matr[2];
	$date_array=explode('/',trim($data_inicio));
	$date_inicio=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
	$date_array2=explode('/',trim($data_fim));
	$date_fim=strtotime($date_array2[2].'-'.$date_array2[1].'-'.$date_array2[0].'-00');
	$query = "SELECT DISTINCT diario.id, diario.data, diario.staff, diario.matricula, diario.lat_inicio, diario.lat_fim, diario.long_inicio, diario.long_fim, diario.hora_inicio, diario.horas_fim, diario.km_inicio, diario.km_fim, diario.combustivel, diario.portagem, diario.lavagem, diario.parque, diario.diversos, diario.revisao, diario.mecanica, diario.sinistro, diario.total, excel.cobrar_operador, excel.cobrar_direto
	FROM diario, excel WHERE diario.matricula='$m' AND (data BETWEEN '$date_inicio' AND '$date_fim') GROUP BY diario.id";

	$sql = mysqli_query($conn, $query);
		if (mysqli_num_rows($sql) > 0) {
			while($row = mysqli_fetch_assoc($sql)) {
				$valor_data = date("d/m/Y", $row['data']);
				$coord_init = $row['lat_inicio'].",".$row['long_inicio'];
				$coord_fim = $row['lat_fim'].",".$row['long_fim'];
				$hrs_init = gmdate("H:i", $row['hora_inicio']);
				$hrs_fim = gmdate("H:i", $row['horas_fim']);
				$hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
				$hrs_total = gmdate("H:i", $hrs_total_row);
				$km = $row['km_fim'] - $row['km_inicio'];
				$total = $row['combustivel'] + $row['portagem'] +  $row['lavagem']  + $row['parque'] + $row['diversos'] + $row['revisao'] + $row['mecanica'] + $row['sinistro'] + $row['total'];
				$total_receitas = $row['cobrar_operador'] + $row['cobrar_direto'];               
				$arr[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'],
               		'matricula' => $row['matricula'], 'gps_init' => $coord_init, 'lat_ini' => $row['lat_inicio'],
               		'long_ini' => $row['long_inicio'], 'hrs_init' => $hrs_init, 'hrs_fim' => $hrs_fim,
               		'hrs_total' => $hrs_total, 'km_init' => $row['km_inicio'], 'km_fim' => $row['km_fim'],
               		'km' => $km, 'gps_fim' => $coord_fim, 'lat_fim' => $row['lat_fim'],'long_fim' => $row['long_fim'],
               		'horas_i' => $row['hora_inicio'], 'horas_f' => $row['horas_fim'], 'total' => $total,
               		'cmx_op'=> $row['cobrar_operador'], 'cmx_dr' => $row['cobrar_direto'], 'total_receitas' => $total_receitas);
			}
		}

	echo json_encode($arr);

break;

case '17':
	$staff = $_POST['staff'];
	$data_inicio = $_POST['data_inicio'];
	$date_array=explode('/',trim($data_inicio));
	$date_inicio=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

	$query = "SELECT DISTINCT diario.id, diario.data, diario.staff, diario.matricula, diario.lat_inicio, diario.lat_fim, diario.long_inicio, diario.long_fim, diario.hora_inicio, diario.horas_fim, diario.km_inicio, diario.km_fim, diario.combustivel, diario.portagem, diario.lavagem, diario.parque, diario.diversos, diario.revisao, diario.mecanica, diario.sinistro, diario.total, excel.cobrar_operador, excel.cobrar_direto
	FROM diario, excel WHERE diario.staff='$staff' AND (data = '$date_inicio') GROUP BY diario.id";

	$sql = mysqli_query($conn, $query);
	if (mysqli_num_rows($sql) > 0) {
		while($row = mysqli_fetch_assoc($sql)) {
			$valor_data = date("d/m/Y", $row['data']);
			$coord_init = $row['lat_inicio'].",".$row['long_inicio'];
			$coord_fim = $row['lat_fim'].",".$row['long_fim'];
			$hrs_init = gmdate("H:i", $row['hora_inicio']);
			$hrs_fim = gmdate("H:i", $row['horas_fim']);
			$hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
			$hrs_total = gmdate("H:i", $hrs_total_row);
			$km = $row['km_fim'] - $row['km_inicio'];
			$total = $row['combustivel'] + $row['portagem'] +  $row['lavagem']  + $row['parque'] + $row['diversos'] + $row['revisao'] + $row['mecanica'] + $row['sinistro'] + $row['total'];
			$total_receitas = $row['cobrar_operador'] + $row['cobrar_direto'];               
			$arr[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'],
				'matricula' => $row['matricula'], 'gps_init' => $coord_init, 'lat_ini' => $row['lat_inicio'],
				'long_ini' => $row['long_inicio'], 'hrs_init' => $hrs_init, 'hrs_fim' => $hrs_fim,
				'hrs_total' => $hrs_total, 'km_init' => $row['km_inicio'], 'km_fim' => $row['km_fim'],
				'km' => $km, 'gps_fim' => $coord_fim, 'lat_fim' => $row['lat_fim'],'long_fim' => $row['long_fim'],
				'horas_i' => $row['hora_inicio'], 'horas_f' => $row['horas_fim'], 'total' => $total,
				'cmx_op'=> $row['cobrar_operador'], 'cmx_dr' => $row['cobrar_direto'], 'total_receitas' => $total_receitas);
			}
		}

	echo json_encode($arr);

break;


case '18':
$matricula = $_POST['matricula'];
$data_inicio = $_POST['data_inicio'];

$matr = explode("-", trim($matricula));
			$m = $matr[0].''.$matr[1].''.$matr[2];
$date_array=explode('/',trim($data_inicio));
$date_inicio=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');


$query = "SELECT DISTINCT diario.id, diario.data, diario.staff, diario.matricula, diario.lat_inicio, diario.lat_fim, diario.long_inicio, diario.long_fim, diario.hora_inicio, diario.horas_fim, diario.km_inicio, diario.km_fim, diario.combustivel, diario.portagem, diario.lavagem, diario.parque, diario.diversos, diario.revisao, diario.mecanica, diario.sinistro, diario.total, excel.cobrar_operador, excel.cobrar_direto  FROM diario, excel WHERE diario.matricula='$m' AND (data = '$date_inicio') GROUP BY diario.id";


$result3 = mysqli_query($conn, $query);
            if (mysqli_num_rows($result3) > 0) {
             while($row = mysqli_fetch_assoc($result3)) {
				$valor_data = date("d/m/Y", $row['data']);
				$coord_init = $row['lat_inicio'].",".$row['long_inicio'];


				$coord_fim = $row['lat_fim'].",".$row['long_fim'];


				$hrs_init = gmdate("H:i", $row['hora_inicio']);
				$hrs_fim = gmdate("H:i", $row['horas_fim']);

				$hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
				$hrs_total = gmdate("H:i", $hrs_total_row);


				$km = $row['km_fim'] - $row['km_inicio'];

				$total = $row['combustivel'] + $row['portagem'] +  $row['lavagem']  + $row['parque'] + $row['diversos'] + $row['revisao'] + $row['mecanica'] + $row['sinistro'] + $row['total'];

				$total_receitas = $row['cobrar_operador'] + $row['cobrar_direto'];



               
               $arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'gps_init' => $coord_init, 'lat_ini' => $row['lat_inicio'],'long_ini' => $row['long_inicio'], 'hrs_init' => $hrs_init, 'hrs_fim' => $hrs_fim, 'hrs_total' => $hrs_total, 'km_init' => $row['km_inicio'], 'km_fim' => $row['km_fim'], 'km' => $km, 'gps_fim' => $coord_fim, 'lat_fim' => $row['lat_fim'],'long_fim' => $row['long_fim'], 'horas_i' => $row['hora_inicio'], 'horas_f' => $row['horas_fim'], 'total' => $total, 'cmx_op'=> $row['cobrar_operador'], 'cmx_dr' => $row['cobrar_direto'], 'total_receitas' => $total_receitas);

             }
            }

echo json_encode($arr3);
break;


case '19':

   $data_arr = explode('/',trim($_POST['data']));
   $value =  strtotime($data_arr[2].'-'.$data_arr[1].'-'.$data_arr[0].'-00');

   $query = "SELECT * FROM diario WHERE data= $value";

   $sql = mysqli_query($conn, $query);
   if (mysqli_num_rows($sql) > 0) 
     {
      while($row = mysqli_fetch_assoc($sql)) 
      {
        $valor_data = date("d/m/Y", $row['data']);
        $coord_init = $row['lat_inicio'].",".$row['long_inicio'];
        $hrs_init = gmdate("H:i", $row['hora_inicio']);
        $hrs_fim = gmdate("H:i", $row['horas_fim']);
        $hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
        $hrs_total = gmdate("H:i", $hrs_total_row);
        $km = $row['km_fim'] - $row['km_inicio'];

        $arr1[$row['tipo_despesa']] = money_format('%.2n', $row['total']);

        $arr2 = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'],
'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'],
 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '',
 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '',
 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' =>'', 'obs' => $row['descricao']);

$arr3 [] = array_merge($arr2, $arr1);
unset($arr1);
   }
  }

echo json_encode($arr3);
break;

/*
case '20':

	$staff = $_POST['staff'];
	$data_inicio = $_POST['data_inicio'];
	$data_fim = $_POST['data_fim'];
	$date_array=explode('/',trim($data_inicio));
	$date_inicio=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
	$date_array2=explode('/',trim($data_fim));
	$date_fim=strtotime($date_array2[2].'-'.$date_array2[1].'-'.$date_array2[0].'-00');

	$query = "SELECT * FROM diario WHERE staff='$staff' AND (data BETWEEN '$date_inicio' AND '$date_fim')";
  $sql = mysqli_query($conn, $query);
   if (mysqli_num_rows($sql) > 0) 
     {
      while($row = mysqli_fetch_assoc($sql)) 
      {
        $valor_data = date("d/m/Y", $row['data']);
        $coord_init = $row['lat_inicio'].",".$row['long_inicio'];
        $hrs_init = gmdate("H:i", $row['hora_inicio']);
        $hrs_fim = gmdate("H:i", $row['horas_fim']);
        $hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
        $hrs_total = gmdate("H:i", $hrs_total_row);
        $km = $row['km_fim'] - $row['km_inicio'];

        $arr1[$row['tipo_despesa']] = money_format('%.2n', $row['total']);

        $arr2 = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'],
'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'],
 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '',
 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '',
 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' =>'', 'obs' => $row['descricao']);

$arr3 [] = array_merge($arr2, $arr1);
unset($arr1);
   }
  }

break;

*/
case '21':
$staff = $_POST['staff'];
$data_inicio = $_POST['data_inicio'];

$date_array=explode('/',trim($data_inicio));
$date_inicio=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');


$query = "SELECT * FROM diario WHERE staff='$staff' AND data = '$date_inicio' ";





$result3 = mysqli_query($conn, $query);
            if (mysqli_num_rows($result3) > 0) 
            {
             while($row = mysqli_fetch_assoc($result3)) 
             {
				$valor_data = date("d/m/Y", $row['data']);
				$coord_init = $row['lat_inicio'].",".$row['long_inicio'];
				$hrs_init = gmdate("H:i", $row['hora_inicio']);
				$hrs_fim = gmdate("H:i", $row['horas_fim']);
				$hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
				$hrs_total = gmdate("H:i", $hrs_total_row);
				$km = $row['km_fim'] - $row['km_inicio'];

				$tipo = $row['tipo_despesa'];




					if ($tipo == 'combustivel')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => $row['total'], 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}

				else if ($tipo == 'portagem')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => $row['total'],  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'lavagem')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => $row['total'], 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'outra1')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => $row['total'], 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}



				else if ($tipo == 'diversos')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => $row['total'], 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'mecanica')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => $row['total'], 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'revisao')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => $row['total'], 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'sinistro')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => $row['total'], 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'outra2')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => $row['total'], 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'inspeccao')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => $row['total'], 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'seguro')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => $row['total'], 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'renda')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => $row['total'], 'selo' => '', 'obs' => $row['descricao']);

				}



				else if ($tipo == 'selo')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => $row['total'], 'obs' => $row['descricao']);

				}
				

				

               
               

             }
            }



echo json_encode($arr3);


break;



case '22':
$matricula = $_POST['matricula'];
$matr = explode("-", trim($matricula));
			$m = $matr[0].''.$matr[1].''.$matr[2];

$query = "SELECT * FROM diario WHERE matricula='$m'";





$result3 = mysqli_query($conn, $query);
            if (mysqli_num_rows($result3) > 0) 
            {
             while($row = mysqli_fetch_assoc($result3)) 
             {
				$valor_data = date("d/m/Y", $row['data']);
				$coord_init = $row['lat_inicio'].",".$row['long_inicio'];
				$hrs_init = gmdate("H:i", $row['hora_inicio']);
				$hrs_fim = gmdate("H:i", $row['horas_fim']);
				$hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
				$hrs_total = gmdate("H:i", $hrs_total_row);
				$km = $row['km_fim'] - $row['km_inicio'];

				$tipo = $row['tipo_despesa'];




					if ($tipo == 'combustivel')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => $row['total'], 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}

				else if ($tipo == 'portagem')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => $row['total'],  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'lavagem')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => $row['total'], 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'parque')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => $row['total'], 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}



				else if ($tipo == 'outra1')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => $row['total'], 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'mecanica')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => $row['total'], 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'revisao')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => $row['total'], 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'sinistro')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => $row['total'], 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'outra2')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => $row['total'], 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'inspeccao')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => $row['total'], 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'seguro')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => $row['total'], 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'renda')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => $row['total'], 'selo' => '', 'obs' => $row['descricao']);

				}



				else if ($tipo == 'selo')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => $row['total'], 'obs' => $row['descricao']);

				}
				

				

               
               

             }
            }



echo json_encode($arr3);


break;



case '23':
$matricula = $_POST['matricula'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];

$matr = explode("-", trim($matricula));
			$m = $matr[0].''.$matr[1].''.$matr[2];
$date_array=explode('/',trim($data_inicio));
$date_inicio=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

$date_array2=explode('/',trim($data_fim));
$date_fim=strtotime($date_array2[2].'-'.$date_array2[1].'-'.$date_array2[0].'-00');

$query = "SELECT * FROM diario WHERE matricula='$m' AND (data BETWEEN $date_inicio AND $date_fim)";





$result3 = mysqli_query($conn, $query);
            if (mysqli_num_rows($result3) > 0) 
            {
             while($row = mysqli_fetch_assoc($result3)) 
             {
				$valor_data = date("d/m/Y", $row['data']);
				$coord_init = $row['lat_inicio'].",".$row['long_inicio'];
				$hrs_init = gmdate("H:i", $row['hora_inicio']);
				$hrs_fim = gmdate("H:i", $row['horas_fim']);
				$hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
				$hrs_total = gmdate("H:i", $hrs_total_row);
				$km = $row['km_fim'] - $row['km_inicio'];

				$tipo = $row['tipo_despesa'];




					if ($tipo == 'combustivel')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => $row['total'], 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}

				else if ($tipo == 'portagem')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => $row['total'],  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'lavagem')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => $row['total'], 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'parque')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => $row['total'], 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}



				else if ($tipo == 'outra1')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => $row['total'], 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'mecanica')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => $row['total'], 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'revisao')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => $row['total'], 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'sinistro')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => $row['total'], 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'outra2')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => $row['total'], 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'inspeccao')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => $row['total'], 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'seguro')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => $row['total'], 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'renda')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => $row['total'], 'selo' => '', 'obs' => $row['descricao']);

				}



				else if ($tipo == 'selo')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => $row['total'], 'obs' => $row['descricao']);

				}
				


               
               

             }
            }



echo json_encode($arr3);


break;


case '24':
$matricula = $_POST['matricula'];
$data_inicio = $_POST['data_inicio'];

$matr = explode("-", trim($matricula));
			$m = $matr[0].''.$matr[1].''.$matr[2];


$date_array=explode('/',trim($data_inicio));
$date_inicio=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');


$query = "SELECT * FROM diario WHERE matricula='$m' AND (data = '$date_inicio')";





$result3 = mysqli_query($conn, $query);
            if (mysqli_num_rows($result3) > 0) 
            {
             while($row = mysqli_fetch_assoc($result3)) 
             {
				$valor_data = date("d/m/Y", $row['data']);
				$coord_init = $row['lat_inicio'].",".$row['long_inicio'];
				$hrs_init = gmdate("H:i", $row['hora_inicio']);
				$hrs_fim = gmdate("H:i", $row['horas_fim']);
				$hrs_total_row = $row['horas_fim'] - $row['hora_inicio'];
				$hrs_total = gmdate("H:i", $hrs_total_row);
				$km = $row['km_fim'] - $row['km_inicio'];

				$tipo = $row['tipo_despesa'];




					if ($tipo == 'combustivel')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => $row['total'], 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}

				else if ($tipo == 'portagem')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => $row['total'],  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'lavagem')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => $row['total'], 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'parque')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => $row['total'], 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}



				else if ($tipo == 'outra1')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => $row['total'], 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'mecanica')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => $row['total'], 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'revisao')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => $row['total'], 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'sinistro')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => $row['total'], 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'outra2')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => $row['total'], 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'inspeccao')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => $row['total'], 'seguro' => '', 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'seguro')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => $row['total'], 'renda' => '', 'selo' => '', 'obs' => $row['descricao']);

				}


				else if ($tipo == 'renda')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => $row['total'], 'selo' => '', 'obs' => $row['descricao']);

				}



				else if ($tipo == 'selo')
				{
					$arr3[] = array('id'=> $row['id'], 'data' => $valor_data, 'staff' => $row['staff'], 'matricula' => $row['matricula'], 'tipo' => $row['tipo_manutencao'], 'fatura' => $row['fatura'], 'entidade' => $row['entidade'], 'coord' => $coord_init, 'hora' => $hrs_total, 'km' => $km, 'combustivel' => '', 'portagem' => '',  'lavagem' => '', 'parque' => '', 'outra1' => '', 'mecanica' => '', 'revisao' => '', 'sinistro' => '', 'outra2' => '', 'inspeccao' => '', 'seguro' => '', 'renda' => '', 'selo' => $row['total'], 'obs' => $row['descricao']);

				}
				

				

               
               

             }
            }



echo json_encode($arr3);


break;




}
mysqli_close($conn);
?>


