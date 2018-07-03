<?php

$suggestions = ['results' => []];
if (isset($data["q"]) && isset($data["c"])) {

    require ROOTDIR . '/config/database.php';

    $q = strtolower($data["q"]);
    $c = $data["c"];
    $idOperador = $data["i"];
    $p = $data["p"];

    $query = "SELECT DISTINCT prod_id FROM operador_precos WHERE id_operador = {$idOperador}";
    $result = mysqli_query($conn, $query);

    $idsDeProdutos = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $idsDeProdutos[] = $row['prod_id'];
        }
    }
    mysqli_free_result($result);

    $part1 = 'SELECT local AS nome FROM locais WHERE cat = ' . $c . ' AND `id` IN (' . implode(',', array_map('intval', $idsDeProdutos)) . ')';
    $part2 = 'SELECT local_fim AS nome FROM locais WHERE cat = ' . $c . ' AND `id` IN (' . implode(',', array_map('intval', $idsDeProdutos)) . ')';
    if ($p !== "") {
        $part1 = 'SELECT local AS nome FROM locais WHERE cat = ' . $c . ' AND local_fim=\''
            . $p . ' \' AND `id` IN (' . implode(',', array_map('intval', $idsDeProdutos)) . ')';
        $part2 = 'SELECT local_fim AS nome FROM locais WHERE cat = ' . $c . ' AND local=\''
            . $p . ' \' AND `id` IN (' . implode(',', array_map('intval', $idsDeProdutos)) . ')';
    }
    if ($q !== "") {
        $part1 = 'SELECT local AS nome FROM locais WHERE cat = ' . $c . ' AND local LIKE \'' . $q . '%\' AND `id` IN (' . implode(',', array_map('intval', $idsDeProdutos)) . ')';
        $part2 = 'SELECT local_fim AS nome FROM locais WHERE cat = ' . $c . ' AND local_fim LIKE \'' . $q . '%\' AND `id` IN (' . implode(',', array_map('intval', $idsDeProdutos)) . ')';
        if ($p !== "") {
            $part1 = 'SELECT local AS nome FROM locais WHERE cat = ' . $c . ' AND local_fim=\''
                . $p . ' \' AND local LIKE \'' . $q . '%\' AND `id` IN (' . implode(',', array_map('intval', $idsDeProdutos)) . ')';
            $part2 = 'SELECT local_fim AS nome FROM locais WHERE cat = ' . $c . ' AND local=\''
                . $p . ' \' AND local_fim LIKE \'' . $q . '%\' AND `id` IN (' . implode(',', array_map('intval', $idsDeProdutos)) . ')';
        }
    }
    $queryLocais = $part1 . ' UNION ' . $part2;

    $result2 = mysqli_query($conn, $queryLocais);
    $locaisFrequentes = [];
    if (mysqli_num_rows($result2) > 0) {
        while ($row = $result2->fetch_array()) {
            $locaisFrequentes[] = $row;
        }
    }
    mysqli_free_result($result2);

    $suggestions = [
        'results' => $locaisFrequentes,
    ];

    mysqli_close($conn);
}

return $suggestions;
