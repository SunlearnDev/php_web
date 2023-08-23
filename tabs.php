<?php 
require_once 'C:\xampp\htdocs\learnPhp\mysql-php\connet.php';

$conten='content';
$mysqltble = "ALTER TABLE products ADD  $conten VARCHAR(255) ";
if(!mysqli_query($conn,$mysqltble)){
    echo "$mysqltble";
    die('error');
}
$data = array(
    "Áo Khoác Vest" => "Áo khoác vest lịch lãm và phong cách, là lựa chọn hoàn hảo để tôn lên vẻ trẻ trung và lịch lãm của bạn.",
    "Quần Thời Thượng" => "Quần thời thượng với kiểu dáng hiện đại và chất liệu thoải mái, giúp bạn tự tin trong mọi bữa tiệc và sự kiện.",
    "Vest Xám Kẻ Sọc" => "Bộ vest xám kẻ sọc tinh tế, phù hợp cho các dịp quan trọng, từ cuộc họp công việc đến dự tiệc.",
    "Áo Sơ Mi Nâu" => "Áo sơ mi nâu trẻ trung và cá tính, mang đến vẻ ngoại hình cuốn hút và phong cách riêng biệt.",
    "Đầm viscose xanh" => "Đầm viscose màu xanh tươi sáng, thích hợp cho những ngày nắng ấm hoặc dạo chơi cùng bạn bè.",
    "Váy Màu Xanh" => "Váy màu xanh dịu dàng và trẻ trung, phù hợp cho những buổi hẹn hò hoặc dạo phố.",
    "Váy Màu Hồng" => "Váy màu hồng ngọt ngào, tạo nên vẻ đẹp dịu dàng và nữ tính.",
    "Áo Khoác kaki" => "Áo khoác kaki với thiết kế đơn giản nhưng không kém phần thời trang, là món đồ không thể thiếu trong tủ quần áo.",
    "Đầm maxi hai dây" => "Đầm maxi hai dây với kiểu dáng thoải mái và rộng rãi, phù hợp cho những buổi dạo chơi ngày hè.",
    "Áo Sơ Mi Xanh" => "Áo sơ mi xanh trẻ trung và năng động, phù hợp cho cả công việc và cuộc sống hàng ngày.",
    "Đầm Xòe Ren Màu Trắng" => "Đầm xòe ren màu trắng thanh lịch, tạo nên vẻ đẹp dịu dàng và tinh tế.",
    "Váy Đẹp Cho Phái Nữ" => "Váy đẹp cho phái nữ, mang đến sự quý phái và nữ tính cho người mặc.",
    "Vest Đen Chấm Nhỏ" => "Bộ vest đen chấm nhỏ với điểm nhấn tinh tế, thể hiện phong cách riêng biệt và đẳng cấp.",
    "Áo Sơ Mi Xanh Tím" => "Áo sơ mi xanh tím với gam màu độc đáo, thích hợp cho những ngày nắng ấm.",
    "Giày Nâu Xám Phái Nam" => "Đôi giày nâu xám phái nam với thiết kế đơn giản và nam tính, dễ dàng kết hợp với nhiều trang phục.",
    "Giày Nâu Giản dị" => "Đôi giày nâu giản dị và dễ dàng mix đồ, phù hợp cho mọi dịp sự kiện.",
    "Giày adidas" => "Giày adidas thể thao với thiết kế năng động và tiện ích, phù hợp cho hoạt động thể thao và hàng ngày.",
    "Dép Su Quay Hậu" => "Dép su quay hậu với phần quai sau độc đáo, mang lại sự thoải mái và phong cách độc đáo.",
    "Giày Cao Gót Màu Nâu Bóng" => "Giày cao gót màu nâu bóng với độ cao vừa phải, giúp tôn lên vẻ đẹp quý phái và sành điệu.",
    "Dép Bạc Gót" => "Đôi dép bạc gót thấp với kiểu dáng sang trọng, thích hợp cho các dịp tiệc tùng và dạo phố.",
    "Giày Ống Cao" => "Đôi giày ống cao trẻ trung và cá tính, mang đến vẻ ngoại hình mạnh mẽ và tự tin.",
    "Giày Thể Thao Năng Động" => "Giày thể thao năng động với màu sắc tươi sáng, phù hợp cho những buổi tập thể dục và hoạt động ngoài trời.",
    "Giày Cao Gót Su" => "Giày cao gót su mềm mại với độ cao vừa phải, giúp bạn tự tin và quyến rũ.",
    "Giày Thể Thao Nike" => "Giày thể thao Nike với thiết kế đẳng cấp và công nghệ tiên tiến, giúp bạn thể hiện phong cách thể thao đỉnh cao.",
    "Giày Thể Thao Xanh" => "Đôi giày thể thao xanh năng động và mạnh mẽ, thích hợp cho các hoạt động thể thao và cuộc sống hàng ngày.",
    "Đầm Dự Tiệc Màu Hồng Cam" => "Đầm dự tiệc màu hồng cam tạo nên vẻ đẹp rạng ngời và quý phái, phù hợp cho các buổi tiệc đặc biệt.",
    "Đầm Thai Sản Màu Xanh" => "Đầm thai sản màu xanh dịu dàng và thoải mái, là sự lựa chọn hoàn hảo cho những tháng cuối thai kỳ.",
    "Thắt Lưng Do Chạm Khắc" => "Thắt lưng do chạm khắc với kiểu dáng độc đáo và phong cách tinh tế, thể hiện gu thời trang riêng biệt.",
    "Quần kaki Màu Nâu" => "Quần kaki màu nâu đa năng và dễ dàng mix đồ, phù hợp cho cả công việc và cuộc sống hàng ngày.",
    "Bộ Cotton Henley" => "Bộ cotton Henley với chất liệu thoải mái và kiểu dáng trẻ trung, là sự lựa chọn hoàn hảo cho những ngày nghỉ cuối tuần.",
    "Váy Xám Đẹp" => "Váy xám đẹp với thiết kế tinh tế và màu sắc trung tính, dễ dàng kết hợp với nhiều phong cách thời trang.",
);

foreach ($data as $nameProducts => $value) {
    $mysqlUpdate = "UPDATE products SET 'content = '$value' WHERE id BETWEEN 2 AND 33 AND name = '$nameProducts'";
    if (!mysqli_query($conn, $mysqlUpdate)) {
        echo "$mysqlUpdate";
        die('error');
    }
}
mysqli_close($conn);
?>


