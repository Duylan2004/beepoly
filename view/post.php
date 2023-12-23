<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        viewPost($id);
        $showPostDetail=getPostDetail($id);
        
    //     if($showPostDetail == null){
    //         include_once '404.php';
    //     }
        
    // }else{
    //     header('location: '.$url.'/?page=home');
    }
    
    
    $postItem=getRecentPosts(3);
 
    $savePost = isArticleSaved($id , $_SESSION['user']['id']);
?>
<br>
<br>
<br>
<br>
   <main>
      <section class="blog">
      <?php foreach($showPostDetail as $item): ?>
        <div class="blog__top"></div>
    
        <div class="contain">
          <figure class="blog__thumbnail">
            <div class="blog__wishlist">
              
              <div class="blog__wishlist-item <?php if($savePost == true){ echo 'active'; }?>">
                <i class="fa-regular fa-bookmark"></i>
                <input type="hidden" id="idSavePost" value="<?php echo $id ?>">
                <span class="blog__wishlist-number">Lưu bài viết</span>
              </div>
            </div>
            <img src="<?php echo  $url."view/images/".$item['thumbnail']?>" alt="" class="blog__img" />
          </figure>
          <div class="blog__content">
            <p class="blog__title"><?php echo $item['category_name']?></p>
            <h2 class="blog__heading">
            <?php echo $item['title']?>
            </h2>
            <div class="blog__info">          
              <time class="blog__date">Ngày đăng:
                  <?php
                    $date=date_create($item['date']);
                    echo date_format($date,"d/m/Y ");
                  ?>
              </time>
              <span class="blog__wishlist-number" onclick="like()">Lượt truy cập: <?php echo $item['view']?></span>
            </div>
            <div class="blog__description">
              <p class="blog__text">
              <?php echo $item['content']?>
              </p>
              <p class="blog__text">
              <?php echo $item['content']?>
              </p>
            </div>
          </div>

     


          <div class="blog__social">
            <div class="blog__item">
              <a href="">
                <i class="fa fa-brands fa-facebook"></i>
                <span>Chia sẻ trên Facebook</span>
              </a>
            </div>
            <div class="blog__item">
              <a href="">
                <i class="fa fa-brands fa-twitter"></i>
                <span>Chia sẻ trên Twitter</span>
              </a>
            </div>
          </div>
          
          <?php endforeach;?>
        </div>

        <div class="recent_posts1">
                <div class="heading1">
                    <h3>Bài viết gần đây</h3>
                </div>
                <div class="recent_posts_container1">
                    <?php foreach ($postItem as $item): ?>
                    <a href="<?php echo $url.'post/'.$item['id']?>">
                        <div class="post_item1">
                            <div class="img1">
                                <img src="<?php echo $url."view/images/".$item['thumbnail']?>" alt="">
                            </div>
                            <p class="dm"><?php echo $item['category_name']?></p>
                            <div class="heading1">
                                <h4 class="title_post"><?php echo $item['title']?></h4>
                                <br>
                                <p class="des1"><?php echo $item['content']?></p>
                                <br>
                                <div class="like1"> <?php echo $item['view']?> lượt truy cập</div>
                                <p class="date"><?php echo $item['date']?></p>
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
      </section>
    </main>
    <script src="<?php echo $url?>view/js/post.js"></script>