
<?php

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $id = $user['id'];
        $info = getInfo($id);
    }   
    else{
        header("Location: ./home");
    }

    if(isset($_POST['update'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        updateInfo($id, $name, $email, $phone, $password);
        //  window.location.href
        echo "<script>window.location.href = '".$url."my-account';</script>";
    }
 
?>

<div class="wrapper_my-account">
    <div class="navbar_my-account">
        <h2>Xin chào, <?php echo $info['name'] ?></h2>
        <div class="navbar_my-account_container">
            <div class="navbar_my-account_item">
                <a href="<?php echo $url?>my-account">Thông tin tài khoản</a>
            </div>
            <div class="navbar_my-account_item">
                <a href="<?php echo $url?>saved">Bài viết đã lưu</a>
            </div>

            <?php
                if($info['role'] === 'admin'){
                    echo '<div class="navbar_my-account_item">
                    <a href="'.$url.'admin">Quản trị</a>
                </div>';
                }
            ?>
            <div class="navbar_my-account_item">
                <a href="<?php echo $url?>logout">Đăng xuất</a>
            </div>
        </div>
    </div>
    <div class="container_my-account">
        <h2>Thông tin tài khoản</h2>
        <form class="info" action="" method="post">
            <div class="info_item">
                <label for="">Họ và tên</label>
                <input type="text" name="name" value="<?php echo $info['name']?>">
            </div>
            <div class="info_item">
                <label for="">Email</label>
                <input type="text" name="email" value="<?php echo $info['email']?>">
            </div>
            <div class="info_item">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone" value="<?php echo $info['phone']?>">
            </div>
            
            <div class="info_item">
                <label for="">Mật khẩu</label>
                <input type="text" name="password" value="<?php echo $info['password']?>">
            </div>
            <div class="btn">
                <input type="submit" name="update" value="Cập nhật">
            </div>
        </form>
    </div>
   
    

</div>