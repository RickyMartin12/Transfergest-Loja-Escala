<?php
require $_SERVER['DOCUMENT_ROOT'] . "/fpdf.php";

require $_SERVER['DOCUMENT_ROOT'] . "/connect.php";


$id = $_POST['id'];

$lang = $_POST['lang'];

$langs = array();

if ($lang == 'PT')
{
   $langs['SERVICES_PDF'] = 'servicos';
   $langs['TERMOS_PDF'] = 'termos_condicoes';
   $langs['SERVICES'] = 'Servico: ';
   $langs['RETURN'] = 'Retorno: ';
   $langs['VOUCHER'] = 'O Seu Voucher é o nº';
   $langs['STATE'] = 'Estado: ';
   $langs['DATE'] = 'Data: ';
   $langs['HOUR'] = 'Hora: ';
   $langs['NAME'] = 'Nome: ';
   $langs['EMAIL'] = 'Email: ';
   $langs['TEL'] = 'Tel: ';
   $langs['COUNTRY'] = 'Pais: ';
   $langs['ROOM'] = 'Numero do Quarto: ';
   $langs['ADL'] = 'Adultos: ';
   $langs['CR'] = 'Crianças: ';
   $langs['BY'] = 'Bebe: ';
   $langs['ADDR_RC'] = 'Morada Recolha: ';
   $langs['ADDR_DV'] = 'Morada Entrega: ';
   $langs['PAY'] = 'Pagamento: ';
   $langs['VAL'] = 'Valor: ';
   $langs['STATE_PAY'] = 'Estado Pagamento: ';
   $langs['OBS'] = 'Observações: ';
   $langs['DRIVER'] = 'Motorista: ';
   $langs['TERMS'] = 'Termos e Condições: ';
   $langs['DRIVER_CONT'] = "Manter o voucher para mostrar ao motorista dos transfers";
   $langs['SUBJ_NUMBER_CONF'] = "Confirmação da encomenda nº ";
   $langs['SUBJ_NUMBER_CONF2'] = " de";
   $langs['MENS_NUMBER_CONF'] = "Obrigado pela sua encomenda nº ";
   $langs['MENS_NUMBER_CONF2'] = ", em anexo pode visualizar os detalhes da compra.";
}
if ($lang == 'EN')
{
   $langs['SERVICES_PDF'] = 'services';
   $langs['TERMOS_PDF'] = 'terms_conditions';
   $langs['SERVICES'] = 'Service: ';
   $langs['RETURN'] = 'Return: ';
   $langs['VOUCHER'] = 'Your Voucher nº';
   $langs['STATE'] = 'State: ';
   $langs['DATE'] = 'Date: ';
   $langs['HOUR'] = 'Time: ';
   $langs['NAME'] = 'Name: ';
   $langs['EMAIL'] = 'Email: ';
   $langs['TEL'] = 'Phone: ';
   $langs['COUNTRY'] = 'Country: ';
   $langs['ROOM'] = 'Number Room: ';
   $langs['ADL'] = 'Adults: ';
   $langs['CR'] = 'Children: ';
   $langs['BY'] = 'Baby: ';
   $langs['ADDR_RC'] = 'Address Collection: ';
   $langs['ADDR_DV'] = 'Delivery Address: ';
   $langs['PAY'] = 'Payment: '; 
   $langs['VAL'] = 'Total: ';
   $langs['STATE_PAY'] = 'Payment Status: ';
   $langs['OBS'] = 'Observations: ';
   $langs['DRIVER'] = 'Driver: ';
   $langs['TERMS'] = 'Terms & Conditions: ';
   $langs['DRIVER_CONT'] = "Keep this voucher to show to the driver";
   $langs['SUBJ_NUMBER_CONF'] = "Order Confirmation nº ";
   $langs['SUBJ_NUMBER_CONF2'] = " from ";
   $langs['MENS_NUMBER_CONF'] = "Thank you, for your order nº ";
   $langs['MENS_NUMBER_CONF2'] = ", in attach details from the purchase.";
}





