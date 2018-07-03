<?php
    require ROOTDIR . '/config/database.php';

    $query = "SELECT email FROM companhia WHERE 1 LIMIT 1";

    $result = mysqli_query($conn, $query);
    $services = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $email_c = $row['email'];
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);

    return $email_c;