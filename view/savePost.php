<?php
    session_start();
    include_once '../model/post.php';
    // Lấy id của bài viết từ dữ liệu gửi đi
    if (isset($_POST['article_id'])) {
        $id = $_POST['article_id'];
    } else {
        // Xử lý trường hợp không có "article_id"
    }
    
    // Kiểm tra xem bài viết đã được lưu hay chưa
    // Giả sử bạn có một hàm isArticleSaved() để kiểm tra điều này
    if(isArticleSaved($id, $_SESSION['user']['id'])) {
        // Nếu bài viết đã được lưu, hủy lưu bài viết
        // Giả sử bạn có một hàm unsaveArticle() để thực hiện việc này
        unsavePost($id , $_SESSION['user']['id']);
        echo 'unsaved';
    } else {
        // Nếu bài viết chưa được lưu, lưu bài viết
        // Giả sử bạn có một hàm saveArticle() để thực hiện việc này
        savePost($id , $_SESSION['user']['id']);
        echo 'saved';
    }
?>