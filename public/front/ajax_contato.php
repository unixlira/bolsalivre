<?php
//Variáveis
 
$nome = $_REQUEST["nome"];
$email = $_REQUEST["email"];
$telefone = $_REQUEST["telefone"];
$mensagem = $_REQUEST["mensagem"];
$data_envio = date('d/m/Y');

// Compo E-mail
  $arquivo = "
	<table align='center' width='650' border='0' cellpadding='0' cellspacing='0' style='background-color:#ffffff border: 1px #243373 solid !important;'>
		<tbody>
			<tr>
				<td>
					<img src='http://homolog.bolsalivre.com/front/img/logotipo_bolsalivre.png' width='150' height='67' style='display:block;margin:10px auto;border:none'/>
				</td>
			</tr>
			<tr style='background-color:#243373'>
				<td>
					<p style='margin:0;padding:30px 0;color:#ffffff;font-family:Arial;text-align:center;font-weight:700;font-size:25px'>DADOS DO CONTATO</p>
				</td>
			</tr>
			<tr><td style='padding:10px;font-size:14px;font-family:Arial'>Nome: $nome</td></tr>
			<tr><td style='padding:10px;font-size:14px;font-family:Arial'>E-mail: $email</td></tr>
			<tr><td style='padding:10px;font-size:14px;font-family:Arial'>Telefone: $telefone</td></tr>
			<tr><td style='padding:10px;font-size:14px;font-family:Arial'>Mensagem: $mensagem</td></tr>
			<tr><td style='padding:10px;font-size:14px;font-family:Arial'>Data do envio: $data_envio</td></tr>
			<tr style='background-color:#243373'><td style='height: 50px;'></td></tr>
		</tbody>
	</table>
  ";

//enviar
   
  // emails para quem será enviado o formulário
  $emailenviar = "sua@bolsalivre.com";
  $destino = $emailenviar;
  $assunto = "Contato Website Bolsa Livre";
 
  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
      $headers .= "From: $nome <sua@bolsalivre.com>";
  //$headers .= "Bcc: $EmailPadrao\r\n";
   
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
  $mgm = "sucesso";
  echo $mgm;
  } else {
  $mgm = "erro";
  echo "";
  echo $mgm;
  }
?>