<?php
ob_start();
session_start();

include_once "../model/pdo.php";
include_once "../global.php";
include_once "../model/loaiphong.php";
include_once "../model/phong.php";
include_once "../model/loaigiuong.php";
include_once "../model/tienich.php";
include_once "../model/dichvu.php";
include_once "../model/taikhoan.php";
include_once "../model/datphong.php";
// $checkName = "/^[0-99\p{L}\s]+$/u";
// $checkName = "/^([a-zA-Z ]+[0-9]*)+$/";
$checkName = "/^[a-zA-Z\sáàảãạắằẳẵặấầẩẫậéèẻẽẹếềểễệíìỉĩịóòỏõọốồổỗộớờởỡợúùủũụứừửữựýỳỷỹỵđÁÀẢÃẠẮẰẲẴẶẤẦẨẪẬÉÈẺẼẸẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌỐỒỔỖỘỚỜỞỠỢÚÙỦŨỤỨỪỬỮỰÝỲỶỸỴĐ ]+[0-9]*$/";
$checkTen = "/^[a-zA-Z\sáàảãạắằẳẵặấầẩẫậéèẻẽẹếềểễệíìỉĩịóòỏõọốồổỗộớờởỡợúùủũụứừửữựýỳỷỹỵđÁÀẢÃẠẮẰẲẴẶẤẦẨẪẬÉÈẺẼẸẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌỐỒỔỖỘỚỜỞỠỢÚÙỦŨỤỨỪỬỮỰÝỲỶỸỴĐ ]+$/";
// $AllLoaiPhong = select_Allloaiphong();
// $listLoaiPhong = select_Allloaiphong("");
// trang_thai();
include "header.php";




