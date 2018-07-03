<?php

require_once('../connect.php');

switch ($_POST['action']){

/*OBTER AS CATEGORIAS VISIVEIS PARA APRESENTAR NA LOJA*/
case '1':

$dominio = $_POST['dominio'];

$query2 = "SELECT id FROM `operador` WHERE dominio='$dominio' AND loja='checked' LIMIT 1";
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_assoc($result2);


$id = $row['id'];

        if ($id) 
        {
            $id = filter_var($id, FILTER_SANITIZE_STRING);
            $_SESSION["id"] = $id;
            $query3 = "SELECT DISTINCT id_categoria FROM operador_tab_calc WHERE id_operador = {$_SESSION["id"]}";
            $result3 = mysqli_query($conn, $query3);
            while ($row = mysqli_fetch_assoc($result3))
            {
                $id_categoria = $row['id_categoria'];
                $query = "SELECT * FROM `categoria_prods` WHERE id =  $id_categoria AND visivel = 1 ORDER BY favorito DESC";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) 
                {
                    while($obj = mysqli_fetch_object($result)) 
                    {
                        $array[] = $obj;
                    }
                }
            }

        }










echo json_encode($array);
break;

/*OBTER TODOS OS LOCAIS EXISTENTES REFERENTES À CATEGORIA E VISIVEIS*/
case '2':
$tipo = $_POST['tipo'];
$categoria = $_POST['categoria'];

$query = "
SELECT local AS f
FROM locais
WHERE cat = $categoria AND tipo = $tipo 
AND visivel = 1 
UNION 
SELECT local_fim AS t
FROM locais
WHERE cat = $categoria AND tipo = $tipo
AND visivel = 1
ORDER BY f ASC"; 


$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
while($obj = mysqli_fetch_object($result)) {
$array[] = $obj;
}
}
echo json_encode($array);
break;

/* OBTER LOCAIS DESTINO REFERENTES À ESCOLHA DO CLIENTE */
case '3':
$origem = $_POST['origem'];
$tipo = $_POST['tipo'];
$cat = $_POST['categoria'];

$query = "SELECT local , local_fim FROM locais WHERE
visivel = 1 AND tipo = $tipo AND cat = $cat AND local = '$origem'
OR visivel = 1 AND tipo = $tipo AND cat = $cat AND local_fim = '$origem'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
while($obj = mysqli_fetch_object($result)) {
$array[] = $obj;
}
}
echo json_encode($array);
break;

/*OBTER ID DO PRODUTO COM IGUALDADE NOS CAMPOS ORIGEM E DESTINO*/

case '4':
$origem = $_POST['origem'];
$tipo = $_POST['tipo'];
$destino = $_POST['destino'];
$cat = $_POST['categoria'];

$query = "SELECT id, duracao FROM locais WHERE visivel = 1 AND tipo = $tipo AND cat = $cat AND local = '$origem' AND local_fim = '$destino'
OR visivel = 1 AND tipo = $tipo AND cat = $cat AND local = '$destino' AND local_fim = '$origem' ";

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
while($obj = mysqli_fetch_object($result)) {
$array[] = $obj;
}
}
echo json_encode($array);
break;

/*MOSTRAR TODOS AS LABELS DO PRODUTOS COM VALORES ATRIBUIDOS*/
case '5':
   $cat = $_POST['categoria'];

$query ="
SELECT *
FROM classe_prods
WHERE cat = $cat ORDER BY id";


$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
while($obj = mysqli_fetch_object($result)) {
$array[] = $obj;
}
}
echo json_encode($array);
break;


/*MOSTRAR  O VALOR DA LABEL ESCOLHIDA PELO CLIENTE*/
case '6':
$id_label = $_POST['id_label'];
$id_prod =  $_POST['id_prod'];
$cat = $_POST['categoria'];
$dominio = $_POST['dominio'];

$query2 = "SELECT id FROM `operador` WHERE dominio='$dominio' AND loja='checked' LIMIT 1";
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_assoc($result2);


$id = $row['id'];


$date_array=explode(' ',trim($_POST['data_reserva']));
$dias=explode('/',trim($date_array[0]));

$time = explode(':', $date_array[1]);


$time_diff = ($time[0]*3600) + ($time[1]*60);

$obter_comp=" SELECT * FROM companhia WHERE 1";
            $result_comp = mysqli_query($conn, $obter_comp);
              if (mysqli_num_rows($result_comp) > 0) 
              {
                  while($row = mysqli_fetch_assoc($result_comp)) 
                  {
                    $noturno = $row["noturno"];
                  }
              }

$valor_time_noturno=explode(',',trim($noturno));


if (($time_diff <= $valor_time_noturno[1] || $time_diff >= $valor_time_noturno[0]) && ($valor_time_noturno[0] != $valor_time_noturno[1]))
{
  $query = "SELECT valor FROM operador_noturno WHERE id_categoria = $cat AND prod_id = $id_prod AND id_operador = $id AND id_label = $id_label";

  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) 
  {
    while($obj = mysqli_fetch_object($result)) 
    {
      $array[] = $obj;
    }
  }
}
else
{
  $query = "SELECT valor FROM operador_precos WHERE id_categoria = $cat AND prod_id = $id_prod AND id_operador = $id AND id_label = $id_label";

  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) 
  {
    while($obj = mysqli_fetch_object($result)) 
    {
      $array[] = $obj;
    }
  }
}




echo json_encode($array);
break;


/*SE A VIAGEM TEM RETORNO*/
case '7':
$id_label = $_POST['id_label'];
$id_prod =  $_POST['id_prod'];
$return = $_POST['return'];
$cat = $_POST['categoria'];

$dominio = $_POST['dominio'];

$query2 = "SELECT id FROM `operador` WHERE dominio='$dominio' AND loja='checked' LIMIT 1";
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_assoc($result2);


$id = $row['id'];



$date_array=explode(' ',trim($_POST['data_reserva']));
$dias=explode('/',trim($date_array[0]));
$dias_d=strtotime($dias[2].'-'.$dias[1].'-'.$dias[0].'-00'); 
$horas=strtotime($dias[2].'-'.$dias[1].'-'.$dias[0].' '.$date_array[1]);




$time_diff = $horas-$dias_d;


$obter_comp=" SELECT * FROM companhia WHERE 1";
            $result_comp = mysqli_query($conn, $obter_comp);
              if (mysqli_num_rows($result_comp) > 0) 
              {
                  while($row = mysqli_fetch_assoc($result_comp)) 
                  {
                    $noturno = $row["noturno"];
                  }
              }

$valor_time_noturno=explode(',',trim($noturno));



if ($time_diff <= $valor_time_noturno[1] || $time_diff >= $valor_time_noturno[0])
{
  $query = "SELECT valor FROM operador_noturno WHERE id_categoria = $cat AND prod_id = $id_prod AND id_operador = $id AND id_label = $id_label";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  if ($return =='Yes'){
  $array[] = array('valor' => $row['valor']*2);
  }

  else{
  $array[] = array('valor' => $row['valor']);
  }
  }
  }
}
else
{
  $query = "SELECT valor FROM operador_precos WHERE id_categoria = $cat AND prod_id = $id_prod AND id_operador = $id AND id_label = $id_label";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  if ($return =='Yes'){
  $array[] = array('valor' => $row['valor']*2);
  }

  else{
    $array[] = array('valor' => $row['valor']);
  }
  }
}
}









echo json_encode($array);

break;


/*VERIFICAR SE O CODIGO EXISTE SE SIM OBTER VALOR */
case '8':

$id_label = $_POST['id_label'];
$id_prod =  $_POST['id_prod'];
$return = $_POST['return'];
$promo = $_POST['promo'];
$cat = $_POST['categoria'];

$dominio = $_POST['dominio'];

$query2 = "SELECT id FROM `operador` WHERE dominio='$dominio' AND loja='checked' LIMIT 1";
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_assoc($result2);
$id = $row['id'];



$date_array=explode(' ',trim($_POST['data_reserva']));
$dias=explode('/',trim($date_array[0]));
$dias_d=strtotime($dias[2].'-'.$dias[1].'-'.$dias[0].'-00'); 

