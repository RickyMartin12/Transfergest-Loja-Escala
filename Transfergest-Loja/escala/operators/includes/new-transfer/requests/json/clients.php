<?php

$suggestions = ['results' => []];
if (isset($data["q"]) && isset($data["i"]) && isset($data["t"])) {

    require ROOTDIR . '/config/database.php';

    $q = strtolower($data["q"]);
    $i = $data["i"];
    $t = $data["t"];

    $query = "SELECT email, nome, telefone, quarto, pais FROM clientes WHERE operador_id = {$i} AND {$t} LIKE '{$q}%'";

    $isDefaultSuggestions = $q == "";
    if ($isDefaultSuggestions) {
        $query = "SELECT email, nome, telefone, quarto, pais FROM clientes WHERE operador_id = {$i}";
    }

    $result = mysqli_query($conn, $query);
    $locaisFrequentes = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $locaisFrequentes[] = ['email' => $row['email'], 'nome' => $row['nome'], 'telefone' => $row['telefone'], 'quarto' => $row['quarto'], 'pais' => $row['pais']];
        }
    }
    mysqli_free_result($result);

    $suggestions = [
        'results' => $locaisFrequentes,
    ];

    mysqli_close($conn);
}
return $suggestions;
