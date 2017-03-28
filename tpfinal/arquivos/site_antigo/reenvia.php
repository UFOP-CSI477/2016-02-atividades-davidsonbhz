<?php

include './conexao.php';
include './fpdf181/fpdf.php';
//require_once('./FPDI-1.6.1/fpdf.php');
//require_once('./FPDI-1.6.1/fpdi.php');

require_once('./PHPMailer/PHPMailerAutoload.php');

$linha = 20;

/*
 * Estados: 
 * 0 - nenhuma ação executada
 * 1 - cadastro efetuado com sucesso
 * 2 - erro de processamento
 */

echo "Selecionando: ";
$r = mysqli_query($conexao,"select * from candidato where enviado=0 or enviado is null order by nome ");
echo "Linhas: ".mysqli_num_rows($r)."\n";

while($l=mysqli_fetch_assoc($r)) {
//    echo $l['nome'];
    reenvia($l);
}
echo "Pronto";

function reenvia($l) {
    global $conexao;
    $id = $l['candidato'];    
    echo "Candidato: ".$l['nome']." $id ";
    //die;
    
    $nome = cleanString($l['nome']);
    $endereco = cleanString($l['endereco']);
    $bairro = cleanString($l['bairro']);
    $cidade = cleanString($l['cidade']);
    $cep = cleanString($l['cep']);
    $cpf = cleanString($l['cpf']);

    $processoseletivo = $l['processoseletivo'];

    
    $rg = $l['rg'];
    $a = explode("/", $l['nascimento']);

    $email = cleanString($l['email']);

    //$email = "davidsonbhz@gmail.com";

    $codigo = "";
    $ip = "";
    
    $mat = $id;

    $datareg = date('Y-m-d');

    $from = "Sistema <rumo.ufop@gmail.com>";
    $to = $email;
    $subject = "Inscrição efetuada!";
    $body = "Aviso: Caso ja tenha recebido seu comprovante favor desconsiderar esta mensagem. \n\nSua Inscrição para o processo seletivo foi realizada com sucesso, em anexo está o seu comprovante de inscrição, você deve imprimi-lo e apresenta-lo juntamente com os demais documentos citados no edital e o alimento no local/endereço assim como é descrito no edital.\n\nNúmero da inscrição:\n$mat\n\n(este é um email automático, não precisa respondê-lo)";


    $host = "smtp.gmail.com";
    $username = "rumo.ufop@gmail.com";
    $password = "prevestrumo2012";

    chdir("inscricoes");
    system("wget http://www.rumoauniversidade.ufop.br/sistema/inscricoes/$id.pdf");
/*
    $host = "paralamas.ufop.br";
    $username = "rumoau@rumoauniversidade.ufop.br";
    $password = "BDVOcB64Lz";

    $host = "email-ssl.com.br";
    $username = "sistema@albeom.com.br";
    $password = "ufop2017*";

*/
    $emailsender = "sistema@rumoauniversidade.com.br";
    //$emailsender = "sistema@albeom.com.br";

    $headers = "MIME-Version: 1.1\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: $from\r\n"; // remetente
    $headers .= "Return-Path: $from\r\n";


    $mail = new PHPMailer();
    $mail->From = $from;
    $mail->AddReplyTo('rumo.ufop@gmail.com', 'Sistema');
//    $mail->SetFrom('rumo.ufop@gmail.com', 'Sistema');

    $mail->FromName = 'Sistema';
    $mail->Subject = "Inscrição $mat";
    $mail->Body = $body;
    $mail->addCC("rumo.ufop@gmail.com");
    $mail->AddAddress($email);
    $mail->AddAddress("rumo.ufop@gmail.com", "Sistema");


    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = $host; // SMTP server
    $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->Host = $host; // sets the SMTP server
    $mail->Port = 587;                    // set the SMTP port for the GMAIL server
    $mail->Username = $username; // SMTP account username
    $mail->Password = $password;        // SMTP account password

    $mail->SetFrom($emailsender, 'Sistema');


    $file_to_attach = "inscricoes/$mat.pdf";
    chdir("../");
    if(!file_exists($file_to_attach)) {
        die("$file_to_attach  nao encontrado!");
    }

    $mail->AddAttachment($file_to_attach, 'comprovante.pdf');

    $mail->Send();

    echo "Email enviado: $email\n";
    mysqli_query($conexao, "update candidato set enviado=1 where candidato=$id");

   
    //die;

}

function finaliza($stat, $msg) {
    //die("status=$stat; msg=\"$msg\";");
    die();
}


function cleanString($text) {

    $text = str_replace("'", " ", $text);
    $text = str_replace("\"", " ", $text);
    $text = str_replace("Á", "A", $text);
    $text = str_replace("É", "E", $text);
    $text = str_replace("Í", "I", $text);
    $text = str_replace("Ó", "O", $text);
    $text = str_replace("Ú", "U", $text);
    $text = str_replace("Ç", "C", $text);
    $text = str_replace("Ã", "A", $text);
    $text = str_replace("Õ", "O", $text);
    $text = str_replace("À", "A", $text);
    $text = str_replace("È", "E", $text);
    $text = str_replace("Ã", "A", $text);
    $text = str_replace("á", "a", $text);
    $text = str_replace("é", "e", $text);
    $text = str_replace("í", "i", $text);
    $text = str_replace("ó", "o", $text);
    $text = str_replace("ú", "u", $text);
    $text = str_replace("à", "a", $text);
    $text = str_replace("è", "e", $text);
    $text = str_replace("ã", "a", $text);
    $text = str_replace("õ", "o", $text);

    $text = htmlentities($text);
    return $text;
}



?>
