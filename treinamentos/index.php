<?php
	if($_SERVER["HTTPS"] != "on")
	{
		header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		exit();
	}

# INSERT INTO `subscriptions` (`NAME`, `CPF`, `EMAIL`, `TELEFONE`, `CONTACT`, `PAYMENT`) VALUES ('Vitor', '123', 'a@s', '1233', '1', '1')

$errstr = "";

$allok = false;

$name = "";
$validname = false;
$errname = "";

$usercpf = "";
$cpf = "";
$validcpf = false;
$errcpf = "";

$telefone = "";
$validtelefone = false;
$errtelefone = "";

$email = "";
$validemail = false;
$erremail = "";

$contact = 1;
$payment = 1;

$errstr = "";

$Database_Name = 'instit93_kraisch';
$Database_Username = 'instit93_krsch_h';
$Database_Password = 'dahgaz-pufPoj-8bitxa';

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return substr($data, 0, 254);
}

function verifycpf($cpf) {
    if(strlen($cpf) == 11 and
    $cpf != '00000000000' and
    $cpf != '11111111111' and
    $cpf != '22222222222' and
    $cpf != '33333333333' and
    $cpf != '44444444444' and
    $cpf != '55555555555' and
    $cpf != '66666666666' and
    $cpf != '77777777777' and
    $cpf != '88888888888' and
    $cpf != '99999999999') {
        $d1 = 0;
        for ($i=8; $i >= 0; $i--) {
            $d1 += $cpf{$i} * ($i + 1);
        }
        $d1 = ($d1 % 11) % 10;
        $d2 = 0;
        for ($i=8; $i >= 0; $i--) {
            $d2 += $cpf{$i} * ($i);
        }
        $d2 = (($d2 + ($d1 * 9)) % 11) % 10;
        if ($cpf{9} == $d1 and $cpf{10} == $d2) {
            return true;
        }
    }
    return false;
}

