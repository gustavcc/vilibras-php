<?php
require_once '../../config/conecta.php'; // Inclui o arquivo de conexão

conecta(); // Conecta ao banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];

    // Verificar se o token é válido e não expirou
    $stmt = $mysqli->prepare("SELECT id_usuario FROM usuario WHERE reset_token =? AND reset_expiration > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        echo "Token inválido ou expirado.";
        exit;
    }

    // Atualizar a senha do usuário
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("UPDATE usuario SET senha =?, reset_token = NULL, reset_expiration = NULL WHERE reset_token =?");
    $stmt->bind_param("ss", $hashed_password, $token);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        echo "Senha redefinida com sucesso.";
    } else {
        echo "Erro ao redefinir senha.";
    }
}

desconecta(); // Desconecta do banco de dados
?>