$query = "SELECT valor FROM operador_precos WHERE id_categoria = $cat AND prod_id = $id_prod AND id_operador = $id AND id_label = $id_label";
$result = mysqli_query($conn, $query);



if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
  if ($return =='Yes')
   $valor = $row['valor']*2;
  else
   $valor = $row['valor'];
 }

 $pr = "SELECT percentagem, nome FROM codigo_promo WHERE nome = '$promo' AND ativo = 1 AND visivel = 1 AND data_ini <= $dias_d AND data_fim >= $dias_d LIMIT 1";
 $result1 = mysqli_query($conn, $pr);
 if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result1)) {
   $codigo = $row['nome'];
   $percentagem = $row['percentagem']/100;
  }
 }
}

if ($codigo){
 $final = $valor-($valor * $percentagem);
 $array[] = array('promo' => 1,'valor' => $valor, 'desconto' => $final, 'data' => $dias_d );
}

else {
$array[] = array('promo' => 0, 'valor' => $valor, 'desconto' => '0', 'data' => $dias_d );
}

echo json_encode($array);
break;



/*VERIFICAR DADOS TRANSFER AEROPORTO IDA E VOLTA F1*/
case 9:
/**/
/* CAMPOS DE CHEGADA*/
/**/

     /*VALIDAR FROM E ATRIBUIR VAR SESSÃO*/
      if ($_POST['from'] != "") {
            $_POST['from'] = filter_var($_POST['from'], FILTER_SANITIZE_STRING);
            $from = $_POST['from'];
}

     /*VALIDAR TO E ATRIBUIR VAR SESSÃO*/
      if ($_POST['to'] != "") {
            $_POST['to'] = filter_var($_POST['to'], FILTER_SANITIZE_STRING);
            $to = $_POST['to'];
}

     /*VALIDAR PAX*/
      if ($_POST['pax'] != "") {
            $_POST['pax'] = filter_var($_POST['pax'], FILTER_SANITIZE_STRING);
            $pax = $_POST['pax'];
}

  /*VALIDAR ID PRODUTO*/
  if ($_POST['prod'] != "") {
           $prod = filter_var($_POST['prod'], FILTER_SANITIZE_NUMBER_INT);
            $id_prod = $prod;
            if (!filter_var($prod, FILTER_SANITIZE_NUMBER_INT)) {
               $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        }
     else {
             $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }

  /*VALIDAR ID TOTAL*/
  if ($_POST['pp'] != "") {
           $pp = filter_var($_POST['pp'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $total = $pp;
 }

   /*VALIDAR PREÇO*/
  if ($_POST['label'] != "") {
           $label = filter_var($_POST['label'], FILTER_SANITIZE_NUMBER_INT);
            $label_ok = $label;
            if (!filter_var($label, FILTER_SANITIZE_NUMBER_INT)) {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        }
     else {
           $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }

     /*VALIDAR LINGUAGEM CLIENTE E ATRIBUIR VAR SESSÃO*/
      if ($_POST['language'] != "") {
            $_POST['language'] = filter_var($_POST['language'], FILTER_SANITIZE_STRING);

            $language = $_POST['language'];

            if ($_POST['language'] == "") {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        } else {
            $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }


     /*VALIDAR RETORNO CLIENTE*/
      if ($_POST['oneway'] != "") {
            $_POST['oneway'] = filter_var($_POST['oneway'], FILTER_SANITIZE_STRING);

            $oneway = $_POST['oneway'];

            if ($_POST['oneway'] == "") {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        } else {
            $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }


     /*VALIDAR COD_PROMO*/
      if ($_POST['promo'] != "") {
            $_POST['promo'] = filter_var($_POST['promo'], FILTER_SANITIZE_STRING);

            $promo = $_POST['promo'];
}

     /*VALIDAR NR VOO CHEGADA */
        if ($_POST['arr_fl_nr'] != "") {
            $_POST['arr_fl_nr'] = filter_var($_POST['arr_fl_nr'], FILTER_SANITIZE_STRING);

            $arr_fl_nr = $_POST['arr_fl_nr'];

            if ($_POST['arr_fl_nr'] == "") {
                $errors .='<script>$(".vfn").text($(".ARRIVAL_FLIGHT_N").text());</script><font class="vfn"></font><br>';
            }
        } else {
            $errors .='<script>$(".vfn").text($(".ARRIVAL_FLIGHT_N").text());</script><font class="vfn"></font><br>';
        }
 

     /*VALIDAR DATA VOO CHEGADA*/
        if ($_POST['arr_fl_dt'] != "") {
            $_POST['arr_fl_dt'] = filter_var($_POST['arr_fl_dt'], FILTER_SANITIZE_STRING);

            $arr_fl_dt = $_POST['arr_fl_dt'];

            if ($_POST['arr_fl_dt'] == "") {
                $errors .='<script>$(".vfd").text($(".ARRIVAL_FLIGHT_DT").text());</script><font class="vfd"></font><br>';
            }
        } else {
            $errors .='<script>$(".vfd").text($(".ARRIVAL_FLIGHT_DT").text());</script><font class="vfd"></font><br>';
        }
 
     
 

     /*VALIDAR MORADA CHEGADA*/
        if ($_POST['arr_fl_addr'] != "") {
            $_POST['arr_fl_addr'] = filter_var($_POST['arr_fl_addr'], FILTER_SANITIZE_STRING);
            $arr_fl_addr = $_POST['arr_fl_addr'];
        }
 
/**/
/* CAMPOS DE PARTIDA*/
/**/

  /*VALIDAR NR VOO PARTIDA*/
        if ($_POST['dep_fl_nr'] != "") {
            $_POST['dep_fl_nr'] = filter_var($_POST['dep_fl_nr'], FILTER_SANITIZE_STRING);
            $dep_fl_nr = $_POST['dep_fl_nr'];

            if ($_POST['dep_fl_nr'] == "") {
               $errors .='<script>$(".vdn").text($(".DEPARTURE_FLIGHT_N").text());</script><font class="vdn"></font><br>';
            }
        } else {
           $errors .='<script>$(".vdn").text($(".DEPARTURE_FLIGHT_N").text());</script><font class="vdn"></font><br>';
        }
 

     /*VALIDAR DATA VOO PARTIDA*/
        if ($_POST['dep_fl_dt'] != "") {
            $_POST['dep_fl_dt'] = filter_var($_POST['dep_fl_dt'], FILTER_SANITIZE_STRING);

            $dep_fl_dt = $_POST['dep_fl_dt'];

            if ($_POST['dep_fl_dt'] == "") {
                $errors .='<script>$(".vdn").text($(".DEPARTURE_FLIGHT_N").text());</script><font class="vdn"></font><br>';
            }
        } else {
             $errors .='<script>$(".vdn").text($(".DEPARTURE_FLIGHT_N").text());</script><font class="vdn"></font><br>';
        }
 

     
     /*VALIDAR HORA/DATA PICK-UP*/
        if ($_POST['dep_fl_tr_time'] != "") {
            $_POST['dep_fl_tr_time'] = filter_var($_POST['dep_fl_tr_time'], FILTER_SANITIZE_STRING);

            $dep_fl_tr_time = $_POST['dep_fl_tr_time'];

            if ($_POST['dep_fl_tr_time'] == "") {
                $errors .='<script>$(".vdpu").text($(".DEPARTURE_FLIGHT_TR_TIME").text());</script><font class="vdpu"></font><br>';
            }
        } else {
            $errors .='<script>$(".vdpu").text($(".DEPARTURE_FLIGHT_TR_TIME").text());</script><font class="vdpu"></font><br>';
        }

     /*VALIDAR MORADA PARTIDA*/
        if ($_POST['dep_fl_addr'] != "") {
            $_POST['dep_fl_addr'] = filter_var($_POST['dep_fl_addr'], FILTER_SANITIZE_STRING);
            $dep_fl_addr = $_POST['dep_fl_addr'];
        }
 
/**/
/* CAMPOS DADOS PESSOAIS*/
/**/


     /*VALIDAR NOME CLIENTE*/
        if ($_POST['per_de_name'] != "") {
            $_POST['per_de_name'] = filter_var($_POST['per_de_name'], FILTER_SANITIZE_STRING);

            $per_de_name = $_POST['per_de_name'];

            if ($_POST['per_de_name'] == "") {
                $errors .='<script>$(".pdn").text($(".PERSONAL_DETAILS_NAME").text());</script><font class="pdn"></font><br>';
            }
        } else {
            $errors .='<script>$(".pdn").text($(".PERSONAL_DETAILS_NAME").text());</script><font class="pdn"></font><br>';
        }
 

        if ($_POST['per_de_email'] != "") {
            $email = filter_var($_POST['per_de_email'], FILTER_SANITIZE_EMAIL);

            $per_de_email = $email;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors .='<script>$(".pde").text($(".PERSONAL_DETAILS_EMAIL").text());</script><font class="pde"></font><br>';
            }
        } else {
            $errors .='<script>$(".pde").text($(".PERSONAL_DETAILS_EMAIL").text());</script><font class="pde"></font><br>';
        }

           if ($_POST['per_de_tel'] != "") {
           $tel = filter_var($_POST['per_de_tel'], FILTER_SANITIZE_NUMBER_INT);
            $per_de_tel = $tel;
        } 
     

     /*VALIDAR COUNTRY*/
        if ($_POST['per_de_country'] != "") {
            $_POST['per_de_country'] = filter_var($_POST['per_de_country'], FILTER_SANITIZE_STRING);
            $per_de_country = $_POST['per_de_country'];
        }

/**/
/* CAMPOS PASSAGEIROS*/
/**/

           if ($_POST['nr_pax_adu'] != "") {
            $adult = filter_var($_POST['nr_pax_adu'], FILTER_SANITIZE_NUMBER_INT);
            $nr_pax_adu = $adult;

            if (!filter_var($adult, FILTER_SANITIZE_NUMBER_INT)) {
               $errors .='<script>$(".adt").text($(".ADULT").text());</script><font class="adt"></font><br>';
            }
        } 
        else {
            $errors .='<script>$(".adt").text($(".ADULT").text());</script><font class="adt"></font><br>';
        }

if (filter_var($_POST['nr_pax_chi'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['nr_pax_chi'], FILTER_VALIDATE_INT) === false){

$children = filter_var($_POST['nr_pax_chi'], FILTER_SANITIZE_NUMBER_INT);
            $nr_pax_chi = $children;
}
   else {
                $errors .='<script>$(".chi").text($(".CHILDREN").text());</script><font class="chi"></font><br>';
            } 

    if (filter_var($_POST['nr_pax_ba'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['nr_pax_ba'], FILTER_VALIDATE_INT) === false){
     $baby = filter_var($_POST['nr_pax_ba'], FILTER_SANITIZE_NUMBER_INT);
     $nr_pax_ba = $baby;
}

       else {
                $errors .='<script>$(".bab").append($(".BABY").text());</script><font class="bab"></font><br>';
            } 

        if ($_POST['obs_txt'] != "") {
            $_POST['obs_txt'] = filter_var($_POST['obs_txt'], FILTER_SANITIZE_STRING);
            $obs_txt = $_POST["obs_txt"];
        }

        if ($_POST['payments_type'] != "") {
            $_POST['payments_type'] = filter_var($_POST['payments_type'], FILTER_SANITIZE_STRING);

            $payments_type = $_POST['payments_type'];

            if ($_POST['payments_type'] == "") {
                 $errors .='<script>$(".pag").text($(".PAYMENTS_MET_LABEL").text());</script><font class="pag"></font><br>';
            }
        } else {
            $errors .='<script>$(".pag").text($(".PAYMENTS_MET_LABEL").text());</script><font class="pag"></font><br>';
        }


        if (!$errors) {

         if($payments_type == 'Paypal')

$obter_comp=" SELECT pp_taxa FROM companhia WHERE 1";
 $result_comp = mysqli_query($conn, $obter_comp);
  if (mysqli_num_rows($result_comp) > 0) {
    while($row = mysqli_fetch_assoc($result_comp)) {
     $c_pp_taxa = $row["pp_taxa"];
    }
   }

            $total = $total*($c_pp_taxa/100) + $total;

          $res[] = array
           (
            'errors' => 0,
            'voo_n_che' => $arr_fl_nr,
            'voo_che_dt' => $arr_fl_dt,
            'voo_che_mor' => $arr_fl_addr,

            'voo_n_dep' => $dep_fl_nr,
            'voo_dep_dt' => $dep_fl_dt,
            'voo_dep_tm' => $dep_fl_tm,
            'voo_dep_pick' => $dep_fl_tr_time,
            'voo_dep_mor' => $dep_fl_addr,
      
            'nome' => $per_de_name,
            'email' => $per_de_email, 
            'tel' => $per_de_tel,
            'country' => $per_de_country,

            'adult' => $nr_pax_adu,
            'children' => $nr_pax_chi,
            'baby' => $nr_pax_ba,

            'obs' => $obs_txt,
            'payments' => $payments_type,

            'id' => $id_prod,
            'id_price' => $label_ok,

            'lang' => $language,
            'promo' => $promo,
            'oneway' => $oneway,

            'from' => $from,
            'to' => $to,
            'pax' => $pax,
            'total' => $total);

           echo json_encode($res);
        } else {
 
         $not[] = array
           (
            'errors' => 1,  
            'invalid' => $errors);
            echo json_encode($not);
        }
break;


/*VERIFICAR DADOS TRANSFER AEROPORTO CHEGADA F2*/
case 10:
/**/
/* CAMPOS DE CHEGADA*/
/**/

     /*VALIDAR FROM E ATRIBUIR VAR SESSÃO*/
      if ($_POST['from'] != "") {
            $_POST['from'] = filter_var($_POST['from'], FILTER_SANITIZE_STRING);
            $from = $_POST['from'];
}

     /*VALIDAR TO E ATRIBUIR VAR SESSÃO*/
      if ($_POST['to'] != "") {
            $_POST['to'] = filter_var($_POST['to'], FILTER_SANITIZE_STRING);
            $to = $_POST['to'];
}

     /*VALIDAR PAX*/
      if ($_POST['pax'] != "") {
            $_POST['pax'] = filter_var($_POST['pax'], FILTER_SANITIZE_STRING);
            $pax = $_POST['pax'];
}

  /*VALIDAR ID PRODUTO*/
  if ($_POST['prod'] != "") {
           $prod = filter_var($_POST['prod'], FILTER_SANITIZE_NUMBER_INT);
            $id_prod = $prod;
            if (!filter_var($prod, FILTER_SANITIZE_NUMBER_INT)) {
               $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        }
     else {
             $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }

  /*VALIDAR ID TOTAL*/
  if ($_POST['pp'] != "") {
           $pp = filter_var($_POST['pp'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $total = $pp;
 }

   /*VALIDAR PREÇO*/
  if ($_POST['label'] != "") {
           $label = filter_var($_POST['label'], FILTER_SANITIZE_NUMBER_INT);
            $label_ok = $label;
            if (!filter_var($label, FILTER_SANITIZE_NUMBER_INT)) {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        }
     else {
           $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }

     /*VALIDAR LINGUAGEM CLIENTE E ATRIBUIR VAR SESSÃO*/
      if ($_POST['language'] != "") {
            $_POST['language'] = filter_var($_POST['language'], FILTER_SANITIZE_STRING);

            $language = $_POST['language'];

            if ($_POST['language'] == "") {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        } else {
            $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }


     /*VALIDAR RETORNO CLIENTE*/
      if ($_POST['oneway'] != "") {
            $_POST['oneway'] = filter_var($_POST['oneway'], FILTER_SANITIZE_STRING);

            $oneway = $_POST['oneway'];

            if ($_POST['oneway'] == "") {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        } else {
            $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }


     /*VALIDAR COD_PROMO*/
      if ($_POST['promo'] != "") {
            $_POST['promo'] = filter_var($_POST['promo'], FILTER_SANITIZE_STRING);

            $promo = $_POST['promo'];
}

     /*VALIDAR NR VOO CHEGADA */
        if ($_POST['arr_fl_nr'] != "") {
            $_POST['arr_fl_nr'] = filter_var($_POST['arr_fl_nr'], FILTER_SANITIZE_STRING);

            $arr_fl_nr = $_POST['arr_fl_nr'];

            if ($_POST['arr_fl_nr'] == "") {
                $errors .='<script>$(".vfn").text($(".ARRIVAL_FLIGHT_N").text());</script><font class="vfn"></font><br>';
            }
        } else {
            $errors .='<script>$(".vfn").text($(".ARRIVAL_FLIGHT_N").text());</script><font class="vfn"></font><br>';
        }
 

     /*VALIDAR DATA VOO CHEGADA*/
        if ($_POST['arr_fl_dt'] != "") {
            $_POST['arr_fl_dt'] = filter_var($_POST['arr_fl_dt'], FILTER_SANITIZE_STRING);

            $arr_fl_dt = $_POST['arr_fl_dt'];

            if ($_POST['arr_fl_dt'] == "") {
                $errors .='<script>$(".vfd").text($(".ARRIVAL_FLIGHT_DT").text());</script><font class="vfd"></font><br>';
            }
        } else {
            $errors .='<script>$(".vfd").text($(".ARRIVAL_FLIGHT_DT").text());</script><font class="vfd"></font><br>';
        }
 
     
 

     /*VALIDAR MORADA CHEGADA*/
        if ($_POST['arr_fl_addr'] != "") {
            $_POST['arr_fl_addr'] = filter_var($_POST['arr_fl_addr'], FILTER_SANITIZE_STRING);
            $arr_fl_addr = $_POST['arr_fl_addr'];
        }
/**/
/* CAMPOS DADOS PESSOAIS*/
/**/


     /*VALIDAR NOME CLIENTE*/
        if ($_POST['per_de_name'] != "") {
            $_POST['per_de_name'] = filter_var($_POST['per_de_name'], FILTER_SANITIZE_STRING);

            $per_de_name = $_POST['per_de_name'];

            if ($_POST['per_de_name'] == "") {
                $errors .='<script>$(".pdn").text($(".PERSONAL_DETAILS_NAME").text());</script><font class="pdn"></font><br>';
            }
        } else {
            $errors .='<script>$(".pdn").text($(".PERSONAL_DETAILS_NAME").text());</script><font class="pdn"></font><br>';
        }
 

        if ($_POST['per_de_email'] != "") {
            $email = filter_var($_POST['per_de_email'], FILTER_SANITIZE_EMAIL);

            $per_de_email = $email;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors .='<script>$(".pde").text($(".PERSONAL_DETAILS_EMAIL").text());</script><font class="pde"></font><br>';
            }
        } else {
            $errors .='<script>$(".pde").text($(".PERSONAL_DETAILS_EMAIL").text());</script><font class="pde"></font><br>';
        }

           if ($_POST['per_de_tel'] != "") {
           $tel = filter_var($_POST['per_de_tel'], FILTER_SANITIZE_NUMBER_INT);
            $per_de_tel = $tel;
        } 
     

     /*VALIDAR COUNTRY*/
        if ($_POST['per_de_country'] != "") {
            $_POST['per_de_country'] = filter_var($_POST['per_de_country'], FILTER_SANITIZE_STRING);
            $per_de_country = $_POST['per_de_country'];
        }

/**/
/* CAMPOS PASSAGEIROS*/
/**/

           if ($_POST['nr_pax_adu'] != "") {
            $adult = filter_var($_POST['nr_pax_adu'], FILTER_SANITIZE_NUMBER_INT);
            $nr_pax_adu = $adult;

            if (!filter_var($adult, FILTER_SANITIZE_NUMBER_INT)) {
               $errors .='<script>$(".adt").text($(".ADULT").text());</script><font class="adt"></font><br>';
            }
        } 
        else {
            $errors .='<script>$(".adt").text($(".ADULT").text());</script><font class="adt"></font><br>';
        }

if (filter_var($_POST['nr_pax_chi'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['nr_pax_chi'], FILTER_VALIDATE_INT) === false){

$children = filter_var($_POST['nr_pax_chi'], FILTER_SANITIZE_NUMBER_INT);
            $nr_pax_chi = $children;
}
   else {
                $errors .='<script>$(".chi").text($(".CHILDREN").text());</script><font class="chi"></font><br>';
            } 

    if (filter_var($_POST['nr_pax_ba'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['nr_pax_ba'], FILTER_VALIDATE_INT) === false){
     $baby = filter_var($_POST['nr_pax_ba'], FILTER_SANITIZE_NUMBER_INT);
     $nr_pax_ba = $baby;
}

       else {
                $errors .='<script>$(".bab").append($(".BABY").text());</script><font class="bab"></font><br>';
            } 

        if ($_POST['obs_txt'] != "") {
            $_POST['obs_txt'] = filter_var($_POST['obs_txt'], FILTER_SANITIZE_STRING);
            $obs_txt = $_POST["obs_txt"];
        }

        if ($_POST['payments_type'] != "") {
            $_POST['payments_type'] = filter_var($_POST['payments_type'], FILTER_SANITIZE_STRING);

            $payments_type = $_POST['payments_type'];

            if ($_POST['payments_type'] == "") {
                 $errors .='<script>$(".pag").text($(".PAYMENTS_MET_LABEL").text());</script><font class="pag"></font><br>';
            }
        } else {
            $errors .='<script>$(".pag").text($(".PAYMENTS_MET_LABEL").text());</script><font class="pag"></font><br>';
        }

        if (!$errors) {


         if($payments_type == 'Paypal')


$obter_comp=" SELECT pp_taxa FROM companhia WHERE 1";
 $result_comp = mysqli_query($conn, $obter_comp);
  if (mysqli_num_rows($result_comp) > 0) {
    while($row = mysqli_fetch_assoc($result_comp)) {
     $c_pp_taxa = $row["pp_taxa"]/100;
    }
   }

            $total = $total*$c_pp_taxa + $total;




          $res[] = array
           (
            'errors' => 0,
            'voo_n_che' => $arr_fl_nr,
            'voo_che_dt' => $arr_fl_dt,
            'voo_che_tm' => $arr_fl_tm,
            'voo_che_mor' => $arr_fl_addr,
      
            'nome' => $per_de_name,
            'email' => $per_de_email, 
            'tel' => $per_de_tel,
            'country' => $per_de_country,

            'adult' => $nr_pax_adu,
            'children' => $nr_pax_chi,
            'baby' => $nr_pax_ba,

            'obs' => $obs_txt,
            'payments' => $payments_type,

            'id' => $id_prod,
            'id_price' => $label_ok,

            'lang' => $language,
            'promo' => $promo,
            'oneway' => $oneway,

            'from' => $from,
            'to' => $to,
            'pax' => $pax,
            'total' => $total);

           echo json_encode($res);
        } else {
 
         $not[] = array
           (
            'errors' => 1,  
            'invalid' => $errors);
            echo json_encode($not);
        }
break;



/*VERIFICAR DADOS TRANSFER AEROPORTO PARTIDA F3*/

case 11:
/**/
/* CAMPOS DE CHEGADA*/
/**/

     /*VALIDAR FROM E ATRIBUIR VAR SESSÃO*/
      if ($_POST['from'] != "") {
            $_POST['from'] = filter_var($_POST['from'], FILTER_SANITIZE_STRING);
            $from = $_POST['from'];
}

     /*VALIDAR TO E ATRIBUIR VAR SESSÃO*/
      if ($_POST['to'] != "") {
            $_POST['to'] = filter_var($_POST['to'], FILTER_SANITIZE_STRING);
            $to = $_POST['to'];
}

     /*VALIDAR PAX*/
      if ($_POST['pax'] != "") {
            $_POST['pax'] = filter_var($_POST['pax'], FILTER_SANITIZE_STRING);
            $pax = $_POST['pax'];
}

  /*VALIDAR ID PRODUTO*/
  if ($_POST['prod'] != "") {
           $prod = filter_var($_POST['prod'], FILTER_SANITIZE_NUMBER_INT);
            $id_prod = $prod;
            if (!filter_var($prod, FILTER_SANITIZE_NUMBER_INT)) {
               $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        }
     else {
             $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }

  /*VALIDAR ID TOTAL*/
  if ($_POST['pp'] != "") {
           $pp = filter_var($_POST['pp'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $total = $pp;
 }

   /*VALIDAR PREÇO*/
  if ($_POST['label'] != "") {
           $label = filter_var($_POST['label'], FILTER_SANITIZE_NUMBER_INT);
            $label_ok = $label;
            if (!filter_var($label, FILTER_SANITIZE_NUMBER_INT)) {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        }
     else {
           $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }

     /*VALIDAR LINGUAGEM CLIENTE E ATRIBUIR VAR SESSÃO*/
      if ($_POST['language'] != "") {
            $_POST['language'] = filter_var($_POST['language'], FILTER_SANITIZE_STRING);

            $language = $_POST['language'];

            if ($_POST['language'] == "") {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        } else {
            $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }


     /*VALIDAR RETORNO CLIENTE*/
      if ($_POST['oneway'] != "") {
            $_POST['oneway'] = filter_var($_POST['oneway'], FILTER_SANITIZE_STRING);

            $oneway = $_POST['oneway'];

            if ($_POST['oneway'] == "") {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        } else {
            $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }


     /*VALIDAR COD_PROMO*/
      if ($_POST['promo'] != "") {
            $_POST['promo'] = filter_var($_POST['promo'], FILTER_SANITIZE_STRING);

            $promo = $_POST['promo'];
}
 
/**/
/* CAMPOS DE PARTIDA*/
/**/

  /*VALIDAR NR VOO PARTIDA*/
        if ($_POST['dep_fl_nr'] != "") {
            $_POST['dep_fl_nr'] = filter_var($_POST['dep_fl_nr'], FILTER_SANITIZE_STRING);
            $dep_fl_nr = $_POST['dep_fl_nr'];

            if ($_POST['dep_fl_nr'] == "") {
               $errors .='<script>$(".vdn").text($(".DEPARTURE_FLIGHT_N").text());</script><font class="vdn"></font><br>';
            }
        } else {
           $errors .='<script>$(".vdn").text($(".DEPARTURE_FLIGHT_N").text());</script><font class="vdn"></font><br>';
        }
 

     /*VALIDAR DATA VOO PARTIDA*/
        if ($_POST['dep_fl_dt'] != "") {
            $_POST['dep_fl_dt'] = filter_var($_POST['dep_fl_dt'], FILTER_SANITIZE_STRING);

            $dep_fl_dt = $_POST['dep_fl_dt'];

            if ($_POST['dep_fl_dt'] == "") {
                $errors .='<script>$(".vdn").text($(".DEPARTURE_FLIGHT_N").text());</script><font class="vdn"></font><br>';
            }
        } else {
             $errors .='<script>$(".vdn").text($(".DEPARTURE_FLIGHT_N").text());</script><font class="vdn"></font><br>';
        }


     /*VALIDAR HORA/DATA PICK-UP*/
        if ($_POST['dep_fl_tr_time'] != "") {
            $_POST['dep_fl_tr_time'] = filter_var($_POST['dep_fl_tr_time'], FILTER_SANITIZE_STRING);

            $dep_fl_tr_time = $_POST['dep_fl_tr_time'];

            if ($_POST['dep_fl_tr_time'] == "") {
                $errors .='<script>$(".vdpu").text($(".DEPARTURE_FLIGHT_TR_TIME").text());</script><font class="vdpu"></font><br>';
            }
        } else {
            $errors .='<script>$(".vdpu").text($(".DEPARTURE_FLIGHT_TR_TIME").text());</script><font class="vdpu"></font><br>';
        }

     /*VALIDAR MORADA PARTIDA*/
        if ($_POST['dep_fl_addr'] != "") {
            $_POST['dep_fl_addr'] = filter_var($_POST['dep_fl_addr'], FILTER_SANITIZE_STRING);
            $dep_fl_addr = $_POST['dep_fl_addr'];
        }
 
/**/
/* CAMPOS DADOS PESSOAIS*/
/**/


     /*VALIDAR NOME CLIENTE*/
        if ($_POST['per_de_name'] != "") {
            $_POST['per_de_name'] = filter_var($_POST['per_de_name'], FILTER_SANITIZE_STRING);

            $per_de_name = $_POST['per_de_name'];

            if ($_POST['per_de_name'] == "") {
                $errors .='<script>$(".pdn").text($(".PERSONAL_DETAILS_NAME").text());</script><font class="pdn"></font><br>';
            }
        } else {
            $errors .='<script>$(".pdn").text($(".PERSONAL_DETAILS_NAME").text());</script><font class="pdn"></font><br>';
        }
 

        if ($_POST['per_de_email'] != "") {
            $email = filter_var($_POST['per_de_email'], FILTER_SANITIZE_EMAIL);

            $per_de_email = $email;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors .='<script>$(".pde").text($(".PERSONAL_DETAILS_EMAIL").text());</script><font class="pde"></font><br>';
            }
        } else {
            $errors .='<script>$(".pde").text($(".PERSONAL_DETAILS_EMAIL").text());</script><font class="pde"></font><br>';
        }

           if ($_POST['per_de_tel'] != "") {
           $tel = filter_var($_POST['per_de_tel'], FILTER_SANITIZE_NUMBER_INT);
            $per_de_tel = $tel;
        } 
     

     /*VALIDAR COUNTRY*/
        if ($_POST['per_de_country'] != "") {
            $_POST['per_de_country'] = filter_var($_POST['per_de_country'], FILTER_SANITIZE_STRING);
            $per_de_country = $_POST['per_de_country'];
        }

/**/
/* CAMPOS PASSAGEIROS*/
/**/

           if ($_POST['nr_pax_adu'] != "") {
            $adult = filter_var($_POST['nr_pax_adu'], FILTER_SANITIZE_NUMBER_INT);
            $nr_pax_adu = $adult;

            if (!filter_var($adult, FILTER_SANITIZE_NUMBER_INT)) {
               $errors .='<script>$(".adt").text($(".ADULT").text());</script><font class="adt"></font><br>';
            }
        } 
        else {
            $errors .='<script>$(".adt").text($(".ADULT").text());</script><font class="adt"></font><br>';
        }

if (filter_var($_POST['nr_pax_chi'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['nr_pax_chi'], FILTER_VALIDATE_INT) === false){

$children = filter_var($_POST['nr_pax_chi'], FILTER_SANITIZE_NUMBER_INT);
            $nr_pax_chi = $children;
}
   else {
                $errors .='<script>$(".chi").text($(".CHILDREN").text());</script><font class="chi"></font><br>';
            } 

    if (filter_var($_POST['nr_pax_ba'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['nr_pax_ba'], FILTER_VALIDATE_INT) === false){
     $baby = filter_var($_POST['nr_pax_ba'], FILTER_SANITIZE_NUMBER_INT);
     $nr_pax_ba = $baby;
}

       else {
                $errors .='<script>$(".bab").append($(".BABY").text());</script><font class="bab"></font><br>';
            } 

        if ($_POST['obs_txt'] != "") {
            $_POST['obs_txt'] = filter_var($_POST['obs_txt'], FILTER_SANITIZE_STRING);
            $obs_txt = $_POST["obs_txt"];
        }

        if ($_POST['payments_type'] != "") {
            $_POST['payments_type'] = filter_var($_POST['payments_type'], FILTER_SANITIZE_STRING);

            $payments_type = $_POST['payments_type'];

            if ($_POST['payments_type'] == "") {
                 $errors .='<script>$(".pag").text($(".PAYMENTS_MET_LABEL").text());</script><font class="pag"></font><br>';
            }
        } else {
            $errors .='<script>$(".pag").text($(".PAYMENTS_MET_LABEL").text());</script><font class="pag"></font><br>';
        }

        if (!$errors) {


         if($payments_type == 'Paypal')


  

$obter_comp=" SELECT pp_taxa FROM companhia WHERE 1";
 $result_comp = mysqli_query($conn, $obter_comp);
  if (mysqli_num_rows($result_comp) > 0) {
    while($row = mysqli_fetch_assoc($result_comp)) {
     $c_pp_taxa = $row["pp_taxa"];
    }
   }

            $total = $total*($c_pp_taxa/100) + $total;



          $res[] = array
           (
            'errors' => 0,
            'voo_n_dep' => $dep_fl_nr,
            'voo_dep_dt' => $dep_fl_dt,
            'voo_dep_pick' => $dep_fl_tr_time,
            'voo_dep_mor' => $dep_fl_addr,
      
            'nome' => $per_de_name,
            'email' => $per_de_email, 
            'tel' => $per_de_tel,
            'country' => $per_de_country,

            'adult' => $nr_pax_adu,
            'children' => $nr_pax_chi,
            'baby' => $nr_pax_ba,

            'obs' => $obs_txt,
            'payments' => $payments_type,

            'id' => $id_prod,
            'id_price' => $label_ok,

            'lang' => $language,
            'promo' => $promo,
            'oneway' => $oneway,

            'from' => $from,
            'to' => $to,
            'pax' => $pax,
            'total' =>$total);

           echo json_encode($res);
        } else {
 
         $not[] = array
           (
            'errors' => 1,  
            'invalid' => $errors);
            echo json_encode($not);
        }
break;


/*VERIFICAR DADOS INTERZONE IDA E VOLTA F4*/
case 12:
/**/
/* CAMPOS DE CHEGADA*/
/**/

     /*VALIDAR FROM E ATRIBUIR VAR SESSÃO*/
      if ($_POST['from'] != "") {
            $_POST['from'] = filter_var($_POST['from'], FILTER_SANITIZE_STRING);
            $from = $_POST['from'];
}

     /*VALIDAR TO E ATRIBUIR VAR SESSÃO*/
      if ($_POST['to'] != "") {
            $_POST['to'] = filter_var($_POST['to'], FILTER_SANITIZE_STRING);
            $to = $_POST['to'];
}

     /*VALIDAR PAX*/
      if ($_POST['pax'] != "") {
            $_POST['pax'] = filter_var($_POST['pax'], FILTER_SANITIZE_STRING);
            $pax = $_POST['pax'];
}

  /*VALIDAR ID PRODUTO*/
  if ($_POST['prod'] != "") {
           $prod = filter_var($_POST['prod'], FILTER_SANITIZE_NUMBER_INT);
            $id_prod = $prod;
            if (!filter_var($prod, FILTER_SANITIZE_NUMBER_INT)) {
               $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        }
     else {
             $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }

  /*VALIDAR ID TOTAL*/
  if ($_POST['pp'] != "") {
           $pp = filter_var($_POST['pp'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $total = $pp;
 }

   /*VALIDAR PREÇO*/
  if ($_POST['label'] != "") {
           $label = filter_var($_POST['label'], FILTER_SANITIZE_NUMBER_INT);
            $label_ok = $label;
            if (!filter_var($label, FILTER_SANITIZE_NUMBER_INT)) {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        }
     else {
           $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }

     /*VALIDAR LINGUAGEM CLIENTE E ATRIBUIR VAR SESSÃO*/
      if ($_POST['language'] != "") {
            $_POST['language'] = filter_var($_POST['language'], FILTER_SANITIZE_STRING);

            $language = $_POST['language'];

            if ($_POST['language'] == "") {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        } else {
            $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }


     /*VALIDAR RETORNO CLIENTE*/
      if ($_POST['oneway'] != "") {
            $_POST['oneway'] = filter_var($_POST['oneway'], FILTER_SANITIZE_STRING);

            $oneway = $_POST['oneway'];

            if ($_POST['oneway'] == "") {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        } else {
            $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }


     /*VALIDAR COD_PROMO*/
      if ($_POST['promo'] != "") {
            $_POST['promo'] = filter_var($_POST['promo'], FILTER_SANITIZE_STRING);

            $promo = $_POST['promo'];
}

 

     /*VALIDAR DATA VOO CHEGADA*/
        if ($_POST['arr_fl_dt'] != "") {
            $_POST['arr_fl_dt'] = filter_var($_POST['arr_fl_dt'], FILTER_SANITIZE_STRING);

            $arr_fl_dt = $_POST['arr_fl_dt'];

            if ($_POST['arr_fl_dt'] == "") {
                $errors .='<script>$(".vfd").text($(".ARRIVAL_FLIGHT_DT").text());</script><font class="vfd"></font><br>';
            }
        } else {
            $errors .='<script>$(".vfd").text($(".ARRIVAL_FLIGHT_DT").text());</script><font class="vfd"></font><br>';
        }
 
     
 

     /*VALIDAR MORADA CHEGADA*/
        if ($_POST['arr_fl_addr'] != "") {
            $_POST['arr_fl_addr'] = filter_var($_POST['arr_fl_addr'], FILTER_SANITIZE_STRING);
            $arr_fl_addr = $_POST['arr_fl_addr'];
        }


        if ($_POST['arr_dep_addr'] != "") {
            $_POST['arr_dep_addr'] = filter_var($_POST['arr_dep_addr'], FILTER_SANITIZE_STRING);
            $arr_dep_addr = $_POST['arr_dep_addr'];
        }
 
 
/**/
/* CAMPOS DADOS PESSOAIS*/
/**/


     /*VALIDAR NOME CLIENTE*/
        if ($_POST['per_de_name'] != "") {
            $_POST['per_de_name'] = filter_var($_POST['per_de_name'], FILTER_SANITIZE_STRING);

            $per_de_name = $_POST['per_de_name'];

            if ($_POST['per_de_name'] == "") {
                $errors .='<script>$(".pdn").text($(".PERSONAL_DETAILS_NAME").text());</script><font class="pdn"></font><br>';
            }
        } else {
            $errors .='<script>$(".pdn").text($(".PERSONAL_DETAILS_NAME").text());</script><font class="pdn"></font><br>';
        }
 

        if ($_POST['per_de_email'] != "") {
            $email = filter_var($_POST['per_de_email'], FILTER_SANITIZE_EMAIL);

            $per_de_email = $email;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors .='<script>$(".pde").text($(".PERSONAL_DETAILS_EMAIL").text());</script><font class="pde"></font><br>';
            }
        } else {
            $errors .='<script>$(".pde").text($(".PERSONAL_DETAILS_EMAIL").text());</script><font class="pde"></font><br>';
        }

           if ($_POST['per_de_tel'] != "") {
           $tel = filter_var($_POST['per_de_tel'], FILTER_SANITIZE_NUMBER_INT);
            $per_de_tel = $tel;
        } 
     

     /*VALIDAR COUNTRY*/
        if ($_POST['per_de_country'] != "") {
            $_POST['per_de_country'] = filter_var($_POST['per_de_country'], FILTER_SANITIZE_STRING);
            $per_de_country = $_POST['per_de_country'];
        }

/**/
/* CAMPOS PASSAGEIROS*/
/**/

           if ($_POST['nr_pax_adu'] != "") {
            $adult = filter_var($_POST['nr_pax_adu'], FILTER_SANITIZE_NUMBER_INT);
            $nr_pax_adu = $adult;

            if (!filter_var($adult, FILTER_SANITIZE_NUMBER_INT)) {
               $errors .='<script>$(".adt").text($(".ADULT").text());</script><font class="adt"></font><br>';
            }
        } 
        else {
            $errors .='<script>$(".adt").text($(".ADULT").text());</script><font class="adt"></font><br>';
        }

if (filter_var($_POST['nr_pax_chi'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['nr_pax_chi'], FILTER_VALIDATE_INT) === false){

$children = filter_var($_POST['nr_pax_chi'], FILTER_SANITIZE_NUMBER_INT);
            $nr_pax_chi = $children;
}
   else {
                $errors .='<script>$(".chi").text($(".CHILDREN").text());</script><font class="chi"></font><br>';
            } 

    if (filter_var($_POST['nr_pax_ba'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['nr_pax_ba'], FILTER_VALIDATE_INT) === false){
     $baby = filter_var($_POST['nr_pax_ba'], FILTER_SANITIZE_NUMBER_INT);
     $nr_pax_ba = $baby;
}

       else {
                $errors .='<script>$(".bab").append($(".BABY").text());</script><font class="bab"></font><br>';
            } 

        if ($_POST['obs_txt'] != "") {
            $_POST['obs_txt'] = filter_var($_POST['obs_txt'], FILTER_SANITIZE_STRING);
            $obs_txt = $_POST["obs_txt"];
        }

        if ($_POST['payments_type'] != "") {
            $_POST['payments_type'] = filter_var($_POST['payments_type'], FILTER_SANITIZE_STRING);

            $payments_type = $_POST['payments_type'];

            if ($_POST['payments_type'] == "") {
                 $errors .='<script>$(".pag").text($(".PAYMENTS_MET_LABEL").text());</script><font class="pag"></font><br>';
            }
        } else {
            $errors .='<script>$(".pag").text($(".PAYMENTS_MET_LABEL").text());</script><font class="pag"></font><br>';
        }

        if (!$errors) {


         if($payments_type == 'Paypal')


$obter_comp=" SELECT pp_taxa FROM companhia WHERE 1";
 $result_comp = mysqli_query($conn, $obter_comp);
  if (mysqli_num_rows($result_comp) > 0) {
    while($row = mysqli_fetch_assoc($result_comp)) {
     $c_pp_taxa = $row["pp_taxa"];
    }
   }

            $total = $total*($c_pp_taxa/100) + $total;


          $res[] = array
           (
            'errors' => 0,
            'voo_che_dt' => $arr_fl_dt,
            'voo_che_tm' => $arr_fl_tm,
            'voo_che_mor' => $arr_fl_addr,

            'voo_dep_mor' => $arr_dep_addr,
      
            'nome' => $per_de_name,
            'email' => $per_de_email, 
            'tel' => $per_de_tel,
            'country' => $per_de_country,

            'adult' => $nr_pax_adu,
            'children' => $nr_pax_chi,
            'baby' => $nr_pax_ba,

            'obs' => $obs_txt,
            'payments' => $payments_type,

            'id' => $id_prod,
            'id_price' => $label_ok,

            'lang' => $language,
            'promo' => $promo,
            'oneway' => $oneway,

            'from' => $from,
            'to' => $to,
            'pax' => $pax,
            'total' => $total);

           echo json_encode($res);
        } else {
 
         $not[] = array
           (
            'errors' => 1,  
            'invalid' => $errors);
            echo json_encode($not);
        }
break;



/*VERIFICAR DADOS INTERZONE IDA E VOLTA F5*/
case 13:
/**/
/* CAMPOS DE CHEGADA*/
/**/

     /*VALIDAR FROM E ATRIBUIR VAR SESSÃO*/
      if ($_POST['from'] != "") {
            $_POST['from'] = filter_var($_POST['from'], FILTER_SANITIZE_STRING);
            $from = $_POST['from'];
}

     /*VALIDAR TO E ATRIBUIR VAR SESSÃO*/
      if ($_POST['to'] != "") {
            $_POST['to'] = filter_var($_POST['to'], FILTER_SANITIZE_STRING);
            $to = $_POST['to'];
}

     /*VALIDAR PAX*/
      if ($_POST['pax'] != "") {
            $_POST['pax'] = filter_var($_POST['pax'], FILTER_SANITIZE_STRING);
            $pax = $_POST['pax'];
}

  /*VALIDAR ID PRODUTO*/
  if ($_POST['prod'] != "") {
           $prod = filter_var($_POST['prod'], FILTER_SANITIZE_NUMBER_INT);
            $id_prod = $prod;
            if (!filter_var($prod, FILTER_SANITIZE_NUMBER_INT)) {
               $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        }
     else {
             $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }

  /*VALIDAR ID TOTAL*/
  if ($_POST['pp'] != "") {
           $pp = filter_var($_POST['pp'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $total = $pp;
 }

   /*VALIDAR PREÇO*/
  if ($_POST['label'] != "") {
           $label = filter_var($_POST['label'], FILTER_SANITIZE_NUMBER_INT);
            $label_ok = $label;
            if (!filter_var($label, FILTER_SANITIZE_NUMBER_INT)) {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        }
     else {
           $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }

     /*VALIDAR LINGUAGEM CLIENTE E ATRIBUIR VAR SESSÃO*/
      if ($_POST['language'] != "") {
            $_POST['language'] = filter_var($_POST['language'], FILTER_SANITIZE_STRING);

            $language = $_POST['language'];

            if ($_POST['language'] == "") {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        } else {
            $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }


     /*VALIDAR RETORNO CLIENTE*/
      if ($_POST['oneway'] != "") {
            $_POST['oneway'] = filter_var($_POST['oneway'], FILTER_SANITIZE_STRING);

            $oneway = $_POST['oneway'];

            if ($_POST['oneway'] == "") {
                $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
            }
        } else {
            $errors .='<script>$(".d_err").text($(".DATA_ERROR").text());</script><font class="d_err"></font><br>';
        }


     /*VALIDAR COD_PROMO*/
      if ($_POST['promo'] != "") {
            $_POST['promo'] = filter_var($_POST['promo'], FILTER_SANITIZE_STRING);

            $promo = $_POST['promo'];
}


     /*VALIDAR DATA VOO CHEGADA*/
        if ($_POST['arr_fl_dt'] != "") {
            $_POST['arr_fl_dt'] = filter_var($_POST['arr_fl_dt'], FILTER_SANITIZE_STRING);

            $arr_fl_dt = $_POST['arr_fl_dt'];

            if ($_POST['arr_fl_dt'] == "") {
                $errors .='<script>$(".vfd").text($(".ARRIVAL_FLIGHT_DT").text());</script><font class="vfd"></font><br>';
            }
        } else {
            $errors .='<script>$(".vfd").text($(".ARRIVAL_FLIGHT_DT").text());</script><font class="vfd"></font><br>';
        }
 

     /*VALIDAR MORADA CHEGADA*/
        if ($_POST['arr_fl_addr'] != "") {
            $_POST['arr_fl_addr'] = filter_var($_POST['arr_fl_addr'], FILTER_SANITIZE_STRING);
            $arr_fl_addr = $_POST['arr_fl_addr'];
        }

        if ($_POST['dep_fl_addr2'] != "") {
            $_POST['dep_fl_addr2'] = filter_var($_POST['dep_fl_addr2'], FILTER_SANITIZE_STRING);
            $dep_fl_addr2= $_POST['dep_fl_addr2'];
        }
 
/**/
/* CAMPOS DE PARTIDA*/
/**/
 

     /*VALIDAR DATA VOO PARTIDA*/
        if ($_POST['dep_fl_dt'] != "") {
            $_POST['dep_fl_dt'] = filter_var($_POST['dep_fl_dt'], FILTER_SANITIZE_STRING);

            $dep_fl_dt = $_POST['dep_fl_dt'];

            if ($_POST['dep_fl_dt'] == "") {
                $errors .='<script>$(".vdn").text($(".DEPARTURE_FLIGHT_N").text());</script><font class="vdn"></font><br>';
            }
        } else {
             $errors .='<script>$(".vdn").text($(".DEPARTURE_FLIGHT_N").text());</script><font class="vdn"></font><br>';
        }

     /*VALIDAR MORADA PARTIDA*/
        if ($_POST['dep_fl_addr'] != "") {
            $_POST['dep_fl_addr'] = filter_var($_POST['dep_fl_addr'], FILTER_SANITIZE_STRING);
            $dep_fl_addr = $_POST['dep_fl_addr'];
        }

        if ($_POST['dep_fl_addr3'] != "") {
            $_POST['dep_fl_addr3'] = filter_var($_POST['dep_fl_addr3'], FILTER_SANITIZE_STRING);
            $dep_fl_addr3 = $_POST['dep_fl_addr3'];
        }

 
/**/
/* CAMPOS DADOS PESSOAIS*/
/**/


     /*VALIDAR NOME CLIENTE*/
        if ($_POST['per_de_name'] != "") {
            $_POST['per_de_name'] = filter_var($_POST['per_de_name'], FILTER_SANITIZE_STRING);

            $per_de_name = $_POST['per_de_name'];

            if ($_POST['per_de_name'] == "") {
                $errors .='<script>$(".pdn").text($(".PERSONAL_DETAILS_NAME").text());</script><font class="pdn"></font><br>';
            }
        } else {
            $errors .='<script>$(".pdn").text($(".PERSONAL_DETAILS_NAME").text());</script><font class="pdn"></font><br>';
        }
 

        if ($_POST['per_de_email'] != "") {
            $email = filter_var($_POST['per_de_email'], FILTER_SANITIZE_EMAIL);

            $per_de_email = $email;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors .='<script>$(".pde").text($(".PERSONAL_DETAILS_EMAIL").text());</script><font class="pde"></font><br>';
            }
        } else {
            $errors .='<script>$(".pde").text($(".PERSONAL_DETAILS_EMAIL").text());</script><font class="pde"></font><br>';
        }

           if ($_POST['per_de_tel'] != "") {
           $tel = filter_var($_POST['per_de_tel'], FILTER_SANITIZE_NUMBER_INT);
            $per_de_tel = $tel;
        } 
     

     /*VALIDAR COUNTRY*/
        if ($_POST['per_de_country'] != "") {
            $_POST['per_de_country'] = filter_var($_POST['per_de_country'], FILTER_SANITIZE_STRING);
            $per_de_country = $_POST['per_de_country'];
        }

/**/
/* CAMPOS PASSAGEIROS*/
/**/

           if ($_POST['nr_pax_adu'] != "") {
            $adult = filter_var($_POST['nr_pax_adu'], FILTER_SANITIZE_NUMBER_INT);
            $nr_pax_adu = $adult;

            if (!filter_var($adult, FILTER_SANITIZE_NUMBER_INT)) {
               $errors .='<script>$(".adt").text($(".ADULT").text());</script><font class="adt"></font><br>';
            }
        } 
        else {
            $errors .='<script>$(".adt").text($(".ADULT").text());</script><font class="adt"></font><br>';
        }

if (filter_var($_POST['nr_pax_chi'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['nr_pax_chi'], FILTER_VALIDATE_INT) === false){

$children = filter_var($_POST['nr_pax_chi'], FILTER_SANITIZE_NUMBER_INT);
            $nr_pax_chi = $children;
}
   else {
                $errors .='<script>$(".chi").text($(".CHILDREN").text());</script><font class="chi"></font><br>';
            } 

    if (filter_var($_POST['nr_pax_ba'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['nr_pax_ba'], FILTER_VALIDATE_INT) === false){
     $baby = filter_var($_POST['nr_pax_ba'], FILTER_SANITIZE_NUMBER_INT);
     $nr_pax_ba = $baby;
}

       else {
                $errors .='<script>$(".bab").append($(".BABY").text());</script><font class="bab"></font><br>';
            } 

        if ($_POST['obs_txt'] != "") {
            $_POST['obs_txt'] = filter_var($_POST['obs_txt'], FILTER_SANITIZE_STRING);
            $obs_txt = $_POST["obs_txt"];
        }

        if ($_POST['payments_type'] != "") {
            $_POST['payments_type'] = filter_var($_POST['payments_type'], FILTER_SANITIZE_STRING);

            $payments_type = $_POST['payments_type'];

            if ($_POST['payments_type'] == "") {
                 $errors .='<script>$(".pag").text($(".PAYMENTS_MET_LABEL").text());</script><font class="pag"></font><br>';
            }
        } else {
            $errors .='<script>$(".pag").text($(".PAYMENTS_MET_LABEL").text());</script><font class="pag"></font><br>';
        }

        if (!$errors) {


         if($payments_type == 'Paypal')

$obter_comp=" SELECT pp_taxa FROM companhia WHERE 1";
 $result_comp = mysqli_query($conn, $obter_comp);
  if (mysqli_num_rows($result_comp) > 0) {
    while($row = mysqli_fetch_assoc($result_comp)) {
     $c_pp_taxa = $row["pp_taxa"];
    }
   }

            $total = $total*($c_pp_taxa/100) + $total;

          $res[] = array
           (
            'errors' => 0,
            'voo_che_dt' => $arr_fl_dt,
            'voo_che_mor' => $arr_fl_addr,
            'voo_dep_mor2' => $dep_fl_addr2,

            'voo_dep_dt' => $dep_fl_dt,
            'voo_dep_mor' => $dep_fl_addr,
            'voo_dep_mor3' => $dep_fl_addr3,
      
            'nome' => $per_de_name,
            'email' => $per_de_email, 
            'tel' => $per_de_tel,
            'country' => $per_de_country,

            'adult' => $nr_pax_adu,
            'children' => $nr_pax_chi,
            'baby' => $nr_pax_ba,

            'obs' => $obs_txt,
            'payments' => $payments_type,

            'id' => $id_prod,
            'id_price' => $label_ok,

            'lang' => $language,
            'promo' => $promo,
            'oneway' => $oneway,

            'from' => $from,
            'to' => $to,
            'pax' => $pax,
            'total' => $total);

           echo json_encode($res);
        } else {
 
         $not[] = array
           (
            'errors' => 1,  
            'invalid' => $errors);
            echo json_encode($not);
        }
break;


/*OBTER DEFINICOES LOJA*/

case '99':
$obter_comp=" SELECT * FROM companhia WHERE 1";
$result = mysqli_query($conn, $obter_comp);
while($obj = mysqli_fetch_object($result)) {
$a[] = $obj;}
if ($result){

 $date = date('d/m/Y');
 $date_array_i=explode('/',trim($date));
 $time=strtotime($date_array_i[2].'-'.$date_array_i[1].'-'.$date_array_i[0].'-00');

 $promo=" SELECT nome AS nm_code, percentagem  FROM codigo_promo WHERE visivel = 1 AND ativo = 1 AND data_ini <= $time AND data_fim >= $time";
 $result_pr = mysqli_query($conn, $promo);

 while($obj = mysqli_fetch_object($result_pr)) {
  $b[] = $obj;}

 $errors = array_filter($b);
 if (empty($errors))
  $b[] = array('nm_code' => '', 'percentagem' => '');
}

$x = array_merge($a,$b);
echo json_encode($x);
break;























/*SE A VIAGEM TEM RETORNO*/
case '7':
$id_label = $_POST['id_label'];
$id_prod =  $_POST['id_prod'];
$return = $_POST['return'];
$cat = $_POST['categoria'];

$dominio = $_POST['dominio'];

$query2 = "SELECT id FROM `operador` WHERE dominio='$dominio' AND loja='checked' LIMIT 1";
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_assoc($result2);


$id = $row['id'];



$date_array=explode(' ',trim($_POST['dep_fl_dt']));
$dias=explode('/',trim($date_array[0]));
$dias_d=strtotime($dias[2].'-'.$dias[1].'-'.$dias[0].'-00'); 
$horas=strtotime($dias[2].'-'.$dias[1].'-'.$dias[0].' '.$date_array[1]);




$time_diff = $horas-$dias_d;


$obter_comp=" SELECT * FROM companhia WHERE 1";
            $result_comp = mysqli_query($conn, $obter_comp);
              if (mysqli_num_rows($result_comp) > 0) 
              {
                  while($row = mysqli_fetch_assoc($result_comp)) 
                  {
                    $noturno = $row["noturno"];
                  }
              }

$valor_time_noturno=explode(',',trim($noturno));



if ($time_diff <= $valor_time_noturno[1] || $time_diff >= $valor_time_noturno[0])
{
  $query = "SELECT valor FROM operador_noturno WHERE id_categoria = $cat AND prod_id = $id_prod AND id_operador = $id AND id_label = $id_label";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
  $array[] = array('valor' => $row['valor']*2);
  

  
  }
  }
}
else
{
  $query = "SELECT valor FROM operador_precos WHERE id_categoria = $cat AND prod_id = $id_prod AND id_operador = $id AND id_label = $id_label";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {

  $array[] = array('valor' => $row['valor']*2);
  
  }
}
}









echo json_encode($array);












}
mysqli_close($conn);
?>
