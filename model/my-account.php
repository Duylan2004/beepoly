<?php
    include_once 'connectDb.php';
    function getSavePosts($id_user){
        $conn = connectDb();
        $sql = "SELECT posts.*, categories.name AS category_name
        FROM posts
        LEFT JOIN categories ON posts.id_category = categories.id
        WHERE posts.id IN (SELECT id_post FROM savedpost WHERE id_user = ".$id_user.")
        ORDER BY posts.id DESC
     ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getInfo($id){
        $conn = connectDb();
        $sql = "SELECT * FROM users WHERE id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function updateInfo($id, $name, $email, $phone, $password){
        $conn = connectDb();
        $sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', password = '$password' WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

?>