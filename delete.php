<?php 
require_once 'C:\xampp\htdocs\learnPhp\mysql-php\connet.php';
require_once 'C:\xampp\htdocs\learnPhp\mysql-php\curd.php';
if (isset($_POST['delete'])){
    $del = $_POST['product_id'];
    $mysql = "DELETE FROM products WHERE  id = ?"; 
    $delet = mysqli_prepare($conn,$mysql);  
    mysqli_stmt_bind_param($delet, 's', $del );
    if(mysqli_stmt_execute($delet)){
        if (mysqli_stmt_affected_rows($delet) > 0) {
            echo "
            <script>
            alert('Xóa dữ liệu thành công');
            window.location.href = 'ammin.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Không tìm thấy dữ liệu để xóa');
            </script>
            ";
        }
    }else{
        echo"
        <script>
        alert('Xóa dữ liệu không thành công');
        </script>
        ";
    }
    mysqli_stmt_close($delet);
}
mysqli_close($conn);
?>  
