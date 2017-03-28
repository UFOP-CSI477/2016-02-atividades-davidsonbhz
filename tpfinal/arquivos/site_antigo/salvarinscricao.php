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
if (isset($_REQUEST['nome'])) {
    $nome = cleanString($_REQUEST['nome']);
    $endereco = cleanString($_REQUEST['endereco']);
    $bairro = cleanString($_REQUEST['bairro']);
    $cidade = cleanString($_REQUEST['cidade']);
    $cep = cleanString($_REQUEST['cep']);
    $cpf = cleanString($_REQUEST['cpf']);

    $lp = mysqli_fetch_assoc(mysqli_query($conexao, "select * from processoseletivo where status='ABERTO' limit 1"));
    $processoseletivo = $lp['processoseletivo'];


    //mysqli_query("delete from candidato where candidato>10000");
    //die("select * from candidato where cpf='$cpf' and processoseletivo=$processoseletivo");

    $n = mysqli_query($conexao, "select * from candidato where cpf='$cpf' and processoseletivo=$processoseletivo");
    if (mysqli_num_rows($n) > 0) {
        finaliza(2, "'CPF JA CADASTRADO NESTE PROCESSO SELETIVO!");
        require './cpfjaregistrado.php';
        die();
    }

    $rg = $_REQUEST['rg'];
    //$a = split("/", $_REQUEST['nascimento']);
    $a = explode("/", $_REQUEST['nascimento']);

    $nascimento = $a[2] . "-" . $a[1] . "-" . $a[0];

    //die($nascimento);

    $escolaEnsinoFundamental = cleanString($_REQUEST['escolaensinofundamental']);
    $escolaEnsinoMedio = cleanString($_REQUEST['escolaensinomedio']);
    $email = cleanString($_REQUEST['email']);
    $telefone = $_REQUEST['telefone'];
    $celular = $_REQUEST['celular'];
//$datareg = date($datareg, time());
    $status = "INSCRITO";
    $sexo = $_REQUEST['sexo'];
    $estadocivil = isset($_REQUEST['estadocivil']) ? $_REQUEST['estadocivil'] : "SOLTEIRO";
    $nomepai = isset($_REQUEST['nomepai']) ? $_REQUEST['nomepai'] : "";
    $nomemae = isset($_REQUEST['nomemae']) ? $_REQUEST['nomemae'] : "";
    $tipoensinomedio = $_REQUEST['tipoensinomedio']; // filter_input(INPUT_POST, 'tipoensinomedio');
    $descricaodeficiencia = cleanString($_REQUEST['descricaodeficiencia']);
    $possuideficiencia = $_REQUEST['possuideficiencia'];
    $tipodeficiencia = $_REQUEST['descricaodeficiencia'];
    $codigo = "";
    $ip = "";

    $sql1 = "insert into candidato(processoseletivo,nome,endereco,bairro,cidade,cep,cpf,rg,escolaEnsinoFundamental,escolaEnsinoMedio,email,telefone,celular,";
    $sql1 = $sql1 . "status,sexo,estadocivil,nomepai,nomemae,tipoensinomedio,possuideficiencia,tipodeficiencia,nascimento)";
    $sql2 = " values($processoseletivo, '$nome','$endereco','$bairro','$cidade','$cep','$cpf','$rg','$escolaEnsinoFundamental','$escolaEnsinoMedio','$email','$telefone','$celular',";
    $sql2 = $sql2 . "'$status','$sexo','$estadocivil','$nomepai','$nomemae','$tipoensinomedio','$possuideficiencia','$tipodeficiencia','$nascimento')";


    if (!mysqli_query($conexao, $sql1 . $sql2)) {
        finaliza(2, mysqli_error($conexao));
    } else {
        //echo "status=1;";
    }

    $ip = $_SERVER['REMOTE_ADDR'];

    $id = mysqli_insert_id($conexao);
    $mat = $id;

    //mysqli_query("delete from candidato");
    //die("id=$id");
    $datareg = date('Y-m-d');
    mysqli_query($conexao, "update candidato set datareg='$datareg',codigo='$mat',ip='$ip' where candidato=$id");

    criar_pdf_comprovante2($nome, $rg, $mat);


    $from = "Sistema <rumo.ufop@gmail.com>";
    $to = "davidsonbhz@gmail.com";
    $subject = "Inscrição efetuada!";
    $body = "Sua Inscrição para o processo seletivo foi realizada com sucesso, em anexo está o seu comprovante de inscrição, você deve imprimi-lo e apresenta-lo juntamente com os demais documentos citados no edital e o alimento no local/endereço assim como é descrito no edital.\n\nNúmero da inscrição:\n$mat\n\n(este é um email automático, não precisa respondê-lo)";
    $host = "smtp.gmail.com";
    $username = "rumo.ufop@gmail.com";
    $password = "prevestrumo2012";

    $emailsender = "sistema@rumoauniversidade.com.br";

    $headers = "MIME-Version: 1.1\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: $from\r\n"; // remetente
    $headers .= "Return-Path: $from\r\n";


    $mail = new PHPMailer();
    $mail->From = $from;
    $mail->FromName = 'Sistema';
    $mail->Subject = "Inscrição $mat";
    $mail->Body = $body;
    $mail->addCC("rumo.ufop@gmail.com");
    $mail->AddAddress($email);

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = $host; // SMTP server
    $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->Host = $host; // sets the SMTP server
    $mail->Port = 587;                    // set the SMTP port for the GMAIL server
    $mail->Username = "rumo.ufop@gmail.com"; // SMTP account username
    $mail->Password = "prevestrumo2012";        // SMTP account password

    $mail->SetFrom($emailsender, 'Sistema');


    $file_to_attach = "inscricoes/$mat.pdf";

    $mail->AddAttachment($file_to_attach, 'comprovante.pdf');

    $mail->Send();

    /*
      if (!mail($to, $subject, $body, $headers, "-r" . $emailsender)) { // Se for Postfix
      $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
      mail($to, $subject, $body, $headers);
      }

      if ($retval = mail($to, $subject, $message, $header)) {
      finaliza(0, "OK $retval");
      } else {
      finaliza(0, "ERRO $retval");
      }
     */

    $a = fopen("historico.sql", "a+");
    fwrite($a, "$sql1 $sql2 ; \n");
    fclose($a);

    $mail = new PHPMailer();
    $mail->From = $from;
    $mail->FromName = 'Sistema';
    $mail->Subject = "Inscrição $mat - $nome";
    $mail->Body = "Nome: $nome\n$cpf\nRG:$rg\nEndereco:$endereco\nBairro:$bairro\nTelefone:$telefone\nCelular:$celular\nEmail:$email\nIP:$ip";
    $mail->AddAddress("rumo.ufop@gmail.com");

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = $host; // SMTP server
    $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->Host = $host; // sets the SMTP server
    $mail->Port = 587;                    // set the SMTP port for the GMAIL server
    $mail->Username = "rumo.ufop@gmail.com"; // SMTP account username
    $mail->Password = "prevestrumo2012";        // SMTP account password

    $mail->SetFrom($emailsender, 'Sistema');


    $file_to_attach = "inscricoes/$mat.pdf";

    //$mail->AddAttachment($file_to_attach, 'comprovante.pdf');

    $mail->Send();

    //mysqli_query($conexao, "delete from candidato");

    finaliza(1, "");
    $status = 5;
//finaliza(1, "CADASTRO EFETUADO!");
}

