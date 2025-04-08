<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_usuario'])) {
    $nome = mysqli_real_escape_string($soyedinyat, trim($_POST['nome']));
    $email = mysqli_real_escape_string($soyedinyat, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($soyedinyat, trim($_POST['data_nascimento']));
    $senha = isset($_POST['senha']) ? password_hash(trim($_POST['senha']), PASSWORD_DEFAULT) : '';

    $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha) VALUES ('$nome', '$email', '$data_nascimento', '$senha')";

    mysqli_query($soyedinyat, $sql);

    if (mysqli_affected_rows($soyedinyat) > 0) {
        $_SESSION['mensagem'] = 'Usuário criado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi criado';
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['update_usuario'])) {
    $usuario_id = mysqli_real_escape_string($soyedinyat, $_POST['usuario_id']);

    $nome = mysqli_real_escape_string($soyedinyat, trim($_POST['nome']));
    $email = mysqli_real_escape_string($soyedinyat, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($soyedinyat, trim($_POST['data_nascimento']));
    $senha = mysqli_real_escape_string($soyedinyat, trim($_POST['senha']));

    $sql = "UPDATE usuarios  SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento'";

    if (!empty($senha)) {
        $sql .= ", senha='" . password_hash($senha, PASSWORD_DEFAULT) . "'";
    }

    $sql .= " WHERE id = '$usuario_id'";

    mysqli_query($soyedinyat, $sql);

    if (mysqli_affected_rows($soyedinyat) > 0) {
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi atualizado';
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['delete_usuario'])) {
    $usuario_id = mysqli_real_escape_string($soyedinyat, $_POST['delete_usuario']);

    $sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";

    mysqli_query($soyedinyat, $sql);

    if (mysqli_affected_rows($soyedinyat) > 0) {
        $_SESSION['mensagem'] = 'Usuário deletado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi deletado';
        header('Location: index.php');
        exit;
    }
}
