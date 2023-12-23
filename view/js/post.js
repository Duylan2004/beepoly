

$(document).ready(function(){
    $('.blog__wishlist-item').click(function(){
        console.log('click');
        document.querySelector('.blog__wishlist-item').classList.toggle('active');
        var button = $(this);
        var id = document.querySelector('#idSavePost').value; // Lấy ID của bài viết
        $.ajax({
            url: '../view/savePost.php', // URL của script PHP xử lý lưu/hủy lưu bài viết
            type: 'POST', // Phương thức gửi dữ liệu
            data: { article_id: id }, // Dữ liệu gửi đi, ví dụ: id của bài viết
            success: function(response) {
                if(response == 'saved') {
                    console.log('unsaved');
                } else if(response == 'unsaved') {
                    console.log('saved');
                }
            }
        });
    });
});