function finaliza($stat, $msg) {
    //die("status=$stat; msg=\"$msg\";");
    include './inscricaook.php';
    die();
}

function criar_pdf_comprovante2($nome, $rg, $id) {

    global $linha, $conexao, $processoseletivo;

    $linha = 80;

    $pdf = new FPDF("P", "pt", "A4");

    $pdf->SetFont('Courier', 'B', 10);
    //$pdf = new FPDF();
    $pdf->AddPage();

    // Insert a logo in the top-left corner at 300 dpi
    $pdf->Image('logoUFOP.jpg', 10, 10, 50, 80);
    $pdf->Image('brasao.png', 450, 10, 80, 80);

// Insert a dynamic image from a URL

    $l = mysqli_fetch_assoc(mysqli_query($conexao, "select * from processoseletivo where processoseletivo=$processoseletivo"));
    $titulo = $l['titulo'];
    //$data = date_format($l['dataprova'],"d/m/Y");
    //mysqli_query($conexao, "delete from candidato");
    //die("t=$titulo   $data  ".$l['dataprova']);
    $a = explode("-", $l['dataprova']);
    $data = $a[2] . "/" . $a[1] . "/" . $a[0];


    $pdf->Text(20, 40, str_pad("MINISTERIO DA EDUCAÇAO", 90, " ", STR_PAD_BOTH));
    $pdf->Text(20, 60, str_pad("UNIVERSIDADE FEDERAL DE OURO PRETO", 90, " ", STR_PAD_BOTH));
    $pdf->Text(20, 80, str_pad("INSTITUTO DE CIENCIAS EXATAS E APLICADAS", 90, " ", STR_PAD_BOTH));
    $pdf->Text(20, 100, str_pad("COMPROVANTE DE INSCRIÇÃO $id", 90, " ", STR_PAD_BOTH));
    $pdf->SetFont('Courier', 'B', 10);
    $linha = 140;
//Certificamos que DANIEL MARTINS REIS, cujo documento de identidade é 10101010    
    adicionaLinha($pdf, "Certificamos que $nome, cujo documento de identidade é $rg,");
    adicionaLinha($pdf, "registrou   sua   inscrição como  candidato para o $titulo");
    adicionaLinha($pdf, " do curso Pré-Vestibular:  Rumo à Universidade   que ocorrerá no dia $data das ");
    adicionaLinha($pdf, " 14h às 17h no   Instituto de   Ciências   Exatas e Aplicadas - UFOP.");
    adicionaLinha($pdf, " ");

    adicionaLinha($pdf, "Certifico  que o aluno apresentou um certificado de conclusão do ensino médio, ");
    adicionaLinha($pdf, "ou atestado de matrícula que consta que o aluno está regularmente matriculado ");
    adicionaLinha($pdf, "no 3o ano  do   ensino  médio,  e  que  o aluno doou 1 (um) quilo de alimento");
    adicionaLinha($pdf, "não-perecível que será doado para alguma instituição de caridade do município.        ");
    adicionaLinha($pdf, " ");

    adicionaLinha($pdf, "É de  responsabilidade   do candidato guardar  este documento, que deverá ser ");
    adicionaLinha($pdf, "apresentado  no dia  da  realização  do rocesso seletivo, sem este documento, ");
    adicionaLinha($pdf, "além dos outros citados no edital, o aluno ficará impossibilitado de ");
    adicionaLinha($pdf, "realizar a prova. ", FALSE);
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, "_________________________________________ ", FALSE);
    adicionaLinha($pdf, "Carimbo e Assinatura ", FALSE);
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, " ");
    adicionaLinha($pdf, "Prezado Candidato, é obrigatório a posse desse documento para a realização da prova! ");



    $pdf->Output("F", "inscricoes/$id.pdf");
}

