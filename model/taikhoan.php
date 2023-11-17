<?php
function insert_dangky($email,$tentk,$mk){
 $sql = "INSERT INTO `taikhoan`( `email`, `tentaikhoan`, `matkhau`) VALUES ('$email','$tentk','$mk')";
 pdo_execute($sql);
}
function update_taikhoan($id,$vaiTro){
 $sql = "UPDATE `khach_hang` SET `vai_tro`='$vaiTro' WHERE id_khachhang =? ";
 pdo_execute($sql,$id);
}
function select_taikhoan($email,$pass){
    
    $sql = "SELECT * FROM `taikhoan` WHERE email = '$email' AND pass = '$pass'";
   $tk = pdo_query_one($sql);
   if($tk){
    $_SESSION['user'] = $email;
    $_SESSION['idtk'] = $tk['idtk'];
   }
   
   else{
    $thongbao= "Tên tài khoản hoặc mật khẩu không chính xác!";
   }
   return $tk; 

}
function select_Emailtaikhoan($email){
    
    $sql = "SELECT idtk, email, tentaikhoan, matkhau ,tk_vaitro FROM taikhoan WHERE email ='$email' ";
   $tk = pdo_query_one($sql);
   
   return $tk; 

}
function select_alluser(){
    $sql = "SELECT * FROM `khach_hang` ";
    return pdo_query($sql);
}
function select_oneuser($id){
    $sql = "SELECT * FROM `khach_hang` WHERE id_khachhang =?";
    return pdo_query_one($sql,$id);
}
function delete_user($idtk){
    $sql = "DELETE FROM `nguoidung` WHERE id_u =$idtk";
    return pdo_execute($sql);
}

function update_pass($idtk,$passnew){
    $sql = "UPDATE `taikhoan` SET `matkhau`='$passnew' WHERE idtk=$idtk";
     pdo_execute($sql);
}
