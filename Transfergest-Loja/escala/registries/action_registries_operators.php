<?php
require_once '../connect.php';

switch ($_POST['action']){

/*GRAVAR NOVO REGISTO*/
  case '1':

date_default_timezone_set("Europe/Lisbon");

   $err ='';

    $operador = $_POST['opnm'];

    $operador_id = $_POST['opid'];

    $sql =" SELECT nome FROM operador WHERE id = $operador_id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $isvalid = $row['nome'];
    if($operador != $isvalid){
     $err .= 'Não foi possivel verificar o Operador.';
     }


    if (!$_POST['data_servico'])
      $err .= "- Data Serviço <span class='w3-text-red'> *</span><br>";
    else{
      $date_array=explode('/',trim($_POST['data_servico']));
      $data_servico=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00'); 
    }



    if (!$_POST['hrs'])
      $err .= "- Horas <span class='w3-text-red'> *</span><br>";
    else{
      $horas = trim($_POST['hrs']); 
      $hrs = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$horas);
    }

    $estado = 'Pendente';

     if ($_POST['serv'] == 'Escolha' || $_POST['serv'] == 'Sem Categoria')
       $servico = '';
     else 
       $servico = $_POST['serv'];

     if ($_POST['class'] == 'Escolha' || $_POST['class'] == 'Sem Classes')
     $classes = '';
     else
         $classes = '('.$_POST['class'].')';

      $nome = $_POST['nome_cl'];
    
    if ($_POST['email'])
    {
      
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) 
      {
          $email = $_POST['email'];
        }
        else 
        {
          $err .= "- Email Inválido<br>";
        }
    }

      $pais = $_POST['pais'];

      $tel = $_POST['tel'];     

    if(!$_POST['px'])
        $err .= "- Adultos<span class='w3-text-red'> *</span><br>";
      else 
      {
        if (!filter_var($_POST['px'], FILTER_VALIDATE_INT) === false ) {
          $px = $_POST['px'];
        }
        else {
          $err .= "- Adultos, valor inválido<br>";
        }
      }
          $cr = $_POST['cr'];
       
          $bebe = $_POST['bebe'];

      $local_recolha = $_POST['local_recolha'];
      $morada_recolha = $_POST['morada_recolha'];
      $morada_recolha_gps = $_POST['morada_recolha_gps'];

      $voo = $_POST['voo'];
  
      if ($_POST['voo_horario']){
        $cdt = explode(' ',trim($_POST['voo_horario']));
        $cd = explode('/',trim($cdt[0]));
        $voo_horario = strtotime($cd[2].'-'.$cd[1].'-'.$cd[0].' '.$cdt[1]);
      }

      else  $voo_horario = 0;

      $local_entrega = $_POST['local_entrega'];
      $morada_entrega = $_POST['morada_entrega'];
      $morada_entrega_gps = $_POST['morada_entrega_gps'];
      $ponto_referencia = $_POST['ponto_referencia'];
      if(!$_POST['cobrar_a'])
         $err .="- Forma Pagamento<span class='w3-text-red'> *</span><br>"; 
       else 
         $vl = $_POST['cobrar_a'];

      if($_POST['valor'] || $_POST['valor']== '0')
        $valor = $_POST['valor'];
      else
      $valor = 0; 
      
    if($_POST['obs'] && $_POST['obs']  !== null){
       $noand = str_replace('&','',$_POST['obs']);
       $obs = str_replace("'","",$noand).' '.$classes;
    }
    else
     $obs = $classes;

      $criado_em = $_POST['criado_em'];

      $nid = $_POST['nid'];

      $created_by = $_POST['created_by'].'@'.date("d/m/Y H:i:s");
      
      $ref = $_POST['referencia'].'/'.$operador_id;

