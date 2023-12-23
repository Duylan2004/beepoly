<?php
include_once('connectDb.php');
function getUsers() {
    $conn = connectDb();
    $sql = "SELECT * FROM users"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


?>