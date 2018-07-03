<?php
require_once '../connect.php';
global $conn;

$error_message = '';

switch ($_POST['action']){

case '30':

$data = $_POST['data'];
$matricula = $_POST['matricula'];
$km = $_POST['km_fim'];
$responsavel = $_POST['responsavel'];
$tipo_posto = $_POST['tipo_posto'];
$fatura = $_POST['fatura'];
$entidade = $_POST['entidade'];
$observacoes = $_POST['descricao'];
$localidade = $_POST['localidade'];
$total = $_POST['total'];

if ($matricula == '' || $matricula == '0')
{ 
	$error_message .= '- Matricula<br>';
}
if ($data == '')
{
	$error_message .= '- Data<br>';
}
if ($tipo_posto == '')
{
	$error_message .= '- Tipo Despesa<br>';
}
else
{

	$date_array2=explode('/',trim($data));
	$date2=strtotime($date_array2[2].'-'.$date_array2[1].'-'.$date_array2[0].'-00');

	$matr = explode("-", trim($matricula));
	$m = $matr[0].''.$matr[1].''.$matr[2];

			if ($km == '')
			{
				$km = 0;
			}
			if($total=='')
			{
				$total = 0;
			}
$sql = "INSERT INTO diario(data,matricula,km_fim,staff,tipo_manutencao,tipo_despesa,fatura,entidade,localidade,total,descricao) values ($date2,'$m',$km,'$responsavel','Diária','$tipo_posto','$fatura','$entidade','$localidade','$total','$observacoes')";
			
	$result = mysqli_query($conn,$sql);
	if ($result) echo 1;
	else echo 0;

       }
echo $error_message;
break;



case '31':

// Condições do Tipo de Posto;

$data = $_POST['data'];
$matricula = $_POST['matricula'];
$km = $_POST['km_fim'];
$responsavel = $_POST['responsavel'];
$tipo_posto = $_POST['tipo_posto'];
$fatura = $_POST['fatura'];
$entidade = $_POST['entidade'];
$observacoes = $_POST['descricao'];
$localidade = $_POST['localidade'];
$proximo_km = $_POST['proximo_km'];
$total = $_POST['total'];

if ($matricula == '' || $matricula == '0')
{ 
	$error_message .= '- Matricula<br>';
}
if ($data == '')
{
	$error_message .= '- Data<br>';
}
if ($tipo_posto == '')
{
	$error_message .= '- Tipo Despesa<br>';
}
else

{

		$date_array2=explode('/',trim($data));
		$date2=strtotime($date_array2[2].'-'.$date_array2[1].'-'.$date_array2[0].'-00');

		$matr = explode("-", trim($matricula));
			$m = $matr[0].''.$matr[1].''.$matr[2];
		
			if ($km == '')
			{
				$km = 0;
			}
			if($total=='')
			{
				$total = 0;
			}
			if ($proximo_km == '')
			{
				$proximo_km = 0;
			}

		$sql = "INSERT INTO diario(data, matricula, km_fim, staff, tipo_manutencao, tipo_despesa, fatura, entidade, localidade, total, proximo_km, descricao) values ($date2,'$m', $km, '$responsavel', 'Manutenção','$tipo_posto', '$fatura', '$entidade','$localidade', '$total', $proximo_km, '$observacoes')";
		
	$result = mysqli_query($conn,$sql);
	if ($result) echo 1;
	else echo 0;
	}
echo $error_message;

break;

case '32':
$query = "SELECT * FROM diario ORDER BY id";
$result3 = mysqli_query($conn, $query);
            if (mysqli_num_rows($result3) > 0) {
             while($row = mysqli_fetch_assoc($result3)) {
				$valor_data_fim = date("d/m/Y", $row['data_fim']);
				$valor_data_inicio = date("d/m/Y", $row['data_inicio']);

              $arr3[] = array('id'=> $row['id'], 'matricula' => $row['matricula'], 'tipo_despesa' => $row['tipo_despesa'], 'tipo_periocidade' => $row['tipo_periodicidade'], 'dia' => $row['dia'], 'entidade' => $row['entidade'], 'valor' => $row['total'], 'data_inicio' => $valor_data_inicio, 'data_fim' => $valor_data_fim, 'fatura' => $row['fatura']);
             }
            }

echo json_encode($arr3);

break;



case '33':

$tipo_posto = $_POST['tipo_posto'];
$matricula = $_POST['matricula'];
$tipo_periodicidade = $_POST['tipo_periocidade'];
$dia = $_POST['dia'];
$entidade = $_POST['entidade'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$total = $_POST['total'];
$fatura = $_POST['fatura'];
$responsavel = $_POST['responsavel'];

if ($matricula == '')
{ 
	$error_message .= '- Matricula<br>';
}
if ($data_inicio == '')
{
	$error_message .= '- Data Inicio<br>';
}
if ($data_fim == '')
{
	$error_message .= '- Data Fim<br>';
}
if ($tipo_posto == '')
{
	$error_message .= '- Tipo Despesa<br>';
}

if  ($dia =='')
$error_message .= '- Dia<br>';
else if ($dia) {
if ($dia >31 || $dia < 1)
$error_message .= '- Dia inválido (Escolha de 1 a 31)<br>';
}

if ($tipo_periodicidade == '')
{
	$error_message .= '- Tipo Periodicidade<br>';
}

if ($error_message =='')
{

	$date_array2=explode('/',trim($data_inicio));
	$date2=strtotime($date_array2[2].'-'.$date_array2[1].'-'.$date_array2[0].'-00');

	$date_array=explode('/',trim($data_fim));
	$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

	$matr = explode("-", trim($matricula));
	$m = $matr[0].''.$matr[1].''.$matr[2];

	$valor_data_inicio = strtotime($data_inicio);
	$valor_data_fim = strtotime($data_fim);

	$sql = "INSERT INTO diario(staff, tipo_manutencao, tipo_despesa, tipo_periodicidade, dia, entidade, matricula, total, data_inicio,
data_fim, data, fatura) 
VALUES
('$responsavel','Fixa', '$tipo_posto','$tipo_periodicidade', $dia, '$entidade','$m', '$total', $date2, $date, $date2,'$fatura')";


	$result = mysqli_query($conn,$sql);
	if ($result)
         echo 1;
	else
         echo 0;
 }

echo $error_message;

break;


case '34':
$matricula = $_POST['matricula'];
$matr = explode("-", trim($matricula));
$m = $matr[0].''.$matr[1].''.$matr[2];

$query = "SELECT * FROM diario WHERE matricula='$m' AND tipo_manutencao = 'Fixa' ORDER BY data_inicio";

$result3 = mysqli_query($conn, $query);
            if (mysqli_num_rows($result3) > 0) {
             while($row = mysqli_fetch_assoc($result3)) {
		$valor_data_fim = date("d/m/Y", $row['data_fim']);
		$valor_data_inicio = date("d/m/Y", $row['data_inicio']);
                $arr3[] = array('id'=> $row['id'], 'matricula' => $row['matricula'], 'tipo_despesa' => $row['tipo_despesa'], 'tipo_periocidade' => $row['tipo_periodicidade'], 'dia' => $row['dia'], 'entidade' => $row['entidade'], 'valor' => $row['total'], 'data_inicio' => $valor_data_inicio, 'data_fim' => $valor_data_fim, 'fatura' => $row['fatura'], 'responsavel' => $row['staff']);
             }
            }

echo json_encode($arr3);
break;


case '35':

$id = $_POST['id'];
$vehicule_del= "DELETE FROM diario WHERE id = $id";
$result = mysqli_query($conn,$vehicule_del);
if ($result){
	$success = 2; 
}
else {
	$success = 0;
}
	echo $success;
break;


case '36':

   $fields=array('id','matricula','tipo_despesa','tipo_periodicidade','dia','entidade','total','data_inicio','data_fim','fatura','staff');
   $id = $_POST['id'];
   $posto = $_POST['tipo_posto'];
   $query='UPDATE diario SET ';
	for($i=2;$i<12;$i++){
	   $index = 'col_'.$i.'_'.$id;
	   $t = $_POST[$index];
	   if ($i == 2)
	   {
	     $matr = explode("-", trim($_POST[$index]));
	     $m = $matr[0].''.$matr[1].''.$matr[2];
	     $query.= $fields[$i-1].'='."'".$m."'";
	   }
	   else if ($i == 3)
	   {
	      $valor = $_POST[$index];
	      $query.= $fields[$i-1].'='."'".$valor."'";

	 	//echo $valor;

	 	if (($valor == 'Combustivel') || ($valor == 'Portagem') || ($valor == 'Lavagem') || ($valor == 'Parque') || ($valor == 'Diversos'))
	 	{
	 		$query .= ',';
	 		$query .= "tipo_manutencao='Diária'";
	 	}
	 	else if (($valor == 'Mecânica') || ($valor == 'Revisao') || ($valor == 'Sinistro') || ($valor == 'Outros')) 
	 	{
	 		$query .= ',';
	 		$query .= "tipo_manutencao='Manutenção'";
	 	}
	 	
	 	else if (($valor == 'Selo') || ($valor == 'Inspecção') || ($valor == 'Seguro') || ($valor == 'Renda')) 
	 	{
	 		$query .= ',';
	 		$query .= "tipo_manutencao='Fixa'";
	 	}
	 	
	   }

	   else if ($i==8)
	   {
	        $date_array=explode('/',trim($_POST[$index]));
	        $date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
	        $query.= $fields[$i-1].'='."'".$date."'";
	   }
	   else if ($i==9)
	   {
		$date_array2=explode('/',trim($_POST[$index]));
		$date2=strtotime($date_array2[2].'-'.$date_array2[1].'-'.$date_array2[0].'-00');
		$query.= $fields[$i-1].'='."'".$date2."'";
	   }
	   else
	   {
		
		$query.= $fields[$i-1].'='."'$t'";
	    }
	   if($i!=11)
			$query.=',';
	}

	
	$query.=" WHERE id=$id";
	mysqli_query($conn,$query);
	$result = mysqli_query($conn,$query);


/*SE SUCESSO NA ALTERAÇÃO ENVIA DADOS DO REGISTO E SUBSTITUI NA RESPECTIVA ID ROW */

	if ($result)
			echo 1;
		else 
			echo 0;

break; 


}mysqli_close($conn);
?>





