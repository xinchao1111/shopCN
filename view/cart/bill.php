<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css//style.css">

    <style>
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

tr:nth-child(even) {
  background-color: #f2f2f2;
}

.total-row {
  font-weight: bold;
}

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

      <form action="index.php?act=billcomfirm" method="post">
        <div class="row mb">
            <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
            <div class="row boxcontent billform">
                <table>
                    <?php 

                        if(isset($_SESSION['user'])){
                            $name=$_SESSION['user']['user'];
                            $address=$_SESSION['user']['address'];
                            $email=$_SESSION['user']['email'];
                            $tel=$_SESSION['user']['tel'];
                        }else {
                            $name="";
                            $address="";
                            $email="";
                            $tel="";
                        }
                    ?>
                    <tr>
                        <td>Người đặt hàng</td>
                        <td><input type="text" name="name" value="<?=$name?>"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><input type="text" name="address" value="<?=$address?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?=$email?>"></td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td><input type="text" name="tel" value="<?=$tel?>"></td>
                    </tr>
                </table>
            </div>

            <div class="row mb">
                <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
                <div class="row boxcontent">
                    <table>
                        <tr>
                            <td><input type="radio" value="1" name="pttt" checked>Trả tiền khi nhận hàng</td>
                            <td><input type="radio" value="2" name="pttt">Chuyển khoản ngân hàng</td>
                            <td><input type="radio" value="3" name="pttt">Thanh toán online</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- <div class="row mb">
              <div class="boxtitle">THÔNG TIN GIỎ HÀNG</div>
              <div class="row boxcontent cart">
                <table>
                    
                    <?php
                        viewcart(0);
                    ?>
                </table>
              </div>
            </div> -->
            
            </div>
            <div class="row mb bill">
                <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
                <!-- <a href="index.php?act=bill"><input type="button" value="Đồng ý đặt hàng"></a> 
                <a href="index.php?act=addtocart"> <input type="button" value="Quay lại giỏ hàng"> </a> -->
             </div>
        </div>
      </form>
    
    <div class="boxphai">
        <?php
            include "view/boxright.php"; 
        ?>
    </div>
</div>

</body>
</html>