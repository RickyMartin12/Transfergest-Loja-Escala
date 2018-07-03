 


<?php

session_start();

include('nocsrf.php');






header('Access-Control-Allow-Origin: *');

$error_msg = '';


class GoogleRecaptcha 
{
    /* Google recaptcha API url */
    private $google_url = "https://www.google.com/recaptcha/api/siteverify";
    private $secret = '6LfM8xcUAAAAAPi5DwhGGpLl2VD590CryMb8i6Mr';
    public function VerifyCaptcha($response)
    {
        $url = $this->google_url."?secret=".$this->secret.
               "&response=".$response;
 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); 
        $curlData = curl_exec($curl);
 
        curl_close($curl);
 
        $res = json_decode($curlData, TRUE);
        if($res['success'] == 'true'){
            return TRUE;
}
        else
            return FALSE;
    }
}









if($_SERVER["REQUEST_METHOD"] == "POST") {

   try
    {
        NoCSRF::check('csrf_token', $_POST, true, 600, true );
        
        //$error_msg .= 'CSRF check passed. Form parsed.';

      if(! get_magic_quotes_gpc() )
      {

         $name = addslashes ($_POST['Nome']);

         $email_address = addslashes ($_POST['Email']);

         $telefone = addslashes ($_POST['Telefone']);

         $subject = addslashes ($_POST['Assunto']);

         $message = addslashes ($_POST['Mensagem']);
      }

      else
      {

         $name = $_POST['Nome'];

         $email_address = $_POST['Email'];

         $telefone = $_POST['Telefone'];

         $subject = $_POST['Assunto'];

         $message = $_POST['Mensagem'];
      }


        

    }
    catch ( Exception $e )
    {
        // CSRF attack detected
        $error_msg .= $e->getMessage() . ' Form ignored.';
    }


    
}


if ($name == '')
{
  $error_msg .= '<p> - Insira o Nome </p>';
}
if ($email_address == '')
{
  $error_msg .= '<p> - Insira o Email </p>';
  
}
if ($email_address != '')
{
  $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

  if (!preg_match($regex, $email_address )) {
    $error_msg .= " <p> - ".$email_address . " email inválido </p>";
  }
}
if ($telefone == '')
{
  $error_msg .= '<p> - Insira o Numero de Telefone </p>';
}
if ($telefone != '')
{
  if (!is_numeric($telefone)) {
        $error_msg .= "<p> - Insira o Numero de Telefone Válido.</p>";
    }
}

if($subject == '')
{
  $error_msg .= '<p> - Insira o Tipo de Assunto </p>';
}
if($message == '')
{
  $error_msg .= '<p> - Insira Mensagem </p>';
}

if ($error_msg == '')
{


$response = $_POST['g-recaptcha-response'];

$to = 'info@transfergest.com';

//$to = 'ricardo@oseubackoffice.com';





$header2 = "MIME-Version: 1.0 \r\n"; 
$header2 .= "Content-Type: text/html; charset=UTF-8 \r\n"; 
$header2 .= "From:".$to."\r\n"; 

$email_subject = "Pedido de Informacoes";

$email_body_supplier =

"

<h4>Foram pedidas as seguintes informacoes (pt-PT):</h4>

<hr><b>Nome:</b> $name<br /><br />

<b>Email:</b> $email_address<br /><br/>

<b>Telefone:</b> $telefone<br /><br/>

<b>Assunto:</b> $subject<br /><br />

<b>Mensagem:</b> $message<hr>

</div>";



$email_body_client = 

"<div style='width:95%; margin-left:2.5%;'>

<h4>Pedido de informações submetido, em breve receberá a informacao pretendida.</h4>

<hr><b>Nome:</b> $name<br /><br />

<b>Email:</b> $email_address<br /><br/>

<b>Telefone:</b> $telefone<br /><br/>

<b>Assunto:</b> $subject<br /><br />

<b>Mensagem:</b> $message<hr>

Obrigado $name, escala.transfergest.com.

</div>";




if(isset($response))
    {
          $cap = new GoogleRecaptcha();
          $verified = $cap->VerifyCaptcha($response);
          if($verified) {
           mail($to,$email_subject,$email_body_supplier,$header2);
          echo 1;
           mail($email_address,$email_subject,$email_body_client,$header2);
           echo 1;
          } else {
          echo 4;
          }
    }

}




  echo $error_msg;



?>