function sendMail($msg) {
    $to="contato@hipnoedu.com.br";
    $subject='Nova Inscricao Curso Hipnoedu';
    $content='<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova Inscrição</title>
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
    </head>
    <body>
    <h3>Uma nova inscrição para o curso do hipnoedu</h3>
    <p>Nome:'. $msg[0] .'</p>
    <p>CPF:'. $msg[1] .'</p>
    <p>Email:'. $msg[2] .'</p>
		<p>Telefone:'. $msg[3] .'</p>
		<p>Contato Preferido:'. $msg[4] .'</p>
		<p>Forma de pagamento:'. $msg[5] .'</p>
    </body>
    </html>';
    $headers='From: Relacionamento HipnoEdu <relacionamento@hipnoedu.com.br>' . "\r\n";
    $headers.='Reply-To: Relacionamento HipnoEdu <relacionamento@hipnoedu.com.br>' . "\r\n";
    $headers.='X-Mailer: PHP/' . phpversion() ."\r\n";
    $headers.= 'MIME-Version: 1.0' . "\r\n";
    $header .= "Content-Transfer-Encoding: 8bit \r\n";
    $header .= "Date: ".date("r (T)")." \r\n";
		$headers.= 'Content-type: text/html; charset=UTF-8 '. "\r\n";
		
    if (mail($to, $subject, $content, $headers)) {
    return "Tudo certo, entraremos em contato assim que possível.";
    } else {
    return "Houve um erro ao processar o formulário, tente novamente mais tarde.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $name = validate_input($_POST["name"]);
    if(is_string($name) and $name != "") {
        $validname = true;
    } else {
        $errname = "Nome em branco.";
	}

	$usercpf = validate_input($_POST["cpf"]);
	$cpf = $usercpf;
	$cpf = preg_replace("/[^0123456789]/", "", $cpf);
    if(is_string($cpf) and $cpf != "" and !(preg_match("/[^0123456789]/", $cpf)) and verifycpf($cpf)) {
        $validcpf = true;
    } else {
        $errcpf = "CPF inválido.";
    }

    $telefone = validate_input($_POST["phone"]);
    if(is_string($telefone)) {
        $validtelefone = true;
    } else {
        $errtelefone = "Telefone vazio";
    }

    $email = validate_input($_POST["email"]);
    if(is_string($email) and $email != "" and filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validemail = true;
    } else {
        $erremail = "E-mail inválido.";
	}

	$contact = (int) validate_input($_POST["contact"]);
	if($contact == 0) $contact = 1;
	if($contact == 1) $contactin = "email";
	if($contact == 2) $contactin = "telefone";
	
	
	$payment = (int) validate_input($_POST["payment"]);
	if($payment == 0) $payment = 1;
	if($payment == 1) $paymentin = "boleto";
	if($payment == 2) $paymentin = "cartao";

	
	$errstr = $errname . $errcpf . $errtelefone . $erremail;

    if(strlen($errstr) == 0) {
		$Database_connection = mysqli_connect("localhost", $Database_Username, $Database_Password, $Database_Name);
		if($Database_connection === false) {
			$errstr = "Ocorreu um erro interno, tente mais tarde";
		} else {
			mysqli_set_charset($Database_connection,"utf8");
			$sql = 'INSERT INTO `subscriptions` (`NAME`, `CPF`, `EMAIL`, `TELEFONE`, `CONTACT`, `PAYMENT`) VALUES ("'.$name.'", "'.$cpf.'", "'.$email.'", "'.$telefone.'", "'.$contact.'", "'.$payment.'");';
			if(mysqli_query($Database_connection, $sql)){
				$errstr = sendMail(array($name, $cpf, $email, $telefone, $contactin, $paymentin));
				$allok = true;
			} else {
				$errstr = "Ocorreu um erro interno, tente mais tarde";
			}
		}
	} else {
		$errstr = "Corrija o formulário";
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0"/>
		<meta name="keywords" content="hipnoterapia, hipnoterapia sp, hipnose, omni, terapia omni"/>
		<meta name="description" content="O Hipnoedu é especializado em hipnoterapia avançada e, em parceria com o Instituto de Educação Criativa, visa o desenvolvimento pessoal a partir do conhecimento."/>
		<title>
			HipnoEdu - Treinamentos
		</title>
		<link rel="icon" type="image/x-icon" href="/res/hipnoedu.favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="/style.css"/>
		<link rel="stylesheet" type="text/css" href="treinamentos.css"/>
	</head>
	<body>
		<div class="dep-container" id="inicio">
			<div class="course-container">
				<div class="course-title">
					<h1>Tópicos Avançados em Hipnoterapia</h1>
				</div>
				<div class="course-briefing">
					<h2><i>Inscrições Abertas</i></h2>
					<h2>Sobre</h2>
					<p>
						Um curso elaborado para hipnoterapeutas que buscam ampliar e aprimorar suas técnicas para melhorar ainda mais a qualidade dos seus atendimento.
					</p>
					<p>
						Dentre os assuntos abordados no curso estão:
					</p>
					<ul>
						<li>- Regressão Avançada, utilizando Terapia de Partes e DDT orientado.</li>
						<li>- Aperfeiçoando a consulta de Avaliação: como aumentar a conversão das avaliações</li>
						<li>- Como manter registro das consultas para acompanhamento</li>
						<li>- Como atuar nas consultas de retorno</li>
						<li>- Aprimorando o Compounding e DDT</li>
						<li>- Compreendendo e trabalhando com os vínculos emocionais aos pais e familiares</li>
					</ul>
					<p>Ao fim do curso você receberá um certificado de conclusão e o acesso a um grupo de WhatsApp restrito para tirar dúvidas e compartilhar experiências.</p>
					<div class="spacer"></div>
					<h2>Requisito</h2>
					<p>Para participar do curso é necessário que você seja um hipnoterapeuta <b>OMNI</b>.</p>
					<div class="spacer"></div>
					<h2>Instrutor</h2>
						<img class="float right img-profile" src="res/kraisch.jpg" />
						<h4>Rafael José Kraisch</h4>
						<h5>Hipnoterapeuta e Instrutor da OMNI Brasil</h5>
					<p>
Rafael é um apaixonado pela mente humana desde sua adolescência e acredita que a mente humana tem a capacidade de encontrar uma solução efetiva para seus problemas e que as pessoas não precisam sofrer por anos em terapias sem fim, gastando fortunas com remédios duvidosos e sendo cobaias de empresas farmacêuticas.
					</p>
					<p>
Sua jornada começou cedo, com apenas 11 anos de idade, ao descobrir o poder da meditação e da filosofia oriental em suas aulas de caratê.
					</p>
					<p>
Aos 15 anos descobriu o yoga e aos 20 anos já era palestrante e exímexperimente e personalize seu Kit Habib'sio professor, tendo, inclusive, ensinado a história e prática da filosofia hindu por vários anos em cursos de formação de instrutores de yoga.
					</p>
					<p>
Com esta visão, estudou e praticou com os melhores profissionais da área, dentro e fora do Brasil, indo até a Alemanha duas vezes para estudar Constelação Familiar diretamente com seu criador, Bert Hellinger. No campo da hipnose, participou do primeiro treinamento da OMNI Hypnosis no Brasil e imediatamente se destacou no uso da hipnoterapia como profissão.
					</p>
					<p>
Em conjunto com os conhecimentos da OMNI Hypnosis, Rafael aplicou sua outra paixão, o empreendedorismo. Estudou marketing por conta própria e aos poucos foi colhendo os frutos, até que trocou um bom emprego público para realizar seu grande sonho: dedicar-se integralmente à hipnose.
					</p>
					<p>
Transformou seu consultório em um negócio de excelência, ao ponto de atender 20 clientes por semana, de forma constante. Hoje, além da vasta experiência em hipnoterapia, seus alunos também adoram suas dicas e insights de marketing que lhe ajudaram a construir o sucesso do próprio negócio.
					</p>
					<p>
Trabalha em tempo integral como hipnoterapeuta e instrutor de hipnose, onde utiliza todo o conhecimento da meditação yogi, da visão sistêmica da Constelação Familiar e das poderosas ferramentas ensinadas pela OMNI, tornando-o reconhecido pela extrema eficácia nos atendimentos, onde muitas vezes, em apenas uma única sessão, é capaz de transformar, completamente, o destino de uma pessoa.
					</p>
				</div>
				<hr/>
				<div class="course-details">
					<div class="course-detail-card course-detail-location flex col">
						<h2>Local</h2>
						<div class="flex-spacer"></div>
						<p>Em definição</p>
					</div>
					<div class="course-detail-card course-detail-dates flex col">
						<h2>Datas e Horários</h2>
						<div class="flex-spacer"></div>
						<div class="date">
							<div class="day">
								<img src="res/calendar.svg">4 de maio (sab)
							</div>
							<div class="hour">
								<img src="res/alarm-clock.svg">9h às 19h
							</div>
						</div>
						<div class="date">
							<div class="day">
								<img src="res/calendar.svg">5 de maio (dom)
							</div>
							<div class="hour">
								<img src="res/alarm-clock.svg">9h às 19h
							</div>
						</div>
					</div>
					<div class="course-detail-card course-detail-payment flex col">
						<h2>Formas de Pagamento</h2>
						<div class="flex-spacer"></div>
						<div>
							<img src="res/money.svg"/> <span style="font-size: 1.2rem; font-weight: bold;"> De <span style="text-decoration: line-through">R$ 2497,00 </span> <br/> Por R$ 1997,00 </span> <br/> à vista: boleto via internet ou
						</div>	
						<div style="margin-top:1rem; font-size: 0.8rem;">
							<img src="res/credit-card.svg"/> <span style="font-weight: bold;"> R$ 2497,00 </span> parcelado em até 3x: cartão de crédito na sede do Hipnoedu
						</div>
					</div>
				</div>
				<hr/>
				<div class="course-payment flex col" id="kraisch-form" <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo 'autofocus';?>>
					<h2> Inscreva-se </h2>
					<div class="error"><?php echo $errstr?></div>
					<?php 
					if($allok) {
						echo '</div>
						<div class="course-organizers">
							
						</div>
					</div>
		
		
					<div>Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
		
		
				</div>
				<div class="header">
						<div class="item left">
							<a href="/">
								<img src="/res/hipnoedu.logo.std.h.ai.svg"/>
							</a>
						</div>
						<div class="item right">
							<a href="#">Treinamentos</a>
						</div>
					</div>
				</div>
				<!-- Global site tag (gtag.js) - Google Analytics -->
				<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116314414-1"></script>
				<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag("js", new Date());
			
				gtag("config", "UA-116314414-1");
				</script>
				<script>
					function headerfix() {
						window.scrollBy(0, -16*4);
					}
					setTimeout(headerfix, 1000);
				</script>
			</body>
		</html>';
		exit();
					}
					?>
					<form action="/treinamentos/index.php" method="post">
						<h6>Nome Completo</h6>
						<div class="error"><?php echo $errname?></div>
						
						<input type="text" class="user-input large" name="name" id="kraisch-name" placeholder="João Sales" value="<?php echo $name?>">
						<h6>CPF</h6>
						<div class="error"><?php echo $errcpf?></div>
						<input type="text" class="user-input short" name="cpf" id="kraisch-cpf" placeholder="123.456.789-00" value="<?php echo $usercpf?>">
						<h6>Email</h6>
						<div class="error"><?php echo $erremail?></div>
						<input type="text" class="user-input large" name="email" id="kraisch-email" placeholder="joao@sales.com" value="<?php echo $email?>">
						<h6>Telefone</h6>
						<div class="error"><?php echo $errtelefone?></div>
						<input type="text" class="user-input short" name="phone" id="kraisch-phone" placeholder="(11) 91234-1234" value="<?php echo $telefone?>">
						<h6>Meio de contato preferencial</h6>
						<div class="radio">
							<input type="radio" name="contat" id="kraisch-contact" value="1" <?php if($contact == 1) echo "checked"; ?>> Email
						</div>
						<div class="radio">
							<input type="radio" name="contat" id="kraisch-contact" value="2" <?php if($contact == 2) echo "checked"; ?>> Telefone
						</div>
						<h6>Forma de pagamento</h6>
						<div class="radio">
							<input type="radio" name="payment" id="kraisch-payment" value="1" <?php if($payment == 1) echo "checked"; ?>> À vista
						</div>
						<div class="radio">
							<input type="radio" name="payment" id="kraisch-payment" value="2" <?php if($payment == 2) echo "checked"; ?>> Parcelado
						</div>
						<input type="submit" class="submit" value="Enviar"/>
					</form>
				</div>
				<div class="course-organizers">
					
				</div>
			</div>


			<div>Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>


		</div>
		<div class="header">
				<div class="item left">
					<a href="/">
						<img src="/res/hipnoedu.logo.std.h.ai.svg"/>
					</a>
				</div>
				<div class="item right">
					<a href="#">Treinamentos</a>
				</div>
			</div>
		</div>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116314414-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
	
		gtag('config', 'UA-116314414-1');
		</script>
		<script>
			function headerfix() {
				window.scrollBy(0, -16*4);
			}
			setTimeout(headerfix, 1000);
			
		</script>
    </body>
</html>
