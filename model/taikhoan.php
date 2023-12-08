<?php
function insert_dangky($tenNV,$ngaysinh,$img,$email,$sodienthoai,$matkhau,$vaitro,$xacthuc){
 $sql = "INSERT INTO `taikhoan`( `ho_ten`, `ngay_sinh`, `anh`, `email`, `sdt`, `mat_khau`, `vai_tro`, `xac_thuc`) VALUES (?,?,?,?,?,?,?,?)";
 pdo_execute($sql,$tenNV,$ngaysinh,$img,$email,$sodienthoai,$matkhau,$vaitro,$xacthuc);
}
function update_taikhoan($id,$vaiTro){
 $sql = "UPDATE `khach_hang` SET `vai_tro`='$vaiTro' WHERE id_khachhang =? ";
 pdo_execute($sql,$id);
}
function select_taikhoan($email,$pass){
    
    $sql = "SELECT * FROM taikhoan WHERE email = '$email' AND mat_khau = '$pass'";
   $tk = pdo_query_one($sql);
   if($tk){
    $_SESSION['admin'] = $tk;
    $_SESSION['id_khachhang'] = $tk['id_khachhang'];
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
    $sql = "SELECT * FROM taikhoan  ";
    return pdo_query($sql);
}
function select_oneuser($id){
    $sql = "SELECT * FROM `taikhoan` WHERE id_khachhang =?";
    return pdo_query_one($sql,$id);
}
function delete_user($idtk){
    $sql = "DELETE FROM `taikhoan` WHERE id_khachhang =$idtk";
    return pdo_execute($sql);
}

function update_pass($idtk,$passnew){
    $sql = "UPDATE `taikhoan` SET `mat_khau`='$passnew', `xac_thuc`= 1 WHERE id_khachhang=$idtk";
     pdo_execute($sql);
}

function update_taikhoan1($ho_ten,$ngay_sinh,$img,$email,$sdt,$id){
    $sql = "UPDATE `taikhoan` SET `ho_ten`='$ho_ten',`ngay_sinh`='$ngay_sinh',`anh`='$img',`email`='$email',`sdt`='$sdt' WHERE `id_khachhang`=$id";
     pdo_execute($sql);
}