$obter_comp=" SELECT * FROM companhia WHERE 1";
 $result_comp = mysqli_query($conn, $obter_comp);
  if (mysqli_num_rows($result_comp) > 0) {
    while($row = mysqli_fetch_assoc($result_comp)) {
     $c_email = $row['email'];
     $c_nome = $row['nome'];
     $c_ravt = $row["ravt"];
     $c_tel = $row["tel"];
     $c_tlm = $row["tlm"];   
     $c_morada = $row["morada"];
     $c_cod_postal = $row["cod_postal"];
     $c_nif = $row["nif"];
     $c_tlm = $row["tlm"];
     $c_logo = $row["logo"];
     $c_site = $row["site"];
     $c_terms = $row["termos"];
     $c_pp_taxa = $row["pp_taxa"];
     $termos = $row['termos'];
    }
   }



         
       
        
  



   //Header
   $url = $_SERVER['DOCUMENT_ROOT'] . '/definitions/' . $c_logo;
   $titulo2 = utf8_decode($c_morada.' '.$c_cod_postal);
   $pdf = new FPDF();
   $pdf2 = new FPDF();
   $pdf->AddPage();
   $pdf->SetFont('Arial','',11);
   $pdf->Image($url,20,10,50,0,'PNG');
   $pdf->SetFont('Arial','B',9);
   $pdf->Cell(80);
   $pdf->Cell(0,0,utf8_decode($c_nome),0,0,'L');
   $pdf->Ln(4);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(80);
    $pdf->Cell(8,0,'NIF:',0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(20,0,$c_nif,0,0,'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(13,0,'RNAVT:',0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(15,0,$c_ravt,0,0,'L');
    $pdf->Ln(4);
    $pdf->Cell(80);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(0,0,$titulo2,0,0,'L');
    $pdf->Ln(4);
   $pdf->SetFont('Arial','B',9);
    $pdf->Cell(80);
    $pdf->Cell(8,0,'TEL:',0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(25,0,$c_tel,0,0,'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(9,0,'TLM:',0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(25,0,$c_tlm,0,0,'L');
    $pdf->Ln(4);
    $pdf->Cell(80);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(12,0,'EMAIL:',0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(0,0,utf8_decode($c_email),0,0,'L');
    $pdf->Ln(4);
    $pdf->Cell(80);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(9,0,'URL:',0,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(0,0,utf8_decode($c_site),0,0,'L');
    $pdf->Ln(5);

    
    $pdf2->AddPage();
   $pdf2->SetFont('Arial','',11);
   $pdf2->Image($url,20,10,50,0,'PNG');
   $pdf2->SetFont('Arial','B',9);
   $pdf2->Cell(80);
   $pdf2->Cell(0,0,utf8_decode($c_nome),0,0,'L');
   $pdf2->Ln(4);
    $pdf2->SetFont('Arial','B',9);
    $pdf2->Cell(80);
    $pdf2->Cell(8,0,'NIF:',0,0,'L');
    $pdf2->SetFont('Arial','',8);
    $pdf2->Cell(20,0,$c_nif,0,0,'L');
    $pdf2->SetFont('Arial','B',9);
    $pdf2->Cell(13,0,'RNAVT:',0,0,'L');
    $pdf2->SetFont('Arial','',8);
    $pdf2->Cell(15,0,$c_ravt,0,0,'L');
    $pdf2->Ln(4);
    $pdf2->Cell(80);
    $pdf2->SetFont('Arial','',8);
    $pdf2->Cell(0,0,$titulo2,0,0,'L');
    $pdf2->Ln(4);
   $pdf2->SetFont('Arial','B',9);
    $pdf2->Cell(80);
    $pdf2->Cell(8,0,'TEL:',0,0,'L');
    $pdf2->SetFont('Arial','',8);
    $pdf2->Cell(25,0,$c_tel,0,0,'L');
    $pdf2->SetFont('Arial','B',9);
    $pdf2->Cell(9,0,'TLM:',0,0,'L');
    $pdf2->SetFont('Arial','',8);
    $pdf2->Cell(25,0,$c_tlm,0,0,'L');
    $pdf2->Ln(4);
    $pdf2->Cell(80);
    $pdf2->SetFont('Arial','B',9);
    $pdf2->Cell(12,0,'EMAIL:',0,0,'L');
    $pdf2->SetFont('Arial','',8);
    $pdf2->Cell(0,0,utf8_decode($c_email),0,0,'L');
    $pdf2->Ln(4);
    $pdf2->Cell(80);
    $pdf2->SetFont('Arial','B',9);
    $pdf2->Cell(9,0,'URL:',0,0,'L');
    $pdf2->SetFont('Arial','',8);
    $pdf2->Cell(0,0,utf8_decode($c_site),0,0,'L');
    $pdf2->Ln(5);



        // Conteudo dos Serviços - PDF 1


        $sql=" SELECT * FROM excel WHERE id = $id ORDER BY id ASC";
         $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
             $servico = $row['servico'];
             $estado = $row['estado'];
             $ids = $row['id'];
             $data_servico = date("d/m/Y", $row['data_servico']);
             $hora_servico = date ("H:i", $row['hrs']);
             $nome = $row['nome_cl'];
             $email = $row['email'];
             $telefone = $row['telefone'];
             $pais = $row['pais'];
             $adultos = $row['px'];
             $criancas = $row['cr'];
             $bebes = $row['bebe'];
             $morada_recolha = $row['morada_recolha'];
             $morada_entrega = $row['morada_entrega'];
             $local_recolha = $row['local_recolha'];
             $local_entrega = $row['local_entrega'];
             $cobrar_operador = $row['cobrar_operador'];
             $cobrar_direto = $row['cobrar_direto'];
             $obs = $row['obs'];
             $referencia = $row['referencia'];
             if ($cobrar_operador)
             {
                $pag = 'Operador';
                $val = utf8_decode($cobrar_operador).' '.chr(128);
             }
             else if ($cobrar_direto)
             {
                 $pag = 'Motorista';
                 $val = utf8_decode($cobrar_direto).' '.chr(128);
             }
             else
             {
                 $pag = '-/-';
                 $val = '-/-';
             }
            }
          }

  

       if ($email){


       if ($referencia)
       {
            $pdfhead = $langs['VOUCHER'].''.$referencia;
       }
       else
       {
           $pdfhead = $langs['VOUCHER'].''.$ids;
       }
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,6,utf8_decode($pdfhead),1,0,'C');
        $pdf->Ln(9);

        $pdf2->SetFont('Arial','',9);
        $pdf2->Cell(0,6,utf8_decode($pdfhead),1,0,'C');
        $pdf2->Ln(9);

        // Conteudo da Informação do Serviço 2
        $pdf->SetY(50);
        $pdf->SetTextColor(5,5,5);
        $pdf->Cell(0,75,"",1,0,'L');
        $pdf->Ln(0.3);

        //Barra 1
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->SetFillColor(240,240,240);
        // Serviço
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(14.2,6,utf8_decode($langs['SERVICES']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(32,6,utf8_decode($servico),0,0,'L',true);
        // Retorno
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(15,6,utf8_decode($langs['RETURN']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(10,6,utf8_decode("Sim"),0,0,'L',true);
        // Estado
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(15,6,utf8_decode($langs['STATE']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20,6,utf8_decode($estado),0,0,'L',true);
        //ID
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(5,6,utf8_decode('ID:'),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(13,6,$ids,0,0,'L',true);
        //Data
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10,6,utf8_decode($langs['DATE']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(25,6,$data_servico,0,0,'L',true);
        //Hora
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10,6,utf8_decode($langs['HOUR']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20,6,$hora_servico,0,0,'L',true);
        // Line Break
        $pdf->Ln(8);
        //Barra 2
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->SetFillColor(240,240,240);
        // Nome Completo
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(14.2,6,utf8_decode($langs['NAME']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(32,6,utf8_decode($nome),0,0,'L',true);
        // Email
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(14.2,6,utf8_decode($langs['EMAIL']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(65,6,utf8_decode($email),0,0,'L',true);
         //Tel
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(15,6,utf8_decode($langs['TEL']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(48.9,6,$telefone,0,0,'L',true);
        // Line break
        $pdf->Ln(7);  
        //Barra 3
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->SetFillColor(240,240,240);
        // Pais
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(14.2,6,utf8_decode($langs['COUNTRY']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(32,6,utf8_decode($pais),0,0,'L',true);
        // Numero do Quarto
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(32,6,utf8_decode($langs['ROOM']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(37,6,utf8_decode("-/-"),0,0,'L',true);
        // Adultos
        $pdf->SetFont('Arial','B',9);

        $pdf->Cell(17,6,utf8_decode($langs['ADL']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(10,6,$adultos,0,0,'L',true);
        // Crianças
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(17,6,utf8_decode($langs['CR']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(10,6,$criancas,0,0,'L',true);
        // Bebe
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10,6,utf8_decode($langs['BY']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(10,6,$bebes,0,0,'L',true);
        // Line break
        $pdf->Ln(8);
        //Barra 4
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->SetFillColor(240,240,240);
        // Morada de Recolha
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30,6,utf8_decode($langs['ADDR_RC']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(159.2,6,utf8_decode($morada_recolha),0,0,'L',true);
        // Line break
        $pdf->Ln(7);
        //Barra 4
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->SetFillColor(240,240,240);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(189.2,6,utf8_decode($local_recolha),0,0,'L',true);
        // Line break
        $pdf->Ln(7);
        //Barra 6
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->SetFillColor(240,240,240);
        // Morada de Recolha
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30,6,utf8_decode($langs['ADDR_DV']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(159.2,6,utf8_decode($morada_entrega),0,0,'L',true);
        // Line break
        $pdf->Ln(7);
        //Barra 7
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->SetFillColor(240,240,240);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(189.2,6,utf8_decode($local_entrega),0,0,'L',true);
        // Line break
        $pdf->Ln(8);
        // Barra 8
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->SetFillColor(240,240,240);
        // Tipo de Pagamento
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30,6,utf8_decode($langs['PAY']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(30,6,utf8_decode($pag),0,0,'L',true);
        // Valor
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10,6,utf8_decode($langs['VAL']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(45,6,$val,0,0,'L',true);
        // Estado do Pagamento
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(35,6,utf8_decode($langs['STATE_PAY']),0,0,'L',true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(39.2,6,utf8_decode("-/-"),0,0,'L',true);
        // Line break
        $pdf->Ln(2);
        // Barra 9
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->SetFillColor(240,240,240);
        // Observações + Contexto das Observações

        $pdf->Ln(6);
        $pdf->SetFillColor(240,240,240);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->Cell(189,9,utf8_decode($langs['OBS']),0,0,'L',true);
        $txt = str_replace("<br>","",$obs);  
        $txt = str_replace("\n\n",$pdf->Ln(1),$txt);
        $pdf->SetFont('Arial','',9);
        $pdf->Ln(6);
        $pdf->SetFillColor(240,240,240);
        $pdf->Cell(0.4,0,"",0,0,'L',true);
        $pdf->MultiCell(189,4,utf8_decode($txt),0,1,true);

        

        // Termos e Condições
        

        $pdf2->SetY(50);
        $pdf2->SetTextColor(5,5,5);
        $pdf2->Cell(0,100,"",1,0,'L');
        $pdf2->Ln(4);
        $pdf2->SetFont('Arial','BU',9);
        $pdf2->Cell(30,0,utf8_decode($langs['DRIVER']),0,0,'L');
        $pdf2->Ln(4);
        $pdf2->SetFont('Arial','B',8);
        $pdf2->Cell(0,0,utf8_decode($langs['DRIVER_CONT']),0,0,'C');

        $str2=$termos;

        $pdf2->Ln(10);
        $pdf2->SetFont('Arial','BU',9);
        $pdf2->Cell(35,0,utf8_decode($langs['TERMS']),0,0,'L');
        $txt = str_replace("\n\n",$pdf2->Ln(3),$txt);
        $pdf2->SetFont('Arial','',9);
        
        $pdf2->WriteHTML($str2);



   //Footer
   $titulo1 = utf8_decode($c_nome .' | NIF:'.$c_nif.' | RNAVT:'.$c_ravt);
    $titulo4 = utf8_decode('TEL:'.$c_tel .' | TLM:'.$c_tlm);
    $titulo3 = utf8_decode($c_email.' | '.$c_site);
    $pdf->SetY(-25);
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(0,0,$titulo1.' | '.$titulo4.' | '.$titulo3,0,0,'C');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','I',5);
    $pdf->Cell(0,0,'Powered by transfergest.com',0,0,'C');
    $pdf->Cell(0,0,'Pag. '.$pdf->PageNo().'/{nb}',0,0,'R');


    $pdf2->SetY(-25);
    $pdf2->SetFont('Arial','',6);
    $pdf2->Cell(0,0,$titulo1.' | '.$titulo4.' | '.$titulo3,0,0,'C');
    $pdf2->Ln(4);
    $pdf2->SetFont('Arial','I',5);
    $pdf2->Cell(0,0,'Powered by transfergest.com',0,0,'C');
    $pdf2->Cell(0,0,'Pag. '.$pdf2->PageNo().'/{nb}',0,0,'R');

if ($referencia)
{
   
$subject = utf8_decode($langs['SUBJ_NUMBER_CONF']).' '.$referencia.' '.utf8_decode($langs['SUBJ_NUMBER_CONF2']).' '.$c_nome;
$message = utf8_decode($langs['MENS_NUMBER_CONF']).' '.$referencia.' '.utf8_decode($langs['MENS_NUMBER_CONF2']);

    
$subject_admin = utf8_decode("Foi efetuada uma encomenda com o n: $referencia"); 
$message_admin = utf8_decode("Boas $c_nome, os detalhes da compra n: $referencia foram enviados para o cliente, visualize o anexo.");

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = utf8_decode("$referencia").'_'.$langs['SERVICES_PDF'].".pdf";
$filename2 = utf8_decode("$referencia").'_'.$langs['TERMOS_PDF'].".pdf";
}
else
{
$subject = utf8_decode($langs['SUBJ_NUMBER_CONF']).' '.$id.' '.utf8_decode($langs['SUBJ_NUMBER_CONF2']).' '.$c_nome;
$message = utf8_decode($langs['MENS_NUMBER_CONF']).' '.$id.' '.utf8_decode($langs['MENS_NUMBER_CONF2']);

    
$subject_admin = utf8_decode("Foi efetuada uma encomenda com o n: ").''.$id; 
$message_admin = utf8_decode("Boas $c_nome, os detalhes da compra n: ").''.$id.''. utf8_decode(" foram enviados para o cliente, visualize o anexo.");

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = $id.'_'.$langs['SERVICES_PDF'].".pdf";
$filename2 = $id.'_'.$langs['TERMOS_PDF'].".pdf";
}


// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$pdfdoc2 = $pdf2->Output("", "S");

$attachment = chunk_split(base64_encode($pdfdoc));
$attachment2 = chunk_split(base64_encode($pdfdoc2));

// main header
$headers  = "From: ".$c_site.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //
$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= $eol;

$body2 = "--".$separator.$eol;
$body2 .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body2 .= $eol;


// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

$body2 .= "--".$separator.$eol;
$body2 .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
$body2 .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body2 .= $eol;

// attachment
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;  
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";


// attachment
$body2 .= "--".$separator.$eol;
$body2 .= "Content-Type: application/octet-stream; name=\"".$filename2."\"".$eol;  
$body2 .= "Content-Transfer-Encoding: base64".$eol;
$body2 .= "Content-Disposition: attachment".$eol.$eol;
$body2 .= $attachment2.$eol;
$body2 .= "--".$separator."--";


// no more headers after this, we start the body!
$body_admin = "--".$separator.$eol;
$body_admin .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body_admin .= $eol;

// message
$body_admin .= "--".$separator.$eol;
$body_admin .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
$body_admin .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body_admin .= $message_admin.$eol;

$body_admin .= "--".$separator.$eol;
$body_admin .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 

$body_admin .= "Content-Transfer-Encoding: base64".$eol;
$body_admin .= "Content-Disposition: attachment".$eol.$eol;
$body_admin .= $attachment.$eol;
$body_admin .= "--".$separator."--";


// no more headers after this, we start the body!
$body_admin2 = "--".$separator.$eol;
$body_admin2 .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body_admin2 .= $eol;

// message
$body_admin2 .= "--".$separator.$eol;
$body_admin2 .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
$body_admin2 .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body_admin2 .= $eol;

$body_admin2 .= "--".$separator.$eol;
$body_admin2 .= "Content-Type: application/octet-stream; name=\"".$filename2."\"".$eol; 

$body_admin2 .= "Content-Transfer-Encoding: base64".$eol;
$body_admin2 .= "Content-Disposition: attachment".$eol.$eol;
$body_admin2 .= $attachment2.$eol;
$body_admin2 .= "--".$separator."--";


$b = $body.$body2;
$b_admin = $body_admin.$body_admin2;

mail($email, $subject, $b, $headers);
mail($c_email, $subject_admin, $b_admin, $headers);

echo 1;
}


else {
  echo 0;
} 





?>