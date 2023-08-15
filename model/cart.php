<?php

function viewcart($del){
    global $img_path;
    $tong=0;
    $i=0;
    if($del==1){
        $xoasp_th='<th>Thao tác</th>';
        $xoasp_td2='<td></td>';
    }else{
        $xoasp_th='';
        $xoasp_td2='';
    }
    echo '<tr>
        <th>Hình</th>
        <th>Sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        '.$xoasp_th.'
        </tr>';
    foreach($_SESSION['mycart'] as $cart){
        $hinh=$img_path.$cart[2];
        $ttien=$cart[3]*$cart[4];
        $tong+=$ttien;
        $tangsp = "index.php?act=tangsoluong&idcart=" . $i;
        $giamsp = "index.php?act=giamsoluong&idcart=" . $i;
        if($del==1){
            $xoasp_td = 'index.php?act=delcart&idcart='.$i.'';
        }else{
            $xoasp_td='';   
        }
        echo '
                <tr>
                <td><img src="'.$hinh.'" height="80px"></td>
                <td>'.$cart[1].'</td> 
                <td>'.$cart[3].'</td>
                <td>
                    <a href="' . $giamsp . '"><button>-</button></a>
                    ' . $cart[4] . '
                    <a href="' . $tangsp . '"><button>+</button></a>
                </td>
                <td>'.$ttien.'</td>
                <td><a href="'.$xoasp_td.'"><input type="button" value="Xóa"></a></td>
                </tr>';
         $i+=1;          
    }
     echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>

            <td>'.$tong.'</td>
            '.$xoasp_td2.'
        </tr>';
    }

        

        function tongdonhang(){
            $tong=0;
            foreach($_SESSION['mycart'] as $cart){
                $ttien=$cart[3]*$cart[4];
                $tong+=$ttien;
            }
            return $tong;
        }

function insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang) {
    $sql = "INSERT INTO bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill) {
    $sql = "INSERT INTO cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql); 
}

function loadOne_bill($id) {
    $sql="select * from bill where id=".$id; 
    $bill=pdo_query_one($sql);
    return $bill;
}

function loadAll_cart($idbill) {
    $sql="select * from cart where idbill=".$idbill; 
    $bill=pdo_query($sql);
    return $bill;
}

function bill_chi_tiet($listbill){
    global $img_path;
    $tong=0;
    $i=0;
    // echo '<tr>
    //     <th>Hình</th>
    //     <th>Sản phẩm</th>
    //     <th>Đơn giá</th>
    //     <th>Số lượng</th>
    //     <th>Thành tiền</th> 
    //     </tr>';
    foreach($listbill as $cart){
        $hinh=$img_path.$cart['img'];
        $tong+=$cart['thanhtien'];
        echo '
                <tr>
                <td><img src="'.$hinh.'" height="80px"></td>
                <td>'.$cart['name'].'</td> 
                <td>'.$cart['price'].'</td>
                <td>'.$cart['soluong'].'</td>
                <td>'.$cart['thanhtien'].'</td>
                </tr>';
         $i+=1;          
    }
     echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>

            <td>'.$tong.'</td>
        </tr>';
}

function loadALl_bill($kyw="",$iduser=0) {

    $sql="select * from bill where 1";
    if($iduser>0) $sql.=" and iduser=".$iduser; 
    if($kyw!="") $sql.=" and id like '%".$kyw."%'"; 
    $sql.=" order by id desc";
    $listbill=pdo_query($sql);
    return $listbill;
}

function loadALl_cart_count($idbill) {
    $sql = "SELECT * FROM cart WHERE idbill=" . $idbill; 
    $cartItems = pdo_query($sql); // Assuming pdo_query returns an array of items
    return sizeof($cartItems);
}


function get_ttdh($n){
    switch ($n) {
        case '0':
            $tt="Đơn hàng mới";
            break;
        case '1':
            $tt="Đang xử lý";
            break;
        case '2':
            $tt="Đang giao hàng";
            break;
        case '3':
            $tt="Đã thanh toán";
            break;
        default:
            break;
    }
    return $tt;
}

function loadAll_thongke(){
    $sql="select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as tbprice";
    $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql.=" group by danhmuc.id order by danhmuc.id desc";
    $listtk=pdo_query($sql);
    return $listtk;
}

// function delete_donhang($id) {
//     $sql = "DELETE FROM bill WHERE id=".$id;
//     pdo_execute($sql);
// }

function delete_donhang($id) {
    // Xóa liên kết đơn hàng với sản phẩm trước
    $sql_delete_order_products = "DELETE FROM cart WHERE idbill = :id";
    $params = array(':id' => $id);
    pdo_execute1($sql_delete_order_products, $params);

    // Xóa đơn hàng
    $sql_delete_bill = "DELETE FROM bill WHERE id = :id";
    pdo_execute1($sql_delete_bill, $params);
}

function update_bill_status($bill_id, $new_status) {
    $sql = "UPDATE bill SET bill_status = :status WHERE id = :id";
    $sql_args = array(':status' => $new_status, ':id' => $bill_id);
    pdo_execute($sql, $sql_args);
}