if (!$err) {

  if ($nome && $email || $nome !=null && $email != null){

  $sql = "SELECT email FROM clientes WHERE email = '$email'" ;
  $result = mysqli_query($conn,$sql);

  if (mysqli_num_rows($result) > 0)
    {  
      while($row = mysqli_fetch_assoc($result))
      {
        $exists = $row["nome"];
      }
    }
  else {
     $sql = "INSERT INTO clientes(email, nome, telefone, pais, operador_id) VALUES ('$email', '$nome', '$tel', '$pais', $operador_id)";
     $result = mysqli_query($conn,$sql);
  }

}


$sql =" INSERT INTO excel (data_servico,hrs,servico,estado,operador,nome_cl,email,pais,telefone,px,cr,bebe,
local_recolha,morada_recolha,morada_recolha_gps,voo,voo_horario,local_entrega,morada_entrega,morada_entrega_gps,ponto_referencia,obs,".$vl.",criado_direto,nid,created_by,referencia)
VALUES
($data_servico,$hrs,'$servico','$estado','$operador','$nome','$email','$pais','$tel','$px','$cr','$bebe','$local_recolha','$morada_recolha','$morada_recolha_gps','$voo',$voo_horario,'$local_entrega','$morada_entrega','$morada_entrega_gps','$ponto_referencia','$obs','$valor', '$criado_em', '$nid','$created_by','$ref')";

$result = mysqli_query($conn,$sql);
  if ($result) {
    $response = 1; 
    $last_id = mysqli_insert_id($conn);
  }  
  else {
    $response = 0;
    $last_id = 0; 
  }

  $r=array('error'=>'','success' => $response,'id' => $last_id);
  echo json_encode($r);
 }
 else{
  $r = array('error' =>$err, 'success' =>'','id' =>'');
  echo json_encode($r);
}

break;










case '25': 

$id = $_POST['operador'];

/*APENAS TIPO TABELA PODE RECEBER CATEGORIAS PARA SELECCIONAR NOVO REGISTO*/

  $sql=" SELECT * FROM operador WHERE nome = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $tipo = $row['tipo'];
  $ids = $row['id'];

if (preg_match("/Tabela/i", $tipo)) {

  $sql=" SELECT id_categoria FROM operador_tab_calc WHERE id_operador = $ids";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
   $ar=array();
   while($row = mysqli_fetch_assoc($result)){
     array_push($ar,$row['id_categoria']);
   }
} 
 
$l = count($ar);

if($l > 0){

   for($i=0;$i<$l;$i++){
    $sql=" SELECT id, nome FROM categoria_prods WHERE id = $ar[$i]";
    $result = mysqli_query($conn, $sql);
    if ($result){
       while($row = mysqli_fetch_assoc($result)){
         $r[]= array('id'=>$row['id'],'nome' => $row['nome']);
       }
     }
    }
 }
}



echo json_encode($r);
break;


/*TODOS CAMPOS CLIENTES PARA NOVO SERVIÇO NO AUTOCOMPLETE*/

case '26':
$id_operator = $_POST['id_operador'];
$sql=" SELECT nome AS value, email AS label, pais, telefone FROM clientes WHERE operador_id = $id_operator ORDER BY nome";
$result = mysqli_query($conn, $sql);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;}
echo json_encode($var);

break;

/*TODAS AS CLASSES DA CATEGORIA SELECCIONADA*/
case '27':

$cat = $_POST['cat'];
$sql=" SELECT id, nome FROM classe_prods WHERE cat = $cat ORDER BY nome";
$result = mysqli_query($conn, $sql);
while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;
}
echo json_encode($var);
break;



/*NOVO REGISTO PROCURAR LOCAIS SE EXISTEM NA BD PARA ENVIO DA ID DO PRODUTO*/
case '15':
$pt1 =  $_POST['pt1'];
$pt2 =  $_POST['pt2'];
$id_oper = $_POST['id_oper'];
$pax = $_POST['total'];

$id_cat = $_POST['id_categoria'];


