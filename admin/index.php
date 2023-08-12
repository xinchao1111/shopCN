<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/cart.php";
    include "header.php";
    //controller

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act){

            // danh mục
            case 'adddm':
                //kiểm tra nguoi dung co click nut add hay không 
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Them thanh cong";
                }
                include "danhmuc/add.php";
                break;
            case 'listdm':
                $listdanhmuc=loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc=loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    $dm=loadOne_danhmuc($_GET['id']);
                }
                include "danhmuc/update.php";
                break;
            case 'updatedm';
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id, $tenloai);
                    $thongbao = "Cap nhat thanh cong";
                }
                $listdanhmuc=loadAll_danhmuc();
                include "danhmuc/list.php";
                break;

            //sản phẩm
            case 'addsp':
                //kiểm tra nguoi dung co click nut add hay không 
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    }else {
                       // echo "Sorry, there was an error uploading your file.";
                    }

                    insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm);
                    $thongbao = "Them thanh cong";
                }
                $listdanhmuc=loadAll_danhmuc();
                // var_dump($listdanhmuc);
                include "sanpham/add.php";
                break;
            case 'listsp':
                if(isset($_POST['listok']) && ($_POST['listok'])){
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                }else {
                    $kyw = "";
                    $iddm = 0;
                }

                $listdanhmuc=loadAll_danhmuc();
                $listsanpham=loadAll_sanpham($kyw,$iddm);
                include "sanpham/list.php";
                break;
            case 'xoasp':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham=loadAll_sanpham();
                include "sanpham/list.php";
                break;
            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sanpham=loadOne_sanpham($_GET['id']);
                }
                $listdanhmuc=loadAll_danhmuc();
                include "sanpham/update.php";
                break;
            case 'updatesp';
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    }else {
                       // echo "Sorry, there was an error uploading your file.";
                    }
                    update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
                    $thongbao = "Cap nhat thanh cong";
                }
                $listdanhmuc=loadAll_danhmuc();
                $listsanpham=loadAll_sanpham();
                include "sanpham/list.php";
                break;

            case 'dskh':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sanpham=loadOne_sanpham($_GET['id']);
                }
                $listtaikhoan=loadAll_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'dsbl':
                $listbinhluan=loadAll_binhluan(0);
                include "binhluan/list.php";
                break;
            case 'xoabl':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    delete_binhluan($_GET['id']);
                }
                $listdanhmuc=loadAll_binhluan(1);
                include "binhluan/list.php";
                break;
            case 'thongke':
                $listthongke=loadAll_thongke();
                include "thongke/list.php";
                break;
            case 'listbill':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw=$_POST['kyw'];
                }else {
                    $kyw="";
                }
                $listbill=loadALl_bill($kyw,0);
                include "bill/listbill.php";
                break;
            case 'xoadh':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    delete_donhang($_GET['id']);
                }
                $listbill=loadALl_bill();
                include "bill/listbill.php";
                break;
            default:
                include "home.php";
                break;
        }
    }else {
        include "home.php";
    }

    include "home.php";

    include "footer.php";
?>