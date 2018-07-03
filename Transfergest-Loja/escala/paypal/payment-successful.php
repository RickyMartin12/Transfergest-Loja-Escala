<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Payment Successful</title>
</head>
<body>
	<h1>Pagamento efetuado. Obrigado</h1>
<?php

include("functions.php");
echo "<pre>".var_dump ($_POST)."</pre>";

                $valid_txnid = check_txnid($_POST['txn_id']);
				$valid_price = check_price($_POST['mc_gross'], $_POST['item_number']);
				// PAYMENT VALIDATED & VERIFIED!
				if ($valid_txnid && $valid_price) {
					echo 'id e val ok';
					$orderid = updatePayments($_POST);

					if ($orderid) {
                        echo 'gravado db ok';
						// Payment has been made & successfully inserted into the Database
					} else {
						echo ' db ko';
						// Error inserting into DB
						// E-mail admin or alert user
						// mail('user@domain.com', 'PAYPAL POST - INSERT INTO DB WENT WRONG', print_r($data, true));

					}
				} else {
					echo 'gravado db data mudou ';
					// Payment made but data has been changed
					// E-mail admin or alert user
				}
?>


</body>
</html>
