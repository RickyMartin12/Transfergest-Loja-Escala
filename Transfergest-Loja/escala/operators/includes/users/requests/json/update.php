<?php
require ROOTDIR . '/config/database.php';

if (!isset($data['id'])) {
    return ['success' => false];
}
if (!isset($data['password']) && !is_string($data['password'])) {
    return ['success' => false];
}

$id = $data['id'];
$salt = '$G.Om3us3gr3do.SalT.StringG$';
$password = crypt($data['password'], $salt);

$query = "UPDATE operador_utilizadores SET password='{$password}' WHERE id = {$id}";
$result = mysqli_query($conn, $query);

$rows = mysqli_affected_rows($conn);
$result = $rows > 0 ? true : false;

//@TODO SEND EMAIL WITH NEW PASSWORD

mysqli_close($conn);

return ['success' => $result];