function adicionaLinha($pdf, $t, $justificar = true) {
    global $linha;
    if ($justificar) {
        $pdf->Text(20, $linha, justify($t, 87, ' '));
    } else {
        $pdf->Text(20, $linha, $t);
    }
    $linha = $linha + 10;
}

function justify($str_in, $desired_length, $char = '_') {

    // Some common vars and simple error checking / sanitation
    $return = '';
    $str_in = trim($str_in);
    $desired_length = intval($desired_length);

    // If we've got invalid input, we're done
    if ($desired_length <= 0)
        return $str_in;

    // If the input string is greater than the length, we need to truncate it WITHOUT splitting words
    if (strlen($str_in) > $desired_length) {
        $str = wordwrap($str_in, $desired_length);
        $str = explode("\n", $str);
        $str_in = $str[0];
    }

    $words = explode(' ', $str_in);
    $num_words = count($words);

    // If there's only one word, it's a simple edge case
    if ($num_words == 1) {
        $length = ($desired_length - strlen($words[0])) / 2;
        $return .= str_repeat($char, floor($length)) . $words[0] . str_repeat($char, ceil($length));
    } else {
        $word_length = strlen(implode('', $words));

        // Calculate the number of spaces to distribute over the words
        $num_words--; // We're going to eliminate the last word
        $spaces = floor(($desired_length - $word_length) / $num_words);
        $remainder = $desired_length - $word_length - ($num_words * $spaces);

        $last = array_pop($words);
        foreach ($words as $word) {
            // If we didn't get an even number of spaces to distribute, just tack it on to the front
            $spaces_to_add = $spaces;
            if ($remainder > 0) {
                $spaces_to_add++;
                $remainder--;
            }

            $return .= $word . str_repeat($char, $spaces_to_add);
        }
        $return .= $last;
    }
    return $return;
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