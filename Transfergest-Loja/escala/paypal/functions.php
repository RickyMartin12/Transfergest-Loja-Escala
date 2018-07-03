<?php

require_once('../connect.php');

function domainUrl(){

global $conn;
$obter_comp=" SELECT site FROM companhia WHERE 1";
 $result_comp = mysqli_query($conn, $obter_comp);
  if (mysqli_num_rows($result_comp) > 0) {
    while($row = mysqli_fetch_assoc($result_comp)) {
     $domain = $row["site"];
    }
   }
 return $domain;
}



function dataEmail(){
 global $conn;

$obter_comp=" SELECT pp_email FROM companhia WHERE 1";
 $result_comp = mysqli_query($conn, $obter_comp);
  if (mysqli_num_rows($result_comp) > 0) {
    while($row = mysqli_fetch_assoc($result_comp)) {
     $c_pp_email = $row["pp_email"];
    }
   }
 return $c_pp_email;
}


function dataFromDb($ref,$date){
        global $conn;

$c_ref = "SELECT nome_cl,cobrar_operador,local_entrega,local_recolha,email 
FROM excel 
WHERE referencia = '$ref' AND data_criacao = '$date' 
ORDER BY id ASC 
LIMIT 1";

        $result_ref = mysqli_query($conn, $c_ref);
        if (mysqli_num_rows($result_ref) > 0) {
          while($row = mysqli_fetch_assoc($result_ref)) {
           $data['first_name'] = $row['nome_cl'];
           $data['item_amount'] = $row['cobrar_operador'];
           $data['item_name'] = $row['local_recolha'].'-'.$row['local_entrega'];
           $data['payer_email'] = $row['email'];
      }
}
return $data;

$conn->close();
}

function check_txnid($tnxid){
	global $conn;
	return true;
	//$valid_txnid = true;
	//get result set
	//$sql = mysqli_query("SELECT * FROM `payments` WHERE txnid = '$tnxid'");
	//if ($row = mysql_fetch_array($sql)) {
	//	$valid_txnid = false;
	//}
	//return $valid_txnid;
         $conn->close();
}

function check_price($price, $id){
	$valid_price = true;
/*
        $c_ref = "SELECT * FROM excel WHERE referencia = '$id' LIMIT 1";
        $result_ref = mysqli_query($conn, $c_ref);
        if (mysqli_num_rows($result_ref) > 0) {
          while($row = mysqli_fetch_assoc($result_ref)) {
            $num = (float)$row['cobrar_operador'];
		if($num == $price){
		     $valid_price = true;
                }
           }
        }
*/


        return $valid_price;
}



function updatePayments($data){
  global $conn;

  if (is_array($data)) {
     $sql = "INSERT INTO  payments (txnid,payment_amount,payment_status,itemid,createdtime)
VALUES ('".$data['txn_id']."' ,
		'".$data['mc_gross']."' ,
		'".$data['payment_status']."' ,
		'".$data['item_number']."' ,
		'".date("Y-m-d H:i:s")."')";

      if ($conn->query($sql) === TRUE)
          return mysqli_insert_id($conn);
   }
   $conn->close();
}


