<?php 
	
	// Pegamos os dados vindo do formulário
	$nome = $_POST['nome'];
	$email = trim($_POST['email']);
	$telefone = $_POST['telefone'];
	$mensagem = $_POST['mensagem'];
	$contato = $_POST['contato'];
	$horario = $_POST['horario'];
	$aceite = $_POST['aceite'];
        $assunto = "Mensagem recebida do site";

         // Aqui iremos montar o conteúdo que será enviado em seu email
		$body = '
			<b>Mensagem enviada via Formulário</b>
			<br>
			<b>Nome:</b> '.$nome.'<br>
			<b>Email:</b> '.$email.'<br>
			<b>Telefone:</b> '.$telefone.'<br>
			<b>Mensagem:</b> '.$mensagem.'<br>
			<br>
			<b>Meio de contato escolhido:</b> '.$contato.'<br>
			<b>Horário preferencial:</b> '.$horario.'<br>
			<b>Autoriza envio de Newsletter?</b> '.$aceite.'<br>
			Mensagem enviada em: '.date('d/m/Y H:is').'
		';

		// Vamos o header do email conforme determina a RFC 822
		// O Return-Path deve ser o mesmo do From
		$headers = "MIME-Version: 1.1\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "From: alexandre@allrox.com.br\r\n";
		$headers .= "Return-Path: alexandre@allrox.com.br\r\n";
		$envio = mail("alexandre@allrox.com.br", $assunto, $body, $headers); 

		// Aqui iremos validar o envio com if
		if($envio){
			echo "<script>location.href='https://allrox.com.br/lab/alura/sucesso.html'</script>";
		} else {
			echo "OPS! Ocorreu um erro ao enviar seu email";
		}

?>