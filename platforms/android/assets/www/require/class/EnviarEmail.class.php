<?php
require 'libs/class.phpmailer.php';
require 'libs/class.smtp.php';
class EnviarEmail
{
	public function EnviarMensagem($emailCliente, $body, $subject)
	{
		$mail = new PHPMailer();
  //$mail->setLanguage('pt');
  $mail->setLanguage('pt_br', 'libs/');

//Variaveis de configuração do servidor do GMAIL

  $host     = 'smtp.gmail.com';
  $username = 'ellasnamodasp@gmail.com';//'rogerio.souza.usp@gmail.com';
  $password = '#FeC2111de2015';//'@9pcnotetv21';
  $port     = 587;
  $secure   = 'tls';

  $from     = $username;
  $fromName = 'Rogério Paula de Souza';

  $mail->isSMTP();
  $mail->Host = $host;
  $mail->SMTPAuth   = true;
  $mail->Username   = $username;
  $mail->Password   = $password;
  $mail->Port       = $port;
  $mail->SMTPSecure = $secure;

  $mail->From       = $from;
  $mail->FromName   = $fromName;
  $mail->addReplyTo($from, $fromName);

  //$mail->addAddress('rogerio.souza.usp@gmail.com', 'Cliente');
  $mail->addAddress($emailCliente, 'Cliente');

  $mail->isHTML(true);
  $mail->CharSet     = 'utf-8';
  $mail->WordWrap    = 70;

// Exemplos de texto para o e-mail com HTML e sem.

  //$mail->Subject     = 'Enviando E-mails com PHPMailer'; //
  $mail->Subject     = $subject; //
  //$mail->Body        = 'Enviando emails com <b>PHPMailer</b> na <h2>Video Aula</h2>'; //
  $mail->Body        = $body;
  //$mail->AltBody      = 'Enviando emails com PHPMailer na Video Aula';

// Faz a validação se a mensagem foi enviada para o servidor. 
  $send = $mail->Send();

  if($send)
      return 'E-mail enviado com sucesso!';
  else
      return 'Error : ' .$mail->ErrorInfo;

	}
	
}
?>