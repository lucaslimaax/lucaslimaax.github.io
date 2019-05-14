<?php
require 'mailer/PHPMailerAutoload.php';

if (isset($_POST['assunto']) && !empty($_POST['assunto']))  {
    $assunto = $_POST['assunto'];
}
if (isset($_POST['nome']) && !empty($_POST['nome']))  {
    $name = $_POST['nome'];
}    
if (isset($_POST['email']) && !empty($_POST['email']))  {
    $email = $_POST['email'];
}
if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
    $mensagem = $_POST['mensagem'];
}
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Username = 'lucaslimaxti@gmail.com';
$mail->Password = 'Limax@ti';
$mail->Port = 465;


$mail->setFrom('lucaslimaxti@gmail.com');
$mail->addReplyTo($_POST['email']);
$mail->addAddress('lucaslimaxti@gmail.com','Lucas Ti');
/*$mail->addAddress('email@email.com.br', 'Contato');
$mail->addCC('email@email.com.br', 'Cópia');
$mail->addBCC('email@email.com.br', 'Cópia Oculta');*/

$mail->isHTML(true);
$mail->Subject = utf8_decode($assunto);
$mail->Body .= "<b> Nome:</b> ".$_POST['nome']."<br>";
$mail->Body .= "<b> E-mail:</b> ".$_POST['email']."<br><br>";
$mail->Body .= "<b> Mensagem:</b> ".nl2br($_POST['mensagem'])."<br>";
$mail->AltBody =(strip_tags($mensagem));
/*$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');*/

if(!$mail->send()) {
    echo ("<script>
        window.alert('Ocorreu um erro. Tente novamente mais tarde :( ')
        window.location.href='https://lucaslimaax.github.io/';
    </script>");
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
     
echo ("<script>
        window.alert('Email Enviado :D\\nBreve iremos retornar! ')
        window.location.href='https://lucaslimaax.github.io/';
    </script>");
}


?>