<?php

require ROOTDIR . '/config/database.php';

if (!isset($data['id'])) {
    return ['success' => false];
}

$id = $data['id'];

$query = "DELETE FROM operador_utilizadores WHERE id = {$id}";
$result = mysqli_query($conn, $query);
$rows = mysqli_affected_rows($conn);
$result = $rows > 0 ? true : false;

mysqli_close($conn);
return ['success' => $result];
