
<?php

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    else{
        header("Location: ./home");
    }

    $savePosts = getSavePosts($user['id']);
    
?>

<div class="wrapper_my-account">
    <div class="navbar_my-account">
        <h2>Xin chào, <?php echo $user['name'] ?></h2>
        <div class="navbar_my-account_container">
            <div class="navbar_my-account_item">
                <a href="<?php echo $url?>my-account">Thông tin tài khoản</a>
            </div>
            <div class="navbar_my-account_item">
                <a href="<?php echo $url?>saved">Bài viết đã lưu</a>
            </div>
            <div class="navbar_my-account_item">
                <a href="<?php echo $url?>logout">Đăng xuất</a>
            </div>
        </div>
    </div>
    <div class="container_my-account">
        <h2>Bài viết đã lưu</h2>
        <div class="saved">
            <?php foreach ($savePosts as $item): ?>
            <a href="<?php echo $url.'post/'.$item['id']?>">
                <div class="post_item">
                    <div class="img">
                        <img src="<?php echo $url."view/images/".$item['thumbnail']?>" alt="">
                    </div>
                    <div class="heading">
                        <h4 class="title_post"><?php echo $item['title']?></h4>
                     
                        <p class="des"><?php echo $item['content']?></p>
                     
                        <div class="like"> <?php echo $item['view']?> lượt truy cập</div>
                        
                    </div>
                </div>
            </a>
            <?php endforeach;?>
        </div>
        
    </div>
   
    

</div>