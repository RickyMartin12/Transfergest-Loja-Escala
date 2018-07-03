<?php

session_start();

include('nocsrf.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{

   try
    {
        // Run CSRF check, on POST data, in exception mode, for 10 minutes, in one-time mode.
        NoCSRF::check('csrf_token', $_POST, true, 600, true );
        // form parsing, DB inserts, etc.
        // ...
        $result = 1;
    }
    catch ( Exception $e )
    {
        // CSRF attack detected
        $result = 0;
    }


$nm = $_POST['name'];
$psw = $_POST['password'];

}

$arr = array('csrf'=>$result,'n'=>$nm,'p'=>$psw);
echo json_encode($arr);

//echo $result.'<br>'.$nm.'<br>'.$psw;
?>
