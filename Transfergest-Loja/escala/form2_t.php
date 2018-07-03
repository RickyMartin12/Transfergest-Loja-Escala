<?php

require_once ('connect.php');

require('fpdf.php');

$response = 0;

class PDF extends FPDF
{
var $admin;
var $logo;
var $morada;
var$cod_postal;
var $tel;
var $tlm;
var $email;
var $site;
var $nif;
var $ravt;


function companhia($admin,$logo,$morada,$cod_postal,$tel,$tlm,$email,$site,$nif,$ravt) {
$this->nome = $admin;
$this->logo = $logo;
$this->morada = $morada;
$this->cod_postal = $cod_postal;
$this->tel = $tel;
$this->tlm = $tlm;
$this->email = $email;
$this->site = $site;
$this->nif = $nif;
$this->ravt = $ravt;
}

// Page header

function Header()
{   
    $titulo2 = utf8_decode($this->morada.' '.$this->cod_postal);
                             //(esquerda,cima,altura)
    $this->Image('definitions/'.$this->logo,20,10,50);
    $this->SetFont('Arial','B',9);
    $this->Cell(80);
    $this->Cell(0,0,utf8_decode($this->nome),0,0,'L');
    $this->Ln(4);
    $this->SetFont('Arial','B',9);
    $this->Cell(80);
    $this->Cell(8,0,'NIF:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(20,0,$this->nif,0,0,'L');
    $this->SetFont('Arial','B',9);
    $this->Cell(13,0,'RNAVT:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(15,0,$this->ravt,0,0,'L');
    $this->Ln(4);
    $this->Cell(80);
    $this->SetFont('Arial','',8);
    $this->Cell(0,0,$titulo2,0,0,'L');
    $this->Ln(4);
    $this->SetFont('Arial','B',9);
    $this->Cell(80);
    $this->Cell(8,0,'TEL:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(25,0,$this->tel,0,0,'L');
    $this->SetFont('Arial','B',9);
    $this->Cell(9,0,'TLM:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(25,0,$this->tlm,0,0,'L');
    $this->Ln(4);
    $this->Cell(80);
    $this->SetFont('Arial','B',9);
    $this->Cell(12,0,'EMAIL:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(0,0,utf8_decode($this->email),0,0,'L');
    $this->Ln(4);
    $this->Cell(80);
    $this->SetFont('Arial','B',9);
    $this->Cell(9,0,'URL:',0,0,'L');
    $this->SetFont('Arial','',8);
    $this->Cell(0,0,utf8_decode($this->site),0,0,'L');
    $this->Ln(5);
}

// Page footer
function Footer()
{

    $titulo1 = utf8_decode($this->nome .' | NIF:'.$this->nif.' | RNAVT:'.$this->ravt);
    $titulo2 = utf8_decode('TEL:'.$this->tel .' | TLM:'.$this->tlm);
    $titulo3 = utf8_decode($this->email.' | '.$this->site);
    $this->SetY(-15);
    $this->SetFont('Arial','',6);
    $this->Cell(0,0,$titulo1.' | '.$titulo2.' | '.$titulo3,0,0,'C');
    $this->Ln(4);
    $this->SetFont('Arial','I',5);
    $this->Cell(0,0,'Powered by transfergest.com',0,0,'C');
    $this->Cell(0,0,'Pag. '.$this->PageNo().'/{nb}',0,0,'R');
}
}




switch ($_POST['action']){

/*FINALIZAR COMPRA AEROPORTO PARTIDA */

case '1':



        // Validar Dominio
        if ($_POST['dominio'] != "") 
        {
            $_POST['dominio'] = filter_var($_POST['dominio'], FILTER_SANITIZE_STRING);
            $_SESSION["dominio"] = $_POST['dominio'];
        }

        // Validar Dominio
        if ($_POST['categoria'] != "") 
        {
            $_POST['categoria'] = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
            $_SESSION["categoria"] = $_POST['categoria'];
        }

        //Nome da Categoria
        $query2 = "SELECT nome FROM `categoria_prods` WHERE id='{$_SESSION["categoria"]}' ";
        $result2 = mysqli_query($conn, $query2);
        $row = mysqli_fetch_assoc($result2);


        $nome_categoria = $row['nome'];

        if ($nome_categoria != "") 
        {
            $nome_categoria = filter_var($nome_categoria, FILTER_SANITIZE_STRING);
            $_SESSION["nome_categoria"] = $nome_categoria;
        }



        // Validar Navegador

        if ($_POST['navigator'] != "") 
        {
                $_POST['navigator'] = filter_var($_POST['navigator'], FILTER_SANITIZE_STRING);
                $_SESSION["navigator"] = $_POST['navigator'];
        }

        // Validar e Identificar Operador

        $query2 = "SELECT id FROM `operador` WHERE dominio='{$_SESSION["dominio"]}' AND loja='checked' LIMIT 1";
        $result2 = mysqli_query($conn, $query2);
        $row = mysqli_fetch_assoc($result2);


        $id_operador = $row['id'];

        if ($id_operador != "") 
        {
            $id_operador = filter_var($id_operador, FILTER_SANITIZE_STRING);
            $_SESSION["operador"] = $id_operador;
        }

        // Coord das moradas de recolha

        if ($_POST['coord4'] != "") 
        {
            $_POST['coord4'] = filter_var($_POST['coord4'], FILTER_SANITIZE_STRING);
            $_SESSION["coord4"] = $_POST['coord4'];
        }

        // Identificar o Nome do Operador Atribuido a esta loja

        $query3 = "SELECT nome FROM `operador` WHERE id='{$_SESSION["operador"]}'LIMIT 1";
        $result3 = mysqli_query($conn, $query3);
        $row2 = mysqli_fetch_assoc($result3);


        $nome_operador = $row2['nome'];

        if ($nome_operador != "") 
        {
            $nome_operador = filter_var($nome_operador, FILTER_SANITIZE_STRING);
            $_SESSION["nome_operador"] = $nome_operador;
        }


        /*VALIDAR FROM E ATRIBUIR VAR SESSÃO*/
        if ($_POST['from'] != "") 
        {
            $_POST['from'] = filter_var($_POST['from'], FILTER_SANITIZE_STRING);
            $_SESSION["from"] = $_POST['from'];
        }

        /*VALIDAR TO E ATRIBUIR VAR SESSÃO*/

        if ($_POST['to'] != "") 
        {
            $_POST['to'] = filter_var($_POST['to'], FILTER_SANITIZE_STRING);
            $_SESSION["to"] = $_POST['to'];
        }

        /*VALIDAR PAX E ATRIBUIR VAR SESSÃO*/
        if ($_POST['pax'] != "") 
        {
            $_POST['pax'] = filter_var($_POST['pax'], FILTER_SANITIZE_STRING);
            $_SESSION["pax"] = $_POST['pax'];
        }

        /*VALIDAR RETORNO CLIENTE E ATRIBUIR VAR SESSÃO*/
        if ($_POST['oneway'] != "") 
        {
            $_POST['oneway'] = filter_var($_POST['oneway'], FILTER_SANITIZE_STRING);
            $_SESSION["oneway"] = $_POST['oneway'];
            if ($_POST['oneway'] == "") 
            {
                $errors .= 'Please choose options in Return, and try again.<br/><br/>';
            }
        } 
        else 
        {
            $errors .= 'Error occured, please contact administrator 1.<br/>';
        }

        /*VALIDAR COD_PROMO E ATRIBUIR VAR SESSÃO*/
        if ($_POST['promo'] != "") 
        {
            $_POST['promo'] = filter_var($_POST['promo'], FILTER_SANITIZE_STRING);
            $_SESSION["promo"] = $_POST['promo'];
        }

        /*VALIDAR PREÇO PRODUTO E ATRIBUIR VAR SESSÃO*/
        if ($_POST['pp'] != "") {
           $pp = filter_var($_POST['pp'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $_SESSION["total"] = $pp;
        }

        /*VALIDAR ID PRODUTO E ATRIBUIR VAR SESSÃO*/
        if ($_POST['prod'] != "") 
        {
           $prod = filter_var($_POST['prod'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION["id_prod"] = $prod;
            if (!filter_var($prod, FILTER_SANITIZE_NUMBER_INT)) 
            {
                $errors .= "$prod is <strong>NOT</strong> a valid number.<br/><br/>";
            }
        }
        else 
        {
            $errors .= 'Error occured, please contact administrator 2.<br/>';
        } 

        /*VALIDAR LABEL PREÇO E ATRIBUIR VAR SESSÃO*/
        if ($_POST['label'] != "") 
        {
           $label = filter_var($_POST['label'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION["label"] = $label;
            if (!filter_var($label, FILTER_SANITIZE_NUMBER_INT)) {
                $errors .= "$label is <strong>NOT</strong> a valid number.<br/><br/>";
            }
        }
        else 
        {
            $errors .= 'Error occured, please contact administrator 3.<br/>';
        }

        /*VALIDAR LINGUAGEM CLIENTE E ATRIBUIR VAR SESSÃO*/
        if ($_POST['language'] != "") 
        {
            $_POST['language'] = filter_var($_POST['language'], FILTER_SANITIZE_STRING);
            $_SESSION["language"] = $_POST['language'];
            if ($_POST['language'] == "") 
            {
                $errors .= 'Please enter  click on language flag and try again.<br/><br/>';
            }
        } 
        else 
        {
            $errors .= 'Error occured, please contact administrator 4.<br/>';
        }

        /*VALIDAR NR VOO CHEGADA E ATRIBIUR VAR SESSÃO*/
        if ($_POST['voo_n_che'] != "") {
            $_POST['voo_n_che'] = filter_var($_POST['voo_n_che'], FILTER_SANITIZE_STRING);

            $_SESSION["voo_n_che"] = $_POST['voo_n_che'];

            if ($_POST['voo_n_che'] == "") {
                $errors .= 'Please enter a valid flight nr(arrival).<br/><br/>';
            }
        } else {
            $errors .= 'Please enter flight nr(arrival).<br/>';
        }
 

     /*VALIDAR DATA VOO CHEGADA E E ATRIBIUR VAR SESSÃO*/
        if ($_POST['voo_che_dt'] != "") {
            $_POST['voo_che_dt'] = filter_var($_POST['voo_che_dt'], FILTER_SANITIZE_STRING);

            $_SESSION["voo_che_dt"] = $_POST['voo_che_dt'];

            if ($_POST['voo_che_dt'] == "") {
                $errors .= 'Please enter a valid date flight nr(arrival).<br/><br/>';
            }
        } 
        else 
        {
            $errors .= 'Please enter date flight nr(arrival).<br/>';
        }
 

     /*VALIDAR MORADA CHEGADA E ATRIBUIR VAR SESSÃO*/
        if ($_POST['voo_che_mor'] != "") {
            $_POST['voo_che_mor'] = filter_var($_POST['voo_che_mor'], FILTER_SANITIZE_STRING);
            $_SESSION["voo_che_mor"] = $_POST['voo_che_mor'];
        }

 
/**/
/* CAMPOS DADOS PESSOAIS*/
/**/


        /*VALIDAR NOME CLIENTE E ATRIBIUR VAR SESSÃO*/
        if ($_POST['nome'] != "") 
        {
            $_POST['nome'] = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
            $_SESSION["nome"] = $_POST['nome'];
            if ($_POST['nome'] == "") 
            {
                $errors .= 'Please enter a valid name.<br/><br/>';
            }
        } 
        else 
        {
            $errors .= 'Please enter your name.<br/>';
        }
        
        // Validar Email
        if ($_POST['email'] != "") 
        {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $_SESSION["email"] = $email;
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                $errors .= "$email is <strong>NOT</strong> a valid email address.<br/><br/>";
            }
        } 
        else 
        {
            $errors .= 'Please enter your email address.<br/>';
        }


        if ($_POST['tel'] != "") 
        {
           $tel = filter_var($_POST['tel'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION["tel"] = $tel;
        }
     

        /*VALIDAR COUNTRY PARTIDA E ATRIBUIR VAR SESSÃO*/
        if ($_POST['country'] != "") 
        {
            $_POST['country'] = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
            $_SESSION["country"] = $_POST['country'];
        }

/**/
/* CAMPOS PASSAGEIROS*/
/**/

        if ($_POST['adult'] != "") 
        {
            $adult = filter_var($_POST['adult'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION["adult"] = $adult;
            if (!filter_var($adult, FILTER_SANITIZE_NUMBER_INT)) 
            {
                $errors .= "$adult is <strong>NOT</strong> a valid number.<br/><br/>";
            }
        } 
        else 
        {
            $errors .= 'Please enter total of adults.<br/>';
        }

        if (filter_var($_POST['children'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['children'], FILTER_VALIDATE_INT) === false)
        {
            $children = filter_var($_POST['children'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION["children"] = $children;
        }
        else 
        {
                $errors .= "$children is <strong>NOT</strong> a valid number.<br/><br/>";
        } 

        if (filter_var($_POST['baby'], FILTER_VALIDATE_INT) === 0 || !filter_var( $_POST['baby'], FILTER_VALIDATE_INT) === false)
        {
            $baby = filter_var($_POST['baby'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION["baby"] = $baby;
        }
        else 
        {
                $errors .= "$baby is <strong>NOT</strong> a valid number.<br/><br/>";
        } 

        if ($_POST['obs'] != "") 
        {
            $_POST['obs'] = filter_var($_POST['obs'], FILTER_SANITIZE_STRING);
            $_SESSION["obs"] = $_POST["obs"];
        }


        if ($_POST['payments'] != "") 
        {
            $_POST['payments'] = filter_var($_POST['payments'], FILTER_SANITIZE_STRING);
            $_SESSION["payments"] = $_POST['payments'];
            if ($_POST['payments'] == "") 
            {
                $errors .= 'Please select a payment method.<br/><br/>';
            }
        } 
        else 
        {
            $errors .= 'Please select a payment method.<br/>';
        }
        if ($errors == "") 
        {
          $res[] = array
           ('dominio' => $_SESSION['dominio'],
            'navigator' => $_SESSION['navigator'],
            'id_operador' => $_SESSION["operador"],
            'nome_operador' => $_SESSION['nome_operador'],
            'categoria' => $_SESSION['categoria'],

            'voo_n_che' => $_SESSION["voo_n_che"],
            'voo_che_dt' => $_SESSION["voo_che_dt"],
            'voo_che_mor' => $_SESSION["voo_che_mor"],
            'coord4' => $_SESSION['coord4'],
      
            'nome' => $_SESSION["nome"],
            'email' => $_SESSION["email"], 
            'tel' => $_SESSION["tel"],
            'country' => $_SESSION["country"],

            'adult' => $_SESSION["adult"],
            'children' => $_SESSION["children"],
            'baby' => $_SESSION["baby"],

            'obs' => $_SESSION["obs"],
            'payments' => $_SESSION["payments"],

            'id' => $_SESSION["id_prod"],
            'id_price' => $_SESSION["label"],

            'lang' => $_SESSION["language"],
            'promo' => $_SESSION["promo"],
            'oneway' => $_SESSION["oneway"],

            'from' => $_SESSION["from"],
            'to' => $_SESSION["to"],
            'pax' => $_SESSION["pax"],
            'total' => $_SESSION["total"]);


            // Atribuição de Idiomas na Loja
            if($_SESSION["language"] == 'en-gb'){
                $lang = array();
                $lang['CHOOSE'] = 'Choose: ';
                $lang['STATE'] = 'State: ';
                $lang['SERVICE'] ='Service: ';
                $lang['ID'] ='ID: ';
                $lang['TIME'] = 'Time: ';
                $lang['RETURN'] = 'Return: ';
                $lang['DATE'] ='Date: ';
                $lang['FLIGHT'] = 'Flight: ';
                $lang['NAME'] = 'Name: ';
                $lang['EMAIL'] = 'Email: ';
                $lang['TEL'] ='Tel: ';
                $lang['COUNTRY'] =  'Country: ';
                $lang['PICK'] = 'Pick-Up: ';
                $lang['DRIVER'] ='Driver';
                $lang['BANK']  = 'Bank Transfer';
                $lang['PAYPAL'] = 'Paypal';
                $lang['DELIVERY'] = 'Delivery: ';
                $lang['ADULT'] = 'Adult: ';
                $lang['CHILDREN'] = 'Children: ';
                $lang['BABY'] = 'Baby: ';
                $lang['PAYMENT'] = 'Payment: ';
                $lang['PLEASE'] = 'Please, ';
                $lang['TRANSFER_AMOUNT'] = 'transfer the amount of ';
                $lang['TRANSFER_TO'] = ' to: ';
                $lang['NAME_B'] = 'Bank';
                $lang['DRIVER_TEXT'] = 'Keep this voucher to show to the driver';
                $lang['AFTER_PAYMENT'] = 'After you´ve done the payment, send us the transfer confirmation to the email: ';
                $lang['THANK_YOU'] = 'Thank you, ';
                $lang['ORDER_N']= 'Don´t forget to mention our order n: ';
                $lang['YOUR_ORDER'] = 'Your Voucher nº';
                $lang['TERMS_CONDITIONS'] = 'Terms & Conditions';
                $lang['ROOM'] = 'Number Room: ';
                $lang['ADDR_RC'] = 'PickUp Address: ';
                $lang['ADDR_DV'] = 'Delivery Address: ';
                $lang['VALUE'] = 'Value: ';
                $lang['STATE_PAY'] = 'Payment Status: ';
                $lang['OBSERVATIONS'] = 'Observations: ';
                $lang['PUBLIC'] = 'Recomendations: ';
                $lang['TERMS'] = 'terms';
                $lang['SERVICES'] = 'services';
                $lang['TYPE_PAYMENT'] = 'Type Payment: ';
            }



            if($_SESSION["language"] == 'pt'){
                $lang = array();
                $lang['CHOOSE'] = 'Escolha: ';
                $lang['SERVICE'] ='Serviço: ';
                $lang['STATE'] = 'Estado: ';
                $lang['ID'] ='ID: ';
                $lang['TIME'] = 'Hora: ';
                $lang['DATE'] ='Data: ';
                $lang['FLIGHT'] = 'Voo: ';
                $lang['NAME'] = 'Nome: ';
                $lang['EMAIL'] = 'Email: ';
                $lang['TEL'] ='Tel: ';
                $lang['RETURN'] = 'Retorno: ';
                $lang['COUNTRY'] =  'Pais: ';
                $lang['PICK'] = 'Recolha: ';
                $lang['DRIVER'] ='Motorista';
                $lang['BANK']  = 'Transf.Bancária';
                $lang['PAYPAL'] = 'Paypal';
                $lang['DELIVERY'] = 'Entrega: ';
                $lang['ADULT'] = 'Adulto: ';
                $lang['CHILDREN'] = 'Criança: ';
                $lang['BABY'] = 'Bébé: ';
                $lang['PAYMENT'] = 'Pagamento: ';
                $lang['PLEASE'] = 'Por favor, ';
                $lang['TRANSFER_AMOUNT'] = 'transfira o montante de ';
                $lang['TRANSFER_TO'] = ' para: ';
                $lang['NAME_B'] = 'Banco';
                $lang['AFTER_PAYMENT'] = 'Após efetuar o pagamento, envie o comprovativo da transferência para o email: ';
                $lang['THANK_YOU'] = 'Obrigado, ';
                $lang['DRIVER_TEXT'] = 'Guarde este documento para exibir ao motorista.';
                $lang['ORDER_N'] = 'Não se esqueça de mencionar a nº  da  encomenda: ';
                $lang['YOUR_ORDER'] = 'A sua encomenda nº ';
                $lang['TERMS_CONDITIONS'] = 'Termos & Condições';
                $lang['ROOM'] = 'Numero Quarto: ';
                $lang['ADDR_RC'] = 'Morada Recolha: ';
                $lang['ADDR_DV'] = 'Morada Entrega: ';
                $lang['VALUE'] = 'Total: ';
                $lang['STATE_PAY'] = 'Estado Pagamento: ';
                $lang['OBSERVATIONS'] = 'Observacoes: ';
                $lang['PUBLIC'] = 'Recomendações: ';
                $lang['TERMS'] = 'termos';
                $lang['SERVICES'] = 'servicos';
                $lang['TYPE_PAYMENT'] = 'Tipo de Pagamento: ';
            }


$val = $_SESSION["total"];

$t=time();
$referencia = $_SESSION["id_prod"].'/'.dechex($t);
$prod = "SELECT duracao FROM locais WHERE id = {$_SESSION["id_prod"]} LIMIT 1";
$result_prod = mysqli_query($conn, $prod);
if (mysqli_num_rows($result_prod) > 0) 
{
    while($row = mysqli_fetch_assoc($result_prod)) 
        {
            $duration = $row["duracao"];
        }
}





/**/
/*PAGAMENTO AO MOTORISTA */
/**/

    if ($_SESSION["payments"] =='Driver'){

  /*INSERIR DB PARTIDA AEROPORTO*/

    $servico = 'Chegada';

$pick = $_SESSION["from"].' - '.$_SESSION["voo_che_mor"];

/*RETURN PICK DATE CLIENT*/

$date_hour_array=explode(' ',trim($_SESSION["voo_che_dt"]));
$date_array = explode('/', $date_hour_array[0]);

$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$timeok = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$date_hour_array[1]);

$obs = '('. $_SESSION["pax"] .') '.$referencia.' | MTR | OBS: '. $_SESSION["obs"];

$voo = $_SESSION["voo_n_che"];

$gerado = $_SESSION["dominio"].'@'.date("Y-m-d H:i:s");


$new_arrival = "INSERT INTO excel(servico,data_servico, hrs, voo, nome_cl, email, local_recolha, local_entrega, px, cr, bebe, obs,operador,cobrar_direto,data_criacao, referencia, telefone, pais, criado_direto, end, estado, navigator, morada_recolha_gps, morada_entrega_gps, voo_horario, morada_recolha, morada_entrega, created_by)
    VALUES ( '$servico', $date, $timeok, '$voo', '{$_SESSION["nome"]}', '{$_SESSION["email"]}', '{$_SESSION["from"]}', '{$_SESSION["to"]}','{$_SESSION["adult"]}', '{$_SESSION["children"]}', '{$_SESSION["baby"]}', '$obs', 'Direto', $val, '".date("Y-m-d H:i:s")."', '$referencia', '{$_SESSION["tel"]}', '{$_SESSION["country"]}','{$_SESSION["dominio"]}', $duration, 'Pendente', '{$_SESSION["navigator"]}', '-/-', '{$_SESSION["coord4"]}', '-/-', '-/-', '{$_SESSION["voo_che_mor"]}', '$gerado')"; 

 $result_arrival = mysqli_query($conn,$new_arrival);
 if ($result_arrival)
 {
  $success = 11; 
 }
 else 
 {
   $success =  '#20#';
  }

if ($success)
{
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
         $c_publicidade = $row["publicidade"];
        }
       }
  }
/*VALOR 1 TIPO PAGAMENTO RESPOSTA AO CLIENTE */
 $response = 1;
 }


if ($_SESSION["payments"] =='Bank')
{

    /*INSERIR DB PARTIDA AEROPORTO*/

    $servico = 'Chegada';

$pick = $_SESSION["to"].' - '.$_SESSION["voo_che_mor"];

/*RETURN PICK DATE CLIENT*/

$date_hour_array=explode(' ',trim($_SESSION["voo_che_dt"]));
$date_array = explode('/', $date_hour_array[0]);

$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$timeok = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$date_hour_array[1]);

$obs = '('. $_SESSION["pax"] .') '.$referencia.' | MTR | OBS: '. $_SESSION["obs"];

$voo = $_SESSION["voo_n_che"];

$gerado = $_SESSION["dominio"].'@'.date("Y-m-d H:i:s");


$new_arrival = "INSERT INTO excel(servico,data_servico, hrs, voo, nome_cl, email, local_recolha, local_entrega, px, cr, bebe, obs,operador,cobrar_operador,data_criacao, referencia, telefone, pais, criado_direto, end, estado, navigator, morada_recolha_gps, morada_entrega_gps, voo_horario, morada_recolha, morada_entrega, created_by)
    VALUES ( '$servico', $date, $timeok, '$voo', '{$_SESSION["nome"]}', '{$_SESSION["email"]}', '{$_SESSION["from"]}', '{$_SESSION["to"]}','{$_SESSION["adult"]}', '{$_SESSION["children"]}', '{$_SESSION["baby"]}', '$obs', 'Site Transf.Banco', $val, '".date("Y-m-d H:i:s")."', '$referencia', '{$_SESSION["tel"]}', '{$_SESSION["country"]}','{$_SESSION["dominio"]}', $duration, 'Pendente', '{$_SESSION["navigator"]}', '-/-', '{$_SESSION["coord4"]}', '-/-', '-/-', '{$_SESSION["voo_che_mor"]}', '$gerado')";

 $result_arrival = mysqli_query($conn,$new_arrival);
 if ($result_arrival)
 {
    $success = 11; 
 }
 else
 { 
    $success =  '#20#';
 }

if ($success){

$obter_comp=" SELECT * FROM companhia WHERE 1";
 $result_comp = mysqli_query($conn, $obter_comp);
  if (mysqli_num_rows($result_comp) > 0) 
  {
    while($row = mysqli_fetch_assoc($result_comp)) 
    {
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
     $c_iban = $row["iban"];
     $c_terms = $row["termos"];
     $c_publicidade = $row["publicidade"];
    }
   }
  }
/*VALOR 2 TIPO PAGAMENTO RESPOSTA AO CLIENTE */
 $response = 2;
 }


 if ($_SESSION["payments"] =='Paypal'){


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
     $c_publicidade = $row["publicidade"];
    }
   }


      $servico = 'Chegada';

$pick = $_SESSION["from"].' - '.$_SESSION["voo_che_mor"];

/*RETURN PICK DATE CLIENT*/

$date_hour_array=explode(' ',trim($_SESSION["voo_che_dt"]));
$date_array = explode('/', $date_hour_array[0]);

$date=strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].'-00');
$timeok = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0].' '.$date_hour_array[1]);

$obs = '('. $_SESSION["pax"] .') '.$referencia.' | MTR | OBS: '. $_SESSION["obs"];

$voo = $_SESSION["voo_n_che"];

$gerado = $_SESSION["dominio"].'@'.date("Y-m-d H:i:s");


$new_arrival = "INSERT INTO excel(servico,data_servico, hrs, voo, nome_cl, email, local_recolha, local_entrega, px, cr, bebe, obs,operador,cobrar_operador,data_criacao, referencia, telefone, pais, criado_direto, end, estado, navigator, morada_recolha_gps, morada_entrega_gps, voo_horario, morada_recolha, morada_entrega, created_by)
    VALUES ( '$servico', $date, $timeok, '$voo', '{$_SESSION["nome"]}', '{$_SESSION["email"]}', '{$_SESSION["from"]}', '{$_SESSION["to"]}','{$_SESSION["adult"]}', '{$_SESSION["children"]}', '{$_SESSION["baby"]}', '$obs', 'Site Paypal', $val, '".date("Y-m-d H:i:s")."', '$referencia', '{$_SESSION["tel"]}', '{$_SESSION["country"]}','{$_SESSION["dominio"]}', $duration, 'Pendente', '{$_SESSION["navigator"]}', '-/-', '{$_SESSION["coord4"]}', '-/-', '-/-', '{$_SESSION["voo_che_mor"]}', '$gerado')";

         $result_arrival = mysqli_query($conn,$new_arrival);
         if ($result_arrival){
          $success = 11; 
        }
         else 
         {
            $success =  '#20#';
        }

        /*VALOR 3 TIPO PAGAMENTO RESPOSTA AO CLIENTE */
         $response = 3;
         }

         /* GERAR PDF E ENVIO DE EMAIL*/

            $pdf = new PDF();

            $pdf2 = new PDF();

            // PDF do HEADER que pertence a companhia do serviço 
            $pdf->companhia($c_nome,$c_logo,$c_morada,$c_cod_postal,$c_tel,$c_tlm,$c_email,$c_site,$c_nif,$c_ravt);

            $pdf2->companhia($c_nome,$c_logo,$c_morada,$c_cod_postal,$c_tel,$c_tlm,$c_email,$c_site,$c_nif,$c_ravt);


            $from = $c_email;

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',11);
        $pdf->SetAutoPageBreak(false);

        $pdf2->AliasNbPages();
        $pdf2->AddPage();
        $pdf2->SetFont('Arial','',11);
        $pdf2->SetAutoPageBreak(false);

        $pdfhead = $lang['YOUR_ORDER'].''.$referencia;

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,6,utf8_decode($pdfhead),1,0,'C');
        $pdf->Ln(9);

        $pdf2->SetFont('Arial','',9);
        $pdf2->Cell(0,6,utf8_decode($pdfhead),1,0,'C');
        $pdf2->Ln(9);


$sql=" SELECT * FROM excel WHERE referencia = '$referencia' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);


//initialize counter
$i=0;

//total services
$t=0;

//mais de 2 services por pagina cria pagina

$max = 2;
if (mysqli_num_rows($result) > 0) {
    $response .= 1; 
    while($row = mysqli_fetch_assoc($result))
     {
      if ($i == $max)
       {
        $pdf->AddPage();
        $i=0;
       }
        $dt_cr =$row['data_criacao'];
        $t=$t+1;
        $id = $row['id']; 
        $tel = $row['telefone'];
        $email_c = $row['email'];
        $pais = $row['pais'];
        $data_servico = date('d/m/Y',$row['data_servico']);
        $hrs = date('H:i',$row['hrs']);
        $tp_serv = $row['servico'];
        if($_SESSION["language"] == 'en-gb'){
        if($tp_serv == 'Chegada')
        $tp_serv = 'Arrival';
        elseif($tp_serv == 'Partida')
        $tp_serv = 'Departure';
        }

        $voo = $row['voo'];
        $nome = $row['nome_cl'];
        $local_pick_up = $row['local_recolha'];
        $local_destino=$row['local_entrega'];
        $morada_recolha = $row['morada_recolha'];
        $morada_entrega = $row['morada_entrega'];
        $px = $row['px'];
        $cr = $row['cr'];
        $bebe =$row['bebe'];
        $estado = $row['estado'];
        if (!$px) $px=0;
        if (!$cr) $cr=0;
        if (!$bebe) $bebe=0;

        if (!$voo) $voo='-/-';
        
        

                    if ($_SESSION['payments'] == 'Driver')
                    {
                        $payments = $lang['DRIVER'];
                       $acobrar = number_format($row['cobrar_direto'], 2, '.', '').''.chr(128);
                    }
                    elseif ($_SESSION['payments'] == 'Bank')
                    {
                      $payments = $lang['BANK'];
                       $acobrar = number_format($row['cobrar_operador'], 2, '.', '').''.chr(128);
                    }
                    elseif ($_SESSION['payments'] == 'Paypal')
                    {
                      $payments = "Paypal";
                      $acobrar = number_format($row['cobrar_operador'], 2, '.', '').''.chr(128);
                    }
                    else
                    {
                        $payments = "-/-";
                        $acobrar = "-/-";
                    }

                    // Verificar se existe valores nas observações feitas pelo cliente
                        if ($_SESSION['obs'] != '')
                        {
                            $obs_value = $_SESSION['obs'];
                        }
                        else
                        {
                            $obs_value = "-/-";
                        }

                    // Conteudo da Informação do Serviço dos Transfers
                        $pdf->SetY(45);
                        $pdf->SetTextColor(5,5,5);
                        $pdf->Cell(0,75,"",1,0,'L');
                        $pdf->Ln(0.3);
                        //Barra 1
                        $pdf->Cell(0.4,0,"",0,0,'L',true);
                        $pdf->SetFillColor(240,240,240);
                        //Tipo de Serviço
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(14.2,6,utf8_decode($lang['SERVICE']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(20,6,utf8_decode($tp_serv),0,0,'L',true);        
                        // Retorno
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(15,6,utf8_decode($lang['RETURN']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(10,6,utf8_decode($_SESSION["oneway"]),0,0,'L',true);
                        // Estado
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(10,6,utf8_decode($lang['STATE']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(15,6,utf8_decode($estado),0,0,'L',true);
                        //ID
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(5,6,utf8_decode('ID:'),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(10,6,$id,0,0,'L',true);
                        // Voo
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(12,6,utf8_decode($lang['FLIGHT']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(23,6,utf8_decode($voo),0,0,'L',true);
                        //Data
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(10,6,utf8_decode($lang['DATE']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(25,6,$data_servico,0,0,'L',true);
                        //Hora
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(10,6,utf8_decode($lang['TIME']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(10,6,$hrs,0,0,'L',true);
                        // Line Break
                        $pdf->Ln(8);
                        //Barra 2
                        $pdf->Cell(0.4,0,"",0,0,'L',true);
                        $pdf->SetFillColor(240,240,240);
                        // Nome Completo
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(14.2,6,utf8_decode($lang['NAME']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(32,6,utf8_decode($nome),0,0,'L',true);
                        // Email
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(14.2,6,utf8_decode($lang['EMAIL']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(65,6,utf8_decode($email_c),0,0,'L',true);
                        // Telefone
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(15,6,utf8_decode($lang['TEL']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(48.9,6,utf8_decode($tel),0,0,'L',true);
                        // Line break
                        $pdf->Ln(7);  
                        //Barra 3
                        $pdf->Cell(0.4,0,"",0,0,'L',true);
                        $pdf->SetFillColor(240,240,240);
                        // Pais
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(14.2,6,utf8_decode($lang['COUNTRY']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(32,6,utf8_decode($pais),0,0,'L',true);
                        // Numero do Quarto
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(32,6,utf8_decode($lang['ROOM']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(37,6,utf8_decode("-/-"),0,0,'L',true);
                        // Adultos
                        $pdf->SetFont('Arial','B',9);

                        $pdf->Cell(17,6,utf8_decode($lang['ADULT']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(10,6,$px,0,0,'L',true);
                        // Crianças
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(17,6,utf8_decode($lang['CHILDREN']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(10,6,$cr,0,0,'L',true);
                        // Bebe
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(10,6,utf8_decode($lang['BABY']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(10,6,$bebe,0,0,'L',true);
                        // Line break
                        $pdf->Ln(8);
                        //Barra 4
                        $pdf->Cell(0.4,0,"",0,0,'L',true);
                        $pdf->SetFillColor(240,240,240);
                        // Morada de Recolha
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(30,6,utf8_decode($lang['ADDR_RC']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(159.2,6,utf8_decode($morada_recolha),0,0,'L',true);
                        // Line break
                        $pdf->Ln(7);
                        //Barra 4
                        $pdf->Cell(0.4,0,"",0,0,'L',true);
                        $pdf->SetFillColor(240,240,240);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(189.2,6,utf8_decode($local_pick_up),0,0,'L',true);
                        // Line break
                        $pdf->Ln(7);
                        //Barra 6
                        $pdf->Cell(0.4,0,"",0,0,'L',true);
                        $pdf->SetFillColor(240,240,240);
                        // Morada de Recolha
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(30,6,utf8_decode($lang['ADDR_DV']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(159.2,6,utf8_decode($morada_entrega),0,0,'L',true);
                        // Line break
                        $pdf->Ln(7);
                        //Barra 7
                        $pdf->Cell(0.4,0,"",0,0,'L',true);
                        $pdf->SetFillColor(240,240,240);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(189.2,6,utf8_decode($local_destino),0,0,'L',true);
                        // Line break
                        $pdf->Ln(8);
                        // Barra 8
                        $pdf->Cell(0.4,0,"",0,0,'L',true);
                        $pdf->SetFillColor(240,240,240);
                        // Tipo de Pagamento
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(30,6,utf8_decode($lang['PAYMENT']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(30,6,utf8_decode($payments),0,0,'L',true);
                        // Valor
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(10,6,utf8_decode($lang['VALUE']),0,0,'L',true);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Cell(45,6,$acobrar,0,0,'L',true);
                        // Estado do Pagamento
                        $pdf->SetFont('Arial','B',9);
                        $pdf->Cell(35,6,utf8_decode($lang['STATE_PAY']),0,0,'L',true);
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
                        $pdf->Cell(189,9,utf8_decode($lang['OBSERVATIONS']),0,0,'L',true);
                        $txt = str_replace("<br>","",$obs_value);  
                        $txt = str_replace("\n\n",$pdf->Ln(1),$txt);
                        $pdf->SetFont('Arial','',9);
                        $pdf->Ln(6);
                        $pdf->SetFillColor(240,240,240);
                        $pdf->Cell(0.4,0,"",0,0,'L',true);
                        $pdf->MultiCell(189,4,utf8_decode($txt),0,1,true);
                        $i = $i + 1;
       }
    }

         if ($_SESSION['payments'] == 'Driver')
           {
                
                        $pdf->SetY(-130);
		        $pdf->SetTextColor(5,5,5);
		        $pdf->Cell(0,60,"",1,0,'L');
		        $pdf->Ln(4);
                        $pdf->SetFont('Arial','BU',9);
		        $pdf->Cell(40,0,utf8_decode($lang['TYPE_PAYMENT']),0,0,'L');
		        $pdf->Ln(4);
		        $pdf->SetFont('Arial','B',9);
		        $pdf->Cell(30,0,utf8_decode($lang['DRIVER']),0,0,'L');
		        $pdf->Ln(4);


		        $pdf2->SetY(40);
		        $pdf2->SetTextColor(5,5,5);
		        $pdf2->Cell(0,150,"",1,0,'L');
		        $pdf2->Ln(4);
		        $pdf2->SetFont('Arial','BU',9);
		        $pdf2->Cell(30,0,utf8_decode($lang['DRIVER']),0,0,'L');
		        $pdf2->Ln(4);


		        $str2=$c_terms;

		        $pdf2->Ln(10);
		        $pdf2->SetFont('Arial','BU',9);
		        $pdf2->Cell(35,0,utf8_decode($lang['TERMS_CONDITIONS']),0,0,'L');
		        $txt = str_replace("\n\n",$pdf->Ln(3),$txt);
                        $pdf2->Ln(10);
		        $pdf2->SetFont('Arial','',9);
		        
		        $pdf2->WriteHTML($str2);

		        $pdf->SetFont('Arial','BU',9);
		        $pdf->Cell(0,0,utf8_decode($lang['PUBLIC']),0,0,'L');
		        $txt2 = str_replace("<br>","",$c_publicidade);  
		        $txt2 = str_replace("\n\n",$pdf->Ln(3),$txt2);
		        $pdf->SetFont('Arial','',8);
		        $pdf->MultiCell(0,4,utf8_decode($txt2));

        }

        elseif ($_SESSION['payments'] == 'Bank')
        {
                        $pdf->SetY(-150);
		        $pdf->SetTextColor(5,5,5);
		        $pdf->Cell(0,130,"",1,0,'L');
		        $pdf->Ln(4);
                        $pdf->SetFont('Arial','BU',9);
		        $pdf->Cell(40,0,utf8_decode($lang['TYPE_PAYMENT']),0,0,'L');
		        $pdf->Ln(4);
		        $pdf->SetFont('Arial','B',9);
		        $pdf->Cell(30,0,utf8_decode($lang['BANK']),0,0,'L');
		        $pdf->Ln(5);
		        $pdf->SetFont('Arial','',8);
		        $pdf->Cell(30,0,utf8_decode($lang['PLEASE'].''.$lang['TRANSFER_AMOUNT']).''.number_format($val, 2, '.', '').''.chr(128).''.utf8_decode($lang['TRANSFER_TO']),0,0,'L');
		        $pdf->Ln(4);
		        $pdf->SetFont('Arial','',8);
		        $pdf->Cell(30,0,utf8_decode('IBAN :').''.$c_iban,0,0,'L');
		        $pdf->Ln(4);
		        $pdf->SetFont('Arial','',8);
		        $pdf->Cell(30,0,utf8_decode($lang['AFTER_PAYMENT'].' '.$c_email),0,0,'L');
		        $pdf->Ln(4);
		        $pdf->SetFont('Arial','',8);
		        $pdf->Cell(30,0,utf8_decode($lang['ORDER_N'].''.$referencia),0,0,'L');
		        $pdf->Ln(4);
		        $pdf->SetFont('Arial','',8);
		        $pdf->Cell(30,0,utf8_decode($lang['THANK_YOU']).''.$c_nome,0,0,'L');
		        $pdf->Ln(4);
		        

		        $pdf2->SetY(40);
		        $pdf2->SetTextColor(5,5,5);
		        $pdf2->Cell(0,180,"",1,0,'L');
		        $pdf2->Ln(4);
		        $pdf2->SetFont('Arial','BU',9);
		        $pdf2->Cell(30,0,utf8_decode($lang['BANK']),0,0,'L');
		        $pdf2->Ln(5);
		        $pdf2->SetFont('Arial','',8);
		        $pdf2->Cell(30,0,utf8_decode($lang['PLEASE'].''.$lang['TRANSFER_AMOUNT']).''.number_format($val, 2, '.', '').''.chr(128).''.utf8_decode($lang['TRANSFER_TO']),0,0,'L');
		        $pdf2->Ln(4);
		        $pdf2->SetFont('Arial','',8);
		        $pdf2->Cell(30,0,utf8_decode('IBAN :').''.$c_iban,0,0,'L');
		        $pdf2->Ln(4);
		        $pdf2->SetFont('Arial','',8);
		        $pdf2->Cell(30,0,utf8_decode($lang['AFTER_PAYMENT'].' '.$c_email),0,0,'L');
		        $pdf2->Ln(4);
		        $pdf2->SetFont('Arial','',8);
		        $pdf2->Cell(30,0,utf8_decode($lang['ORDER_N'].''.$referencia),0,0,'L');
		        $pdf2->Ln(4);
		        $pdf2->SetFont('Arial','',8);
		        $pdf2->Cell(30,0,utf8_decode($lang['THANK_YOU']).''.$c_nome,0,0,'L');
		        $pdf2->Ln(4);
		        
		        
		        $str2=$c_terms;

		        $pdf2->Ln(10);
		        $pdf2->SetFont('Arial','BU',9);
		        $pdf2->Cell(35,0,utf8_decode($lang['TERMS_CONDITIONS']),0,0,'L');
		        $txt = str_replace("\n\n",$pdf->Ln(3),$txt);
                        $pdf2->Ln(10);
		        $pdf2->SetFont('Arial','',9);
		        
		        $pdf2->WriteHTML($str2);

		        $pdf->SetFont('Arial','BU',9);
		        $pdf->Cell(0,0,utf8_decode($lang['PUBLIC']),0,0,'L');
		        $txt2 = str_replace("<br>","",$c_publicidade);  
		        $txt2 = str_replace("\n\n",$pdf->Ln(8),$txt2);
		        $pdf->SetFont('Arial','',8);
		        $pdf->MultiCell(0,4,utf8_decode($txt2));
        }

        elseif ($_SESSION['payments'] == 'Paypal'){
                        $pdf->SetY(-130);
		        $pdf->SetTextColor(5,5,5);
		        $pdf->Cell(0,100,"",1,0,'L');
		        $pdf->Ln(4);
                        $pdf->SetFont('Arial','BU',9);
		        $pdf->Cell(40,0,utf8_decode($lang['TYPE_PAYMENT']),0,0,'L');
		        $pdf->Ln(4);
		        $pdf->SetFont('Arial','B',9);
		        $pdf->Cell(30,0,utf8_decode($lang['PAYPAL']),0,0,'L');
		        $pdf->Ln(4);
		        


		        $pdf2->SetY(40);
		        $pdf2->SetTextColor(5,5,5);
		        $pdf2->Cell(0,150,"",1,0,'L');
		        $pdf2->Ln(4);
		        $pdf2->SetFont('Arial','BU',9);
		        $pdf2->Cell(30,0,utf8_decode($lang['PAYPAL']),0,0,'L');
		        $pdf2->Ln(4);
		        
		        
		        $str2=$c_terms;

		        $pdf2->Ln(10);
		        $pdf2->SetFont('Arial','BU',9);
		        $pdf2->Cell(35,0,utf8_decode($lang['TERMS_CONDITIONS']),0,0,'L');
		        $txt = str_replace("\n\n",$pdf->Ln(3),$txt);
                        $pdf2->Ln(10);
		        $pdf2->SetFont('Arial','',9);
		        
		        $pdf2->WriteHTML($str2);

		        $pdf->Ln(10);
		        $pdf->SetFont('Arial','BU',9);
		        $pdf->Cell(0,0,utf8_decode($lang['PUBLIC']),0,0,'L');
		        $txt2 = str_replace("<br>","",$c_publicidade);  
		        $txt2 = str_replace("\n\n",$pdf->Ln(3),$txt2);
		        $pdf->SetFont('Arial','',8);
		        $pdf->MultiCell(0,4,utf8_decode($txt2));
        }


        if ($_SESSION["language"] == 'en-gb'){

         $subject = "Order Confirmation nº ".$referencia." from ".$c_nome;

         $message = 'Thank you, for your order nº '.$referencia.', in attach details from the purchase.';
        if ($_SESSION["payments"] == 'Bank'){
         $message .= '<br><br>'.$lang['PLEASE'].''.$lang['TRANSFER_AMOUNT'].''.number_format($acobrar, 2, '.', '').'€<br>IBAN: '.$c_iban.'<br><br>'.$lang['AFTER_PAYMENT'].''.$c_email.'<br><br>'.$lang['ORDER_N'].''.$referencia.'.';
        }
        $message .= '<br><br>'.$lang['THANK_YOU'].''.$c_nome;
        }



        elseif ($_SESSION["language"] == 'pt'){
         $subject = "Confirmação da encomenda nº ".$referencia." de ".$c_nome;

         $message ='Obrigado pela sua encomenda nº '.$referencia.', em anexo pode visualizar os detalhes da compra.';
         if ($_SESSION["payments"] == 'Bank'){
          $message .= '<br><br>'.$lang['PLEASE'].''.$lang['TRANSFER_AMOUNT'].''.number_format($acobrar, 2, '.', '').'€<br>IBAN: '.$c_iban.'<br><br>'.$lang['AFTER_PAYMENT'].''.$c_email.'<br><br>'.$lang['ORDER_N'].''.$referencia.'.';
         }
         $message .= '<br><br>'.$lang['THANK_YOU'].''.$c_nome;
        }


        $subject_admin = utf8_decode("Foi efetuada uma encomenda com o n: $referencia"); 
        $message_admin = utf8_decode("Boas $c_nome, os detalhes da compra n: $referencia foram enviados para o cliente, visualize o anexo.");

        // a random hash will be necessary to send mixed content
        $separator = md5(time());

        // carriage return type (we use a PHP end of line constant)
        $eol = PHP_EOL;

        // attachment name
        $filename = $referencia.'_'.$lang['SERVICES'].".pdf";
        $filename2 = $referencia.'_'.$lang['TERMS'].".pdf";

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




        mail($email_c, $subject, $b, $headers);
        mail($from, $subject_admin, $b_admin, $headers);










         $todb[] = array(
                'errors' => 0,
                'invalid' => $response,
                'order' => $referencia,
                'data_criacao' => $dt_cr,
                'valores' => $res);
                echo json_encode($todb);
          }


  else {
   $not[] = array(
            'errors' => 1,  
            'invalid' => $errors,
            'order' => 0,
            'data_criacao' => 0);
    echo json_encode($not);
    }

break;


}
mysqli_close($conn);


?>