if ($_POST['horas']){
$periodo = explode(':',trim($_POST['horas']));
$isnoturno = $periodo[0]*60*60+$periodo[1]*60;
}
else $isnoturno = 0;


/*ENCONTRAR periodo noturno DO PRODUTO*/
$sql=" SELECT noturno FROM companhia WHERE 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
$noturno = $row['noturno'];
 }
}


if($noturno){
 $n = explode(',',trim($noturno));
 $isnoturno <= $n[1] || $isnoturno >= $n[0] && $n[0] != $n[1] ? $g = 'operador_noturno' : $g = 'operador_precos';
}


/*ENCONTRAR ID DO PRODUTO*/
$sql=" SELECT id,duracao FROM locais WHERE cat = $id_cat AND (local='$pt1' AND local_fim = '$pt2' OR local_fim='$pt1' AND local= '$pt2') LIMIT 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
$prod_id = $row["id"];
$duracao = $row["duracao"];
 }
}


if (isset($prod_id)){
$sql=" SELECT id FROM classe_prods WHERE cat = $id_cat AND min <= $pax AND max >= $pax LIMIT 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
$label_id = $row["id"];
 }
} 
}

/*ID PRODUTO E ID OPERADOR ID LABEL PRECOS DIA */
if (isset($label_id) ){
$sql= " SELECT valor FROM $g WHERE id_operador = $id_oper AND prod_id = $prod_id AND id_label = $label_id AND id_categoria = $id_cat";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
 $valor = $row["valor"];
 }
} 
}



if ($duracao || $valor ){
$hours = floor($duracao / 3600);
$mins = floor($duracao  / 60 % 60);
$secs = floor($duracao  % 60);
$duracao = sprintf('%02d:%02d', $hours, $mins);
}

$r=array('success'=>1 ,'valor'=>$valor, 'duracao'=>$duracao,'nid'=>$prod_id."-".$id_cat);

echo json_encode($r);
break;


/*NOVO REGISTO PROCURAR LOCAIS SE EXISTEM NA BD PARA ENVIO DA ID DO PRODUTO*/
case '28':

$pt1 =  $_POST['pt1'];
$pt2 =  $_POST['pt2'];
$id_oper = $_POST['id_oper'];
$id_cat = $_POST['id_categoria'];
$id_class = $_POST['id_class'];

if ($_POST['horas']){
$periodo = explode(':',trim($_POST['horas']));
$isnoturno = $periodo[0]*60*60+$periodo[1]*60;
}
else $isnoturno = 0;

/*ENCONTRAR periodo noturno DO PRODUTO*/
$sql=" SELECT noturno FROM companhia WHERE 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
$noturno = $row['noturno'];
 }
}


if($noturno){
 $n = explode(',',trim($noturno));
 $isnoturno <= $n[1] || $isnoturno >= $n[0] && $n[0] != $n[1] ? $g = 'operador_noturno' : $g = 'operador_precos';
}


/*ENCONTRAR ID DO PRODUTO*/
$sql=" SELECT id,duracao FROM locais WHERE cat = $id_cat AND (local='$pt1' AND local_fim = '$pt2' OR local_fim='$pt1' AND local= '$pt2') LIMIT 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
  $prod_id = $row["id"];
  $duracao = $row["duracao"];
 }
}


$sql= " SELECT valor FROM $g WHERE id_operador = $id_oper AND prod_id = $prod_id AND id_label = $id_class AND id_categoria = $id_cat";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)){
 $valor = $row["valor"];
 }
} 




if ($duracao || $valor ){
$hours = floor($duracao / 3600);
$mins = floor($duracao  / 60 % 60);
$secs = floor($duracao  % 60);
$duracao = sprintf('%02d:%02d', $hours, $mins);
}

$r=array('success'=>1 ,'valor'=>$valor, 'duracao'=>$duracao,'nid'=>$prod_id."-".$id_cat);

echo json_encode($r);
break;

}


mysqli_close($conn);

?>



