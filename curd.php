<?php 

require_once 'C:\xampp\htdocs\learnPhp\mysql-php\connet.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .input-field {
        @apply bg-cyan-50 border border-cyan-300 text-cyan-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-cyan-700 dark:border-cyan-600 dark:placeholder-cyan-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500;
    }

    .checkbox-field {
        @apply w-4 h-4 border border-cyan-300 rounded bg-cyan-50 focus:ring-3 focus:ring-blue-300 dark:bg-cyan-700 dark:border-cyan-600 dark:focus:ring-blue-600 dark:ring-offset-cyan-800;
    }

    .btn-submit {
        @apply text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800;
    }
        
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-500 to-green-400">
<h2 class="w-full text-center text-2xl font-bold py-4">Thêm sản phẩm</h2>
<?php 
if(isset($_POST['submit'])){
    if(isset($_POST['name'], $_POST['content'], $_POST['price'], $_POST['quantity'], $_POST['fasion'], $_FILES['img'])) {
        $name = $_POST['name'];
        $content = $_POST['content'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $fasion = $_POST['fasion']; 
        $img = $_FILES['img'];
    
        $maximg = 5 * 1024 * 1024; // 5 MB
        if($img['size'] <= $maximg) {
            $check = getimagesize($img['tmp_name']);
            if($check === false) {
                echo "Tệp không phải là hình ảnh hợp lệ.";
            } else {
                $target = "images/" . basename($img['name']);
                if(move_uploaded_file($img['tmp_name'], $target)) {
                    // Tệp đã được tải lên và lưu trữ thành công
                    $mysql = "INSERT INTO products (name, category_id, image, price, created, quantity, content) VALUES ('$name', '$fasion', '$img', '$price', NOW(), '$quantity', '$content')";
                    $result = mysqli_query($conn, $mysql);
                    if (!$result) {
                        echo "Lỗi truy vấn: " . mysqli_error($conn);
                    } else {
                        echo "Dữ liệu đã được thêm thành công!";
                        header("Location: ammin.php");
                        exit;
                    }
                    
                } else {
                    echo "Lỗi khi lưu trữ tệp.";
                }
            }
        } else {
            echo "Kích thước tệp vượt quá giới hạn cho phép.";
        } 
    }    
}   
?>
<form class=" mx-96" method="POST">
    <div class="grid gap-6 mb-6 md:grid-cols-1">  
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-cyan-900 dark:text-white">Tên sản phẩm </label>
            <input type="text" name="name" class="bg-cyan-50 border border-cyan-300 text-cyan-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-cyan-700 dark:border-cyan-600 dark:placeholder-cyan-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
        </div>
        <div>
            <label for="content" class="block mb-2 text-sm font-medium text-cyan-900 dark:text-white">Mô ta sản phẩm</label>
            <textarea row="4" name="content" class="bg-cyan-50 border border-cyan-300 text-cyan-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-cyan-700 dark:border-cyan-600 dark:placeholder-cyan-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
        </div>  
        <div>
            <label for="price" class="block mb-2 text-sm font-medium text-cyan-900 dark:text-white">Giá VND</label>
            <input type="number" name="price" class="bg-cyan-50 border border-cyan-300 text-cyan-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-cyan-700 dark:border-cyan-600 dark:placeholder-cyan-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
        </div>
        <div>
            <label for="quantity" class="block mb-2 text-sm font-medium text-cyan-900 dark:text-white">Số lượng</label>
            <input type="number" name="quantity" class="bg-cyan-50 border border-cyan-300 text-cyan-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-cyan-700 dark:border-cyan-600 dark:placeholder-cyan-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
        </div>
        <select name="fasion" class="bg-cyan-50 border border-cyan-300 text-cyan-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-cyan-700 dark:border-cyan-600 dark:placeholder-cyan-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="1">Thời Trang Nam</option>
    <option value="2">Thời Trang Nữ</option>
    <option value="3">Thời Trang Nữa Mùa</option>
</select>
    </div>
    <label class="block mb-2 text-sm font-medium text-cyan-900 dark:text-white" for="file_input">Upload file</label>
    <input name="img" type="file" class="block w-full text-sm text-cyan-900 border border-cyan-300 rounded-lg cursor-pointer bg-cyan-50 dark:text-cyan-400 focus:outline-none dark:bg-cyan-700 dark:border-cyan-600 dark:placeholder-cyan-400" id="file_input">
    <button type="submit" name="submit" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-2/3 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ADD</button>
</form>         
<form action=""class=" mx-96  h-9 mt-2 " method="GET">
<div class="relative ">
             <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
             </div>
        <input type="search" name="search" value=""  id="default-search" class="block w-full h-full px-1 pl-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập ID hoặc tên sản phẩm" >
        <button type="submit" name="btn-search" class="text-white absolute right-0 bottom-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>
<?php 
if(isset($_GET['btn-search'])){
    $inptSearch = $_GET['search'];
    $query = "SELECT * FROM products where  id = ? OR name LIKE ?";
    $conte = mysqli_prepare($conn, $query);
    $searchValue = "%{$inptSearch}%";
// gắn giá trị truy vấn dữ lieuj.e
    mysqli_stmt_bind_param($conte,"ss",$inptSearch,$searchValue);
    // thực hiện truy vấn 
    mysqli_stmt_execute($conte);
    // lấy kết quả của truy vấn 
    $resutlst = mysqli_stmt_get_result($conte);

    if(!$conte){
        echo $conte;
        die('error');
   }else{
    while($row = mysqli_fetch_array($resutlst)){?>
        <div class="flex w-3/4 h-auto mx-auto my-10 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-full md:h-96  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover h-96 rounded-t-lg    md:rounded-none md:rounded-l-lg" src="<?php echo $row['image']; ?>" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row['name']; ?></h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $row['content']; ?></p>
                <div class="flex items-center mt-2.5 mb-5">
                    <?php
                            $evaluate= $row['status'];
                                for($i =1 ; $i <= 5 ; $i++){
                                    if($i <= $evaluate){?>
                                        <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                    <?php }
                                    else {?>
                                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    
                    <?php 
                        exit();}}?> 
              
                    
               
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3"><?php echo $row['status'].'.0'; ?></span>
                       </div>
                       <h5 class="mb-2 text-xl font-bold tracking-tight text-orange-600 dark:text-orange-600"><?php echo $row['price'].' VND' ; ?></h5>    
                <form action="delete.php" method="post">
                <div class="flex items-center">
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                <input type="submit" name="delete"  value="Xóa  "  class=" mx-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                </div>

                </form>
            </div>
       </div>
       
<?php }
}
mysqli_stmt_close($conte)  ;

}
mysqli_close($conn)  ;
?>
</body>

