<?php 


function pdo_get_connection(){
    try{
        $conn = new PDO('mysql:host=localhost;dbname=polyhotel', 'root','');
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    } catch(PDOException $e){
        echo "Connection fail ".$e->getMessage();
    }
} 
pdo_get_connection();

// try , catch . xử lý ngoại lệ : trương chình vẫn chạy khi gặp lỗi 
// finally : câu lệnh sẽ được thực thi bất chấp ngoại lệ có hay ko 

function pdo_execute($sql){
    $sql_args=array_slice(func_get_args(),1);
    // array_slice() : 
    // func_get_args() : lấy tất cả các biến truyền vào trong function

    try{
        $conn=pdo_get_connection();  //gọi kết nối để connect database
        $stmt=$conn->prepare($sql);  // chuẩn hóa câu sql
        $stmt->execute($sql_args); // thực thi 

    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
// truy vấn nhiều dữ liệu
function pdo_query($sql){
    $sql_args=array_slice(func_get_args(),1);

    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows=$stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
// truy vấn  1 dữ liệu
function pdo_query_one($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

function kiemtra_trungdata($tenLoai){
    $sql = "SELECT `id_loaiphong`, `ten_loai`, `gia`, `anh`, `mo_ta`, `giam_gia`, `sl_nguoi`, `dien_tich`, `id_lg` FROM `loai_phong` WHERE ten_loai=?";
    return pdo_query($sql,$tenLoai);

}
function kiemtra_trungtenphong($tenPhong){
    $sql = "SELECT `id_phong`, `ten_phong`, `id_lp`, `mota_phong`, `trang_thai` FROM `phong` WHERE ten_phong=? ";
    return pdo_query($sql,$tenPhong);

}
?>


