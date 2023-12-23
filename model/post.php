<?php 
    include_once 'connectDb.php';
    function getPostDetail($id){
        $conn = connectDb();
        $sql = "SELECT posts.*, categories.name as category_name
        FROM posts
        JOIN categories ON posts.id_category = categories.id
        WHERE posts.id = :post_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':post_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function viewPost($id){
        $conn = connectDb();
        $sql = "UPDATE posts SET view = view + 1 WHERE id = :post_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':post_id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    function getRecentPosts($quantity){
        $conn = connectDb();
        $sql = "SELECT posts.*, categories.name AS category_name
        FROM posts
        LEFT JOIN categories ON posts.id_category = categories.id
        ORDER BY posts.id DESC
        LIMIT 3";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function isArticleSaved($id , $id_user){
        $conn = connectDb();
        $sql = "SELECT * FROM savedpost WHERE id_post = :post_id AND id_user = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':post_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    function savePost($id, $id_user){
        $conn = connectDb();
        $sql = "INSERT INTO savedpost (id_post, id_user) VALUES (:post_id, :user_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':post_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $id_user, PDO::PARAM_INT);
        $stmt->execute();
    }
    function unsavePost($id, $id_user){
        $conn = connectDb();
        $sql = "DELETE FROM savedpost WHERE id_post = :post_id AND id_user = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':post_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $id_user, PDO::PARAM_INT);
        $stmt->execute();
    }

?>