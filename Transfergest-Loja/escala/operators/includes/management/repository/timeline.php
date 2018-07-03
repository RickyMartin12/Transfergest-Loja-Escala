<?php
    require ROOTDIR . '/config/database.php';

    $query = "SELECT * FROM timeline_logs ORDER BY created_at DESC";

    $result = mysqli_query($conn, $query);
    $timelines = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_array()) {
            $timelines[] = $row;
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);

    return $timelines;
