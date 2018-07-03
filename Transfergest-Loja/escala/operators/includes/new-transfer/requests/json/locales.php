<?php

$locales = [];
if (isset($data["z"])) {

    require ROOTDIR . '/config/database.php';

    $z           = $data["z"];
    $queryLocal = "SELECT id, nome , morada, morada_gps, zona FROM locais_frequentes ORDER BY nome ";
    if ($z !== "") {
        $queryLocal = "SELECT id, nome , morada, morada_gps, zona FROM locais_frequentes WHERE zona='{$z}' ORDER BY nome ";
    }

    $result = mysqli_query($conn, $queryLocal);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $locales[] = $row;
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
return $locales;