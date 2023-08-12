<?php 

function insert_danhmuc($tenloai) {
    $sql = "INSERT INTO danhmuc(name) values('$tenloai')";
    pdo_execute($sql);
}

function delete_danhmuc($id) {
    $sql = "DELETE FROM danhmuc WHERE id=".$id;
    pdo_execute($sql);
}

function loadAll_danhmuc() {
    $sql = "select * from danhmuc order by id desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function loadOne_danhmuc($id) {
    $sql = "select * from danhmuc where id=".$id; 
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_danhmuc($id, $tenloai){
    $sql = "update danhmuc set name='$tenloai' where id=".$id;
    pdo_execute($sql);
}