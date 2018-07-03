<?php
    require ROOTDIR . '/config/database.php';

    $query = "SELECT id, nome , morada, morada_gps, zona FROM locais_frequentes ORDER BY nome ASC";
    $result = mysqli_query($conn, $query);

    $locais_frequentes = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $locais_frequentes[] = $row;
        }
    }
    mysqli_free_result($result);

    mysqli_close($conn);

    return $locais_frequentes;
