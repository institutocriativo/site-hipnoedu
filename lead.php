<?php

$name = "";
$telefone = "";
$email = "";
$message = "";

$errstr = "";

function validate_input($data) {
    $data = trim($data);
    # $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return substr($data, 0, 5096);
}

function sendMail($msg) {
    $to="contato@hipnoedu.com.br";
    $subject='Novo Contato pelo Hipnoedu';
    $content='<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Novo contato</title>
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
    </head>
    <body>
    <h3>Um novo contato através do HipnoEdu</h3>
    <p>Nome:'. $msg[0] .'</p>
    <p>E-mail:'. $msg[1] .'</p>
    <p>Telefone:'. $msg[2] .'</p>
    <p>Messagem:'. $msg[3] .'</p>
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
        #echo($name);
    } else {
        $errstr = $errstr . "Nome em branco.\n";
    }

    $message = validate_input($_POST["message"]);
    if(is_string($message)) {
        #echo($message);
    } else {
        $message = "";
    }

    $telefone = validate_input($_POST["telefone"]);
    if(is_string($telefone)) {
        #echo($telefone);
    } else {
        $telefone = "";
    }

    $email = validate_input($_POST["email"]);
    if(is_string($email) and $email != "" and filter_var($email, FILTER_VALIDATE_EMAIL)) {
        #echo($email);
    } else {
        $errstr = $errstr . "E-mail inválido.\n";
    }

    if(strlen($errstr) == 0)
        echo(sendMail(array($name, $email, $telefone, $message)));
    else
        echo($errstr);
}

?>