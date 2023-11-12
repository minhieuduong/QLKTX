<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc Tin Tức Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .news-container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }

        .news-article {
            border-bottom: 1px solid #ccc;
            padding: 20px 0;
        }

        .article-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .article-content {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .article-image {
            max-width: 20%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 8px;
        }
        h1 {
            text-align: center; 
            background-color: greenyellow;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="news-container">
        <h1>Tin Tức Online</h1>

        <?php
        // Dummy Data - Thay thế bằng dữ liệu từ cơ sở dữ liệu thực tế
        $newsArticles = array(
            array(
                'title' => 'IT Talent Show 2023',
                'content' => 'IT Talent Show 2023 là sân chơi do Khoa Công nghệ thông tin phối hợp với các đối tác tổ chức dành cho các bạn sinh viên và học viên cao học tại Trường Đại học Phenikaa nhằm thúc đẩy đam mê tìm tòi phát triển các công nghệ mới và ứng dụng để giải quyết các bài toán thực tế, chủ điểm năm nay là: “Ứng dụng CNTT xây dựng Đại học thông minh”',
                'link' => 'https://cs.phenikaa-uni.edu.vn/vi/post/tin-tuc/sub-tin-tuc/cs-phenikaa-contest-2023',
                'image' => 'images/ITTalent.jpg'
            ),
            array(
                'title' => 'Hội thảo Định hướng phát triển đào tạo, nghiên cứu khoa học và đổi mới sáng tạo',
                'content' => 'Hướng tới Kỷ niệm 05 năm thành lập Khoa Công nghệ thông tin và mục đích giúp trao đổi kinh nghiệm, định hướng phát triển công tác tổ chức đào tạo, tuyển sinh, nghiên cứu khoa học giữa đội ngũ giảng viên, nhân sự nội bộ khoa, Khoa Công nghệ thông tin đã tổ chức Hội thảo Định hướng phát triển đào tạo, nghiên cứu khoa học và đổi mới sáng tạo trong hai ngày 28-29/10/2023 tại Hoa Lư, Ninh Bình.',
                'link' => 'https://cs.phenikaa-uni.edu.vn/vi/post/tin-tuc/sub-tin-tuc/hoi-thao-dinh-huong-phat-trien-dao-tao-nghien-cuu-khoa-hoc-va-doi-moi-sang-tao',
                'image' => 'images/Hoithao.jpg'
            ),
            array(
                'title' => 'Chương trình học bổng Tokyo Techies Scholarship Program 2023 (đợt 2)',
                'content' => 'Triển khai thoả thuận hợp tác giữa Khoa Công nghệ thông tin và Công ty Tokyo Techies, Khoa thông báo và hướng dẫn sinh viên đăng ký Chương trình học bổng Tokyo Techies Scholarship Program như sau:',
                'link' => 'https://cs.phenikaa-uni.edu.vn/vi/post/tin-tuc/thong-bao/chuong-trinh-hoc-bong-tokyo-techies-scholarship-program-2023-dot-2',
                'image' => 'images/Tokyo.png'
            )
        );

        // Hiển thị tin tức
        foreach ($newsArticles as $article) {
            echo '<div class="news-article">';
            echo '<img class="article-image" src="' . $article['image'] . '" alt="Event Image">';
            echo '<div class="article-title"><a href="' . $article['link'] . '">' . $article['title'] . '</a></div>';
            echo '<div class="article-content">' . $article['content'] . '</div>';
            echo '</div>';
        }
        ?>
    </div>

</body>

</html>