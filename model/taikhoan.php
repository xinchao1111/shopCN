<?php 
function insert_taikhoan($email,$user,$pass) {
    $sql = "INSERT INTO taikhoan(email,user,pass) values('$email','$user','$pass')";
    pdo_execute($sql);
}

function loadAll_taikhoan() {
    $sql = "select * from taikhoan order by id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}

function checkuser($user,$pass) {
    $sql="select * from taikhoan where user='".$user."' and pass='".$pass."'"; 
    $tk=pdo_query_one($sql);
    return $tk;
}

function checkemail($email) {
    $sql="select * from taikhoan where email='".$email."'"; 
    $em=pdo_query_one($sql);
    return $em;
}

function update_taikhoan($id, $user, $pass, $email, $address, $tel) {

    $sql = "UPDATE taikhoan SET user=?, pass=?, email=?, address=?, tel=? WHERE id=?";
    pdo_query($sql, $user, $pass, $email, $address, $tel, $id);
    


    // $sql ="UPDATE taikhoan SET user='.$user.',pass='.$pass.',email='.$email.',address='.$address.',tel='.$tel.' WHERE id=".$id;
    // pdo_execute($sql);
}

