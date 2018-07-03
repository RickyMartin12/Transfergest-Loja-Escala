<?php

require ROOTDIR . '/config/database.php';

if (!isset($data['nome']) ||
    !is_string($data['nome']) ||
    strlen($data['nome']) == 0
) {

    mysqli_close($conn);
    return ['success' => false, 'data' => 'O campo nome não contém um valor válido. Min 5 caracteres.'];
}
if (!isset($data['email']) ||
    !is_string($data['email']) ||
    strlen($data['email']) == 0 ||
    !filter_var($data['email'], FILTER_VALIDATE_EMAIL)
) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'O campo email não contém um valor válido.'];
}
if (!isset($data['utilizador']) ||
    !is_string($data['utilizador']) ||
    strlen($data['utilizador']) == 0
) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'O campo utilizador não contém um valor válido. Min 5 caracteres.'];
}
if (!isset($data['password']) ||
    !is_string($data['password']) ||
    strlen($data['password']) < 5
) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'O campo password não contém um valor válido. Min 5 caracteres.'];
}

$nome = $data['nome'];
$email = $data['email'];
$utilizador = $data['utilizador'];
$salt = '$G.Om3us3gr3do.SalT.StringG$';
$password = crypt($data['password'], $salt);
$operadorId = $data['operador_admin_id'];

$query = "SELECT utilizador FROM operador WHERE utilizador='{$utilizador}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
if (isset($row['utilizador']) && !empty($row['utilizador'])) {
    mysqli_close($conn);
    return ['success' => false, 'data' => 'O valor indicado para o campo utilizador já se encontra registado.'];
}

$novo = "INSERT INTO operador_utilizadores (nome, email, utilizador, password, operador_id) VALUES ('{$nome}','{$email}', '{$utilizador}', '{$password}', {$operadorId})";

$isSuccess = mysqli_query($conn, $novo);

if ($isSuccess == true) {
    $id = mysqli_insert_id($conn);
    mysqli_close($conn);
    return ['success' => true, 'data' => $id];
} else {
    $error = mysqli_error($conn);
    mysqli_close($conn);
    if (strpos($error, 'utilizador_UNIQUE') !== false) {
        return ['success' => false, 'data' => 'O valor indicado para o campo utilizador já se encontra registado.'];
    } else if (strpos($error, 'email_UNIQUE') !== false) {
        return ['success' => false, 'data' => 'O valor indicado para o campo email já se encontra registado.'];
    }
}
