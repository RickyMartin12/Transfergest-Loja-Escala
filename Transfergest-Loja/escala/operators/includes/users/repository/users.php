<?php
if ($login_session['type'] == 'admin') {
    require ROOTDIR . '/config/database.php';

    $query        = "SELECT * FROM operador_utilizadores WHERE operador_id='{$idOperador}'";
    $result       = mysqli_query($conn, $query);
    $utilizadores = [];
    while ($row = $result->fetch_array()) {
        $utilizadores[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}