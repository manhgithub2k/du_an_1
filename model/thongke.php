<?php 
function tongtien_All(){
    $sql = "SELECT SUM(tong_tien) FROM dat_phong";
    return pdo_query_one($sql);    
}

// function tongtien_thang(){
//     $thang = date('m');
//     $nam = date('Y');

//     $sql = "SELECT SUM(tong_tien) AS tongtien_thang FROM dat_phong WHERE ngay_datphong LIKE '$nam-$thang-__ __:__:__'";
//     return pdo_query_one($sql);
// }

function tongtien_thang($thang = null) {
    $nam = date('Y');
    $whereClause = "";
  
    if ($thang) {
      $whereClause = "WHERE ngay_datphong LIKE '$nam-$thang-__ __:__:__'";
    } else {
      $whereClause = "WHERE ngay_datphong LIKE '$nam-__-__ __:__:__'";
    }
  
    $sql = "SELECT SUM(tong_tien) AS tongtien_thang FROM dat_phong $whereClause";
    return pdo_query_one($sql);
  }

function tongtien_ngay(){
    $ngay = date('d');
    $thang = date('m');
    $nam = date('Y');

    $sql = "SELECT SUM(tong_tien) AS tongtien_ngay FROM dat_phong WHERE ngay_datphong LIKE '$nam-$thang-$ngay __:__:__'";
    return pdo_query_one($sql);
}

function tongdon_ngay(){
    $ngay = date('d');
    $thang = date('m');
    $nam = date('Y');

    $sql = "SELECT COUNT(tong_tien) AS tongdon_ngay FROM dat_phong WHERE ngay_datphong LIKE '$nam-$thang-$ngay __:__:__'";
    return pdo_query_one($sql);
}

function tile_phongduocdat(){
    $ngay = date('d');
    $thang = date('m');
    $nam = date('Y');

    $sql = "SELECT COUNT(dp.id_don) AS tongdon_ngay, COUNT(p.id_phong) AS tongphong, ROUND((COUNT(dp.id_don) * 100) / COUNT(p.id_phong), 0) AS tile FROM phong AS p LEFT JOIN dat_phong AS dp ON p.id_phong = dp.id_p AND DATE(dp.ngay_datphong) = '$nam-$thang-$ngay __:__:__'";
    return pdo_query_one($sql);
}

function bieudo_loaiphong($loaiphong){
  $nam = date('Y');
  $thang = date('m');

  $sql = "SELECT COUNT(id_don) AS soluong FROM dat_phong WHERE id_lp = $loaiphong AND ngay_datphong LIKE '$nam-$thang-__ __:__:__'";
  return pdo_query_one($sql);
}
?>
