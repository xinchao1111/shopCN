<?php 

function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan) {
    $sql = "INSERT INTO binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}

function delete_binhluan($id) {
    $sql = "DELETE FROM binhluan WHERE id=".$id;
    pdo_execute($sql);
}

function loadAll_binhluan($idpro) {
    $sql ="select * from binhluan where 1";
    if($idpro>0) $sql.=" AND idpro='".$idpro."'";
    $sql.=" order by id desc";

    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
