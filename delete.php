<?php
if( isset($_GET['id'])) {
    $id = $_GET['id'];

    $host = "localhost";
    $port = "5050";
    $dbname = "wrokshop-php";
    $user = "postgres";
    $password = "1234";

    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }

    $sql = "DELETE FROM users WHERE id = '$id'";
    $conn = pg_query($conn, $sql);
}

header("Location: /code/php/test/index.php");
exit;


?>