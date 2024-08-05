<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';
require '../../config/conecta.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Validação de e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../../pages/senha/recuperarSenhaForm.php?status=error&message=E-mail inválido.");
        exit;
    }

    // Conecte ao banco de dados e verifique se o e-mail existe
    conecta();
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT id_usuario FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        header("Location: ../../pages/senha/recuperarSenhaForm.php?status=error&message=E-mail não encontrado.");
        desconecta();
        exit;
    }

    // Gere um token de redefinição de senha e insira no banco de dados
    $token = bin2hex(random_bytes(50));
    $stmt = $mysqli->prepare("UPDATE usuario SET reset_token = ?, reset_expiration = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
    $stmt->bind_param("ss", $token, $email);
    $stmt->execute();
    desconecta();

    // Configure o PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.office365.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'criar email projeto'; // Seu e-mail do Gmail
        $mail->Password   = 'criar email projeto'; // Sua senha do Gmail (ou senha de app)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; // Porta TCP para o servidor SMTP

        // Configurações do e-mail
        $mail->setFrom('criar email do projeto', 'VILIBRAS');
        $mail->addAddress($email); // Adicionar um destinatário
        $mail->isHTML(true); // Definir o formato do e-mail como HTML
        $mail->Subject = 'Redefinição de Senha';
        $mail->Body    = "Clique no link para redefinir sua senha: <a href='http://localhost/VILIBRAS_PHP/app/pages/senha/novaSenhaForm.php?token=$token'>Redefinir Senha</a>";
        $mail->AltBody = "Clique no link para redefinir sua senha: http://localhost/VILIBRAS_PHP/app/pages/senha/novaSenhaForm.php?token=$token"; // Texto alternativo para clientes de e-mail que não suportam HTML

        $mail->send();
        header("Location: ../../pages/senha/recuperarSenhaForm.php?status=success&message=E-mail de redefinição de senha enviado.");
    } catch (Exception $e) {
        header("Location: ../../pages/senha/recuperarSenhaForm.php?status=error&message=Erro ao enviar o e-mail");
    }
}