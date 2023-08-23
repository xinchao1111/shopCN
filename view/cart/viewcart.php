<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css//style.css">

    <style>
        /* Định dạng bảng giỏ hàng */
table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #ddd;
  margin-bottom: 20px;
}

th, td {
  padding: 10px;
  text-align: center;
  border: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}

/* Nút tăng/giảm số lượng */
button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

/* Nút Xóa */
input[type="button"] {
  background-color: #f44336;
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  cursor: pointer;
}

input[type="button"]:hover {
  background-color: #d32f2f;
}

/* Các dòng chẵn và lẻ có màu nền khác nhau */
tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* Tổng đơn hàng */
.total-row {
  font-weight: bold;
}

/* Nút Đồng ý đặt hàng và Xóa giỏ hàng */
.bill input[type="submit"],
.bill a input[type="button"] {
  background-color: #2196F3;
  color: white;
  border: none;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  cursor: pointer;
  margin-top: 10px;
}

.bill input[type="submit"]:hover,
.bill a input[type="button"]:hover {
  background-color: #1976D2;
}

</style>
</head>
<body>




<div class="row mb">
<div class="boxtrai mr">
    <div class="row mb">
        <div class="boxtitle">GIỎ HÀNG</div>
        <?php if (isLoggedIn()): ?>
            <?php if (!empty($_SESSION['mycart'])): ?>
                <div class="row boxcontent cart">
                    <table>
                        <?php 
                            viewcart(1);
                        ?>
                    </table>
                </div>
                <div class="row mb bill">
                    <a href="index.php?act=bill"><input type="button" value="Tiếp tục đặt hàng"></a>
                    <a href="index.php"> <input type="button" value="Thêm sản phẩm"> </a>
                    <a href="index.php?act=delcart"> <input type="button" value="Xóa giỏ hàng"> </a>
                </div>
            <?php else: ?>
                <div class="row mb bill">
                    <h2 style="color: red; font-size: 16px">Giỏ hàng trống</h2>
                    <a href="index.php"> <input type="button" value="Thêm sản phẩm"> </a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="row">
                <h2 style="color: red; font-size: 16px">Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.</h2>
            </div>
        <?php endif; ?>
    </div>
</div>


    
    <div class="boxphai">
        <?php
            include "view/boxright.php"; 
        ?>
    </div>
</div>

</body>
</html>