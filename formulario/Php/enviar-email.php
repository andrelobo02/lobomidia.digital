<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar'])) {

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '05acabouultima@gmail.com';                     //AQUI VOCÊ COLOCA O SEU GMAIL!//
    $mail->Password   = '28211408';                               //COLOQUE A SUA SENHA
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('05acabouultima@gmail.com', 'Novo Lead');         //aqui você coloca o mesmo Gmail//
    $mail->addAddress('05acabouultima@gmail.com', 'Joe User');     //Add a recipient
    $mail->addReplyTo('05acabouultima@gmail.com', 'Information');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Novo Lead Chegou! - Lobo Assessoria';

   $body = "mensagem eviada através do site, segue as informações abaixo:<br>
    Nome: ". $_POST['nome']." <br>
    E-mail: ". $_POST['email']."<br>
    Telefone: ".$_POST['phone'];

    $mail->Body    = $body;

    $mail->send();
    echo 'email enviando com sucesso';
} catch (Exception $e) {
    echo "erro ao enviar o email: {$mail->ErrorInfo}";
}
else {
    echo"Erro ao enviar email, aceso não foi enviado";
}
}