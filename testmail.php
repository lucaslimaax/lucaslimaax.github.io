<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

$from = "lucashendall@gmail.com";

$to = "lucashendall@gmail.com";

$subject = "Verificando o correio do PHP";

$message = "O correio do PHP funciona bem";

$headers = "De: LImax TI". $from;

mail($to, $subject, $message, $headers);

echo "A mensagem de e-mail foi enviada.";

?>
