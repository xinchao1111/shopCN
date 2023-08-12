<?php 

function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm) {
    $sql = "INSERT INTO sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($id) {
    $sql = "DELETE FROM sanpham WHERE id=".$id;
    pdo_execute($sql);
}

function loadAll_sanpham_home() {
    $sql = "select * from sanpham where 1 order by id desc limit 0,9";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

function loadAll_sanpham_top10() {
    $sql = "select * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

function loadAll_sanpham($kyw="",$iddm=0) {
    $sql = "select * from sanpham where 1";
    if($kyw!="") {
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0) {
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

function load_ten_danhmuc($iddm){
    if($iddm>0){
        $sql="select * from danhmuc where id=".$iddm; 
        $dm=pdo_query_one($sql);
        extract($dm);
        return $name;
    }else {
        return "";
    }
    
}

// function loadOne_sanpham($id) {
//     $sql="select * from sanpham where id=".$id; 
//     $dm=pdo_query_one($sql);
//     return $dm;
// }

function loadOne_sanpham($id) {
    $sql="select * from sanpham where id=".$id; 
    $sp=pdo_query_one($sql);
    return $sp;
}

function load_sanpham_cungloai($id,$iddm) {
    $sql="select * from sanpham where iddm=".$iddm." and id <> ".$id; 
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

// function  update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
//     if($hinh!="")
//         $sql = $sql = "UPDATE sanpham SET iddm='.$iddm.',name='.$tensp.',price='.$giasp.',mota='.$mota.',img='.$hinh.' WHERE id=".$id;
//     else 
//         $sql = $sql = "UPDATE sanpham SET iddm='.$iddm.',name='.$tensp.',price='.$giasp.',mota='.$mota.' WHERE id=".$id;    
//     pdo_execute($sql);
// }

function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh) {
    try {
        if ($hinh != "") {
            $sql = "UPDATE sanpham SET iddm=?, name=?, price=?, mota=?, img=? WHERE id=?";
            pdo_query($sql, $iddm, $tensp, $giasp, $mota, $hinh, $id);
        } else {
            $sql = "UPDATE sanpham SET iddm=?, name=?, price=?, mota=? WHERE id=?";
            pdo_query($sql, $iddm, $tensp, $giasp, $mota, $id);
        }
    } catch (PDOException $e) {
        throw $e;
    }
}
