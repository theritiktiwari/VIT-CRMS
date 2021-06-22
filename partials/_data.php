<?php

ob_start();

if (isset($_GET['id'])) {
    include './_dbconnect.php';

    $file_id = $_GET['id'];
    $type = $_GET['type'];

    $db_id = $type . '_id';

    $sql = "SELECT * FROM $type WHERE $db_id = $file_id";
    $reult = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($reult);

    $file_path = "../uploads/" . $file['' . $type . '_data'];


    if (file_exists($file_path)) {

        header("Content-Type: application/octet-stream");
        header("Content-Description: File Transfer");
        header("Expires: 0");
        header("Content-Disposition: attachment; filename=" . basename($file_path));
        header("Cache-Control: must-revalidate");
        header("Pragma: public");
        header("Content-Length:" . filesize($file_path));
        
        readfile($file_path);

        echo $db_download = $type . '_download';

        echo $download = $file['' . $db_download . ''] + 1;

        echo $update = "UPDATE $type SET $db_download = $download WHERE $db_id = $file_id";

        mysqli_query($conn, $update);

        exit;
    }
    else {
        echo '<script>alert("File not Exists");</script>';
    }
}

ob_end_flush();

?>