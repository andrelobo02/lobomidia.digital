<?php

$nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);
$telefone = addslashes($_POST['telefone']);
$instagram = addslashes($_POST['instagram']);

$para = "andrecnlobo@gmail.com";
$assunto = "Novo lead";

$corpo = "Nome: ".$nome."\n"."Email: ".$email."\n"."telefone: ".$telefone."\n"."instagram: ".$instagram;

$cabeca = "From: andrecnlobo@gmail.com"."\n"."Reply-to: ".$email."\n"."X=Mailer:PHP/".phpversion();

if(mail($para, $assunto, $corpo, $cabeca)) {

  echo("Email enviado com sucesso");

}

else{
  echo("houve um erro.");
}

?>