if(isset($_GET['act']) && $_GET['act']){
    switch ($_GET['act']) {
        case 'search':
            if(isset($_POST['submit']) && $_POST['submit']){
                if(isset($_GET['a']) && $_GET['a']){
                    if($_GET['a'] == 'listlp'){
                        if(isset($_POST['submit']) && $_POST['submit']){
                        $listLoaiPhong = select_Allloaiphong($_POST['keyw']);
                        }
                        include "loaiphong/list.php";
                        
                    } else if($_GET['a'] == 'adddichvudatphong'){
                        if(isset($_POST['submit']) && $_POST['submit']){
                          

                             $idDon = $_POST['keyw'];
                        }
                    // header('location:index.php?act=adddichvudatphong&&a=adddichvudatphong');
                        

                        
                    }
                    // else if($_GET['a'] == 'listdm'){
                    //     $listDm = select_Alldanhmuc('',$_POST['keyw']);
                    //     include "danhmuc/list.php";

                    // } else{
                    //     echo "<script>alert('Không tìm thấy trang');window.location='index.php';</script>";
                    // }
                }
                
                
            }
        break;
        case 'sodophong':
            $listDichVu = select_Alldichvu();
            if(isset($_GET['trangthai']) && $_GET['trangthai']){
            $trang_thai = $_GET['trangthai'];
            $listPhong = count_phong($trang_thai);

            } else {
            $listPhong = count_phong(' ');

            }
            // print_r($listPhong);
            include_once "sodophong/sodophong.php";

        break;
         
        case 'datphong':
            if(isset($_POST['submit'])){
                $idP = $_POST['id_phong'];
                $idLP = $_POST['id_loaiphong'];
                $gia = $_POST['giaphong'];
                $tenKH = $_POST['tenkhachhang'];
                $email = $_POST['email'];
                $soDT = $_POST['sodienthoai'];
                $ngayCheckIn = $_POST['ngaycheckin'];
                $ngayCheckOut = $_POST['ngaycheckout'];
                // echo 'haahhhahahhahah'.$gia;
                print_r($_POST);
            }

        break;
         
        
        case 'addlp':
            $AllLoaiGiuong = select_Allloaigiuong();
            if(isset($_GET['tenphong']) &&$_GET['tenphong']){
                $TenLP = $_GET['tenphong'];
                $data = kiemtra_trungdata($TenLP);
                if($data != []){
                // print_r($data);
                $error['tenloai']= 'Tên loại phòng đã tồn tại';
                  
                }
            }
            

           if(isset($_POST['submit']) && $_POST['submit']){
            if(preg_match($checkName,$_POST['tenlp'])){
                $tenLp = $_POST['tenlp']; 
                                                  
            }
            else{
                $thongbao = "Tên loại phòng sai định dạng ";             
            }
            
            if(!empty($_FILES['img']['name'])){
                $img = '../image/'.$_FILES['img']['name'];
                
                if(move_uploaded_file($_FILES['img']['tmp_name'],$img)){
                 $imgTC = "Upload ảnh thành công";

                } else{
                 $error['img'] = "Upload ảnh không thành công ! ";

                }
            }  else{
                 $error['img'] = "Hãy chọn ảnh cho phòng";
             } 

             if(isset($_POST['gia']) && $_POST['gia']){
                 if(is_int((int)$_POST['gia'])){
                 $gia = $_POST['gia'];                       
                 }
                 else{
                     $error['gia'] = "Giá phòng không hợp lệ!";
                 }
             } else{
                 $error['gia'] = "Không được bỏ trống !";
             }

             if(isset($_POST['mota']) && $_POST['mota']){
                 $moTa = $_POST['mota'];                       
                 
             } else{
                 $error['mota'] = "Không được bỏ trống !";
             }

             if(isset($_POST['soluongnguoi']) && $_POST['soluongnguoi']){
                 if(is_int((int)$_POST['soluongnguoi']) && (int)$_POST['soluongnguoi'] < 10){
                 $soLN = $_POST['soluongnguoi'];                       
                 }
                 else{
                     $error['soluongnguoi'] = "Số lượng người  không hợp lệ!";
                 }
             } else{
                 $error['soluongnguoi'] = "Không được bỏ trống !";
             }

             if(isset($_POST['dientich']) && $_POST['dientich']){
                 if(is_int((int)$_POST['dientich']) && (int)$_POST['dientich'] < 200){
                 $dienTich = $_POST['dientich'];                       
                 }
                 else{
                     $error['dientich'] = "Diện tích phòng không hợp lệ!";
                 }
             } else{
                 $error['dientich'] = "Không được bỏ trống !";
             }

             
             if(isset($_POST['idgiuong']) && $_POST['idgiuong']){
                $idGiuong = $_POST['idgiuong'];
            } else{
                $error['loaigiuong'] = "Không được bỏ trống !";

            }


             if(empty($error)){
                // echo "haha";
                // Cập nhật vào csdl
                insert_loaiphong($tenLp,$img,$gia,$moTa,$soLN,$dienTich,$idGiuong);
                $thongbaoTC ="Đã thêm phòng thành công !";
                header('refresh:2;url=index.php?act=listlp');
            }
           }
           include "loaiphong/add.php";

        break;

        case 'listlp':
            $listLoaiPhong = select_Allloaiphong("");
            // echo "<pre>";
            // print_r($listDM);
            include "loaiphong/list.php";
        break;

        case 'deletelp':
           if(isset($_GET['id']) && $_GET['id']){
            $id = $_GET['id'];
            delete_loaiphong($id);
            $thongbao = "Đã Xóa Thành Công !";
           }
            
           $listLoaiPhong = select_Allloaiphong("");          
            include "loaiphong/list.php";
        break;

        case 'editlp':
            $AllLoaiGiuong = select_Allloaigiuong();
            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
                $dm = select_Oneloaiphong($id);
                // print_r($dm);
                extract($dm); 
               if(isset($_POST['submit']) && $_POST['submit']){
                if(preg_match($checkName,$_POST['tenlp'])){
                    $tenLp = $_POST['tenlp'];
                    
                }
                else{
                        $thongbao = "Tên danh mục sai định dạng";
                }
                
                if(!empty($_FILES['img']['name'])){
                    $img = '../image/'.$_FILES['img']['name'];
                    
                    if(move_uploaded_file($_FILES['img']['tmp_name'],$img)){
                     $imgTC = "Upload ảnh thành công";
    
                    } else{
                     $error['img'] = "Upload ảnh không thành công ! ";
    
                    }
                }  else{
                    $img = $anh;
                 } 
    
                 if(isset($_POST['gia']) && $_POST['gia']){
                     if(is_int((int)$_POST['gia'])){
                     $gia = $_POST['gia'];                       
                     }
                     else{
                         $error['gia'] = "Giá phòng không hợp lệ!";
                     }
                 } else{
                     $error['gia'] = "Không được bỏ trống !";
                 }
    
                 if(isset($_POST['mota']) && $_POST['mota']){
                     $moTa = $_POST['mota'];                       
                     
                 } else{
                     $error['mota'] = "Không được bỏ trống !";
                 }
    
                 if(isset($_POST['soluongnguoi']) && $_POST['soluongnguoi']){
                     if(is_int((int)$_POST['soluongnguoi']) && (int)$_POST['soluongnguoi'] < 10){
                     $soLN = $_POST['soluongnguoi'];                       
                     }
                     else{
                         $error['soluongnguoi'] = "Số lượng người  không hợp lệ!";
                     }
                 } else{
                     $error['soluongnguoi'] = "Không được bỏ trống !";
                 }
    
                 if(isset($_POST['dientich']) && $_POST['dientich']){
                     if(is_int((int)$_POST['dientich']) && (int)$_POST['dientich'] < 200){
                     $dienTich = $_POST['dientich'];                       
                     }
                     else{
                         $error['dientich'] = "Diện tích phòng không hợp lệ!";
                     }
                 } else{
                     $error['dientich'] = "Không được bỏ trống !";
                 }
    
                 
                 if(isset($_POST['idgiuong']) && $_POST['idgiuong']){
                    $idGiuong = $_POST['idgiuong'];
                } else{
                    $error['loaigiuong'] = "Không được bỏ trống !";
    
                }
    
    
                 if(empty($error)){
                    update_loaiphong1($id,$tenLp,$img,$gia,$moTa,$soLN,$dienTich,$idGiuong);                  
                    
                    $thongbaoTC = " Đã Sửa Thành Công";
                    header('refresh:2;url=index.php?act=editlp&id='.$id_loaiphong);
                }


                }
             include "loaiphong/edit.php";

             }  

        break;

        case "listp" :

            $listP = select_Allphong();
        
            include "phong/list.php";
        break;

        case "addp" :
                $AllLoaiPhong  = select_Allloaiphong(" ");
                $error = [];
                if(isset($_GET['tenphong']) && $_GET['tenphong']){
                    $tenPhong = $_GET['tenphong'];
                    $data =  kiemtra_trungtenphong($tenPhong);
                   
                    if($data != []){
                    // print_r($data);
                    $error['ten_phong']= 'Tên phòng đã tồn tại';
                    
                    }
                }
                if(isset($_POST['submit']) && $_POST['submit']){
                    if(isset($_POST['ten_phong']) && $_POST['ten_phong']){
                        if(preg_match($checkName,$_POST['ten_phong'])){
                            $tenPhong = $_POST['ten_phong'];   
                                       
                        }
                        else{
                            $error['ten_phong'] = "Tên phòng không hợp lệ!";
                        }
                    } else{
                        $error['ten_phong'] = "Không được bỏ trống !";
                    }
    
                    if(isset($_POST['mota_phong']) && $_POST['mota_phong']){
                        $mota_phong = $_POST['mota_phong'];                       
                        
                    } else{
                        $error['mota_phong'] = "Không được bỏ trống !";
                    }
    
                    if(isset($_POST['id_lp']) && $_POST['id_lp']){
                        $id_lp= $_POST['id_lp'];
                    } else{
                        $error['loai_phong'] = "Không được bỏ trống !";
    
                    }
                    if(empty($error)){
                        insert_phong($tenPhong, $id_lp, $mota_phong);
                        $thongbaoTC ="Đã thêm phòng thành công !";
                        header('refresh:2;url=index.php?act=listp');

                    }
            }
            include_once "phong/add.php";
        break;   
            
        case 'editp':
                $AllLoaiPhong  = select_Allloaiphong(" ");
                $error = [];
        
                if(isset($_GET['id']) && $_GET['id']){
                    $id = $_GET['id'];
                    $phong = select_Onephong($id);
                    extract($phong);
                        if(isset($_POST['submit']) && $_POST['submit']){
                            if(isset($_POST['ten_phong']) && $_POST['ten_phong']){
                                if(preg_match($checkName,$_POST['ten_phong'])){
                                $ten_phong = $_POST['ten_phong'];                       
                                }
                                else{
                                    $error['ten_phong'] = "Tên phòng không hợp lệ!";
                                }
                            } else{
                                $error['ten_phong'] = "Không được bỏ trống !";
                            }
            
                            if(isset($_POST['mota_phong']) && $_POST['mota_phong']){
                                $mota_phong= $_POST['mota_phong'];                       
                                
                            } else{
                                $error['mota_phong'] = "Không được bỏ trống !";
                            }
            
                            if(isset($_POST['id_lp']) && $_POST['id_lp']){
                                $id_lp = $_POST['id_lp'];
                            } else{
                                $error['loai_phong'] = "Không được bỏ trống !";
            
                            }
                            if(empty($error)){
        
                                // Cập nhật vào csdl
                                update_phong($id,$ten_phong,$id_lp,$mota_phong);
                                $thongbaoTC ="Đã sửa Phòng thành công !";
                            }
                    
                        }
                }   
                include "phong/edit.php";
        break;
    
        case 'deletep':
            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
                delete_phong($id);
                $thongbao = "Đã Xóa Thành Công !";
            }
                        
            $listP = select_Allphong();           
            include "phong/list.php";
        break;
    
        case 'addtienichloaiphong':
            $listLoaiPhong = select_Allloaiphong(" ");
            
            $listTienich = select_Alltienich();
            
            if(isset($_GET['idloaiphong']) && $_GET['idloaiphong']){
                $idLP = $_GET['idloaiphong'];
            }

            $listTI_LP = select_tienich_loaiphong(isset($_GET['idloaiphong'])? $_GET['idloaiphong'] : '');           
            if(isset($_POST['submit']) && $_POST['submit']){
                if(!empty($_POST['idloaiphong']) && $_POST['idloaiphong']){
                        if(isset($_GET['idloaiphong']) && $_GET['idloaiphong']){
                            $idLP = $_GET['idloaiphong'];
                            if(isset($_POST['tienich']) && $_POST['tienich']){
                                // Lấy dữ liệu từ checkbox
                                $tienIch = $_POST['tienich'];
                                delete_tienich_loaiphong($idLP);
                                foreach ($tienIch as $ti) {
                                    insert_tienich_loaiphong($idLP,$ti);
                                    
                                    
                                }
                                // echo '<script> alert("Đã thêm thành công !"); </script>';
                                $thongbao="Thêm thành công!";

                            // header("Refresh: 2; url=index.php?act=addtienichphong&idphong=$idP");   
                            } else {
                                $error['tienich'] = "Không được bỏ trống!";


                            }
                           
                        }
                } 
                

                
            }
            
            include_once 'loaiphong/addtienichloaiphong.php';
            break;
        

        case "listu":
            $listU = select_alluser();
            // echo "<pre>";
            // print_r($listU);

            include_once "user/list.php";

            break; 
        case "editu":
            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
                $User = select_oneuser($id);
                extract($User);
                $roLe = [
                    'admin' => ['name'=>'Admin','value'=>0],
                    'member' => ['name'=>'Member','value'=>1]
                ];
                if(isset($_POST['submit']) && $_POST['submit']){
                $vaiTro = $_POST['vaitro'];
                update_taikhoan($id,$vaiTro);
                $thongbaoTC = "Đã sửa thành công !";
                }
                
               }

            include_once "user/edit.php";
            

            break; 
        case "deleteu":
            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
                delete_user($id);
                $thongbao = "Đã Xóa Thành Công !";
               }

            include_once "user/list.php";
            

            break; 

       

        // 
        case "listdatphong":
            $list_DH = select_Alldatphong();
            include_once "datphong/list.php";
        break;

        case 'adddichvudatphong':
            $listDon= select_Alldatphong();
            $listDichVu = select_Alldichvu();
            $listP = select_dathang_phong();
            $error = [];
                if(isset($_GET['idphong']) && $_GET['idphong']){
                    $idPhong = $_GET['idphong'];
                    $idDon = $_GET['iddon'];
                    $dv_DH = select_dichvu_datphong($idPhong);
                    $tongTien = $dv_DH['0']['tong_tien'] ;
                    foreach ($dv_DH as $dh) {
                        $tongTien += $dh['gia_dichvu'];
                    //     echo "<pre>";
                    // print_r($dh);
                    }
                    }
                    
                
          
            

            // $listDV_P = select_dichvu_phong(isset($_GET['idphong'])? $_GET['idphong'] : '');
            if(isset($_POST['submit']) && $_POST['submit']){
                if(!empty($_POST['idphong']) && $_POST['idphong']){
                    // $idPhong = $_POST['idphong'];
                   
                } else {
                    $error['idphong'] = "Không được bỏ trống!";
                }
                if(isset($_GET['idphong']) && $_GET['idphong']){
                    if(isset($_POST['dichvu']) && $_POST['dichvu']){
                        // Lấy dữ liệu từ checkbox
                        $dichvu = $_POST['dichvu'];   
                        delete_dichvu_datphong($idDon);
                        foreach ($dichvu as $dv) {
                            insert_dichvu_datphong($idDon,$dv);
    
                        }
                        
                        $thongbao="Thêm thành công!"; 
                        header('refresh:2;url=index.php?act=adddichvudatphong&a=adddichvudatphong&idphong='.$idPhong.'&iddon='.$idDon);


                    } else {
                        $error['dichvu'] = "Không có lựa chọn nào được chọn.";
                    }
    
                    
                }
                
            }
            
            include_once 'datphong/adddichvudatphong.php';
        break;


        default:
        include "home.php";
            break;


    }
} else {
include "home.php";


}




include "footer.php";



ob_flush();

?>
