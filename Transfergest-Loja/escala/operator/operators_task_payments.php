<?php
require_once '../connect.php';
$servico='';

$admin=" SELECT email, nome FROM companhia";
$result = mysqli_query($conn, $admin);
      if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result))
        {
         $ad_email = $row["email"];
         $ad_nome = $row["nome"];
        }
$response=1; 
}



if ($response ==1){

$today =date("d/m/Y");
$date_array=explode('/',trim($today));
$dd=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');

$obter_vl=" SELECT nome,email FROM operador";
$result = mysqli_query($conn, $obter_vl);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
     $oper = $row['nome'];
     $email = $row['email'];
     $count=" SELECT id,cobrar_operador FROM excel WHERE operador = '$oper' AND data_servico = $dd ";
     $result2 = mysqli_query($conn, $count);
      if (mysqli_num_rows($result2) > 0) {
       while($row = mysqli_fetch_assoc($result2))
       {
         $id = $row["id"];
         $cob_op= $row["cobrar_operador"];
         if(!$cob_op == 0 || $cob_op){
          $pag = number_format((float)$cob_op, 2, '.', '').'€';  
          $servico .= 'Serviço: <strong>ID #'.$id.'</strong> com o valor de: <strong>'.$pag.'</strong><br>';
         }
         $tt += $cob_op;
        }
      mailToOperador($oper,$email,$servico,$tt,$ad_email,$ad_nome);
      $servico='';
      $tt='';
    }




   }
}
}


function mailToOperador($oper,$email,$servico,$tt,$ad_email,$ad_nome){

if ($tt !=0){
    
     $today = date("d/m/Y");
     $pagamento = number_format((float)$tt, 2, '.', '').'€'; 
     $headers = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
     $headers .= 'From: <'.$ad_nome.'@noreply.com>' . "\r\n";
     $headers .= 'Cc: '.$ad_nome.',' . "\r\n";
     
     $email_body_supplier='';

     $email_subject_client = "Olá $oper, foram realizados os seguintes serviços/transfers, por $ad_nome.";
     $email_body_to_client='No dia: '.$today.'<br><hr><p>'.$servico.'</p>
     <hr><p style="text-align:right;">Total: '.$pagamento.'</p>
     <p>Obrigado, '.$ad_nome.'</p>';
 
     $email_subject_supplier = "Olá $ad_nome, foram realizados os seguintes serviços/transfers para o operador $oper.";
     $email_body_to_supplier ='No dia: '.$today.'<br><hr><p>'.$servico.'</p>
     <hr><p style="text-align:right;">Total: '.$pagamento.'</p>
     <p>Obrigado, '.$ad_nome.'</p>';

     mail($email,$email_subject_client,$email_body_to_client,$headers);
     mail($ad_mail,$email_subject_supplier,$email_body_to_supplier,$headers);


   }
 }

mysqli_close($conn);
?>