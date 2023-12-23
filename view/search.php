<?php 
  $recentPosts=getRecentPosts(3);
    // Nơi xử lý form tìm kiếm
    // if(isset($_GET['search'])){
    //     if(isset($_GET['textSearch'])){
    //         $slug = $_GET['textSearch'];
    //         $ketquatimkiem = searchPosts($slug);
    //     } else {
    //         $result = 'no result';
    //     }
    // } else {
    //     $result = 'no result';
    // }
    if(isset($_GET['slug'])&& $_GET['slug'] != null){
        $slug = $_GET['slug'];
        
        
        $resultPosts = searchPosts($slug);
    }
       
?>

<div class="container_search">
    
    <h5>Từ Khóa Bạn Vừa Tìm Kiếm:"<?= $_GET['slug']?>" </h5>
 
 
    <div class="resultPosts1">
        <div class="recent_posts_container1">
            <?php foreach ($resultPosts as $postItem): ?>
            <a href="<?php echo $url.'post/'.$postItem['id']?>">
                <div class="post_item1">
                    <div class="img1">
                        <img src="<?php echo $url."view/images/".$postItem['thumbnail']?>" alt="">
                    </div>
                    
                    <div class="heading1">
                        <h4 class="title_post"><?php echo $postItem['title']?></h4>
                        
                        <p class="des1"><?php echo $postItem['content']?></p>
                        
                        <div class="like1"> <?php echo $postItem['view']?> lượt thích</div>
                        <div class="more1">
                            <p>xem thêm...</p>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach;?>
            
        </div>
    </div> 
    <div class="recent_posts1">
        <div class="heading1">
            <h3>Bài Viết Tương Tự</h3>
        </div>
        <div class="recent_posts_container1">
            <?php foreach ($recentPosts as $item): ?>
            <a href="<?php echo $url.'post/'.$item['id']?>">
                <div class="post_item1">
                    <div class="img1">
                        <img src="<?php echo $url."view/images/".$item['thumbnail']?>" alt="">
                    </div>
                    <div class="heading1">
                        <h4 class="title_post"><?php echo $item['title']?></h4>
                        
                        <p class="des1"><?php echo $item['content']?></p>
                        
                        <div class="like1"> <?php echo $item['view']?> lượt truy cập</div>
                        <div class="more1">
                            <p>xem thêm...</p>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach;?>
        
        </div>
                    <!-- <div class="btn_see_more1">
                        <a href="blog">Xem thêm</a>
                    </div> -->
    </div>
       
</div>