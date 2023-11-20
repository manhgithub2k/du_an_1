<?php
ob_start();
session_start();
include_once "../model/pdo.php";
include_once "../global.php";
include_once "../model/loaiphong.php";
include_once "../model/phong.php";
include_once "../model/tienich.php";
include_once "../model/dichvu.php";
include_once "../model/taikhoan.php";
// $checkName = "/^[0-99\p{L}\s]+$/u";
// $checkName = "/^([a-zA-Z ]+[0-9]*)+$/";
$checkName = "/^[a-zA-Z\sáàảãạắằẳẵặấầẩẫậéèẻẽẹếềểễệíìỉĩịóòỏõọốồổỗộớờởỡợúùủũụứừửữựýỳỷỹỵđÁÀẢÃẠẮẰẲẴẶẤẦẨẪẬÉÈẺẼẸẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌỐỒỔỖỘỚỜỞỠỢÚÙỦŨỤỨỪỬỮỰÝỲỶỸỴĐ ]+[0-9]*$/";
$AllLoaiPhong = select_Allloaiphong();


include "header.php";




if(isset($_GET['act']) && $_GET['act']){
    switch ($_GET['act']) {
        case 'search':
            if(isset($_POST['search']) && $_POST['search']){
                if(isset($_GET['a']) && $_GET['a']){
                    if($_GET['a'] == 'lists'){
                        $listS = select_Allphong($_POST['keyw'],0);
                        include "sach/list.php";
                        
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
        
        
        case 'addlp':
           if(isset($_POST['submit']) && $_POST['submit']){
            if(preg_match($checkName,$_POST['tenlp'])){
                $tenLp = $_POST['tenlp'];
                insert_loaiphong($tenLp);
                $thongbaoTC = " Đã Thêm Thành Công";             

                
            }
            else{
                $thongbao = "Tên loại phòng sai định dạng";             
            }
           }
           include "loaiphong/add.php";

            break;

        case 'listlp':
            $listDM = select_Allloaiphong();
            include "loaiphong/list.php";
            break;
        case 'deletelp':
           if(isset($_GET['id']) && $_GET['id']){
            $id = $_GET['id'];
            delete_loaiphong($id);
            $thongbao = "Đã Xóa Thành Công !";
           }
            
           $listDM = select_Allloaiphong();           
            include "loaiphong/list.php";
            break;

        case 'editlp':
            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
                $dm = select_Oneloaiphong($id);
                // print_r($dm);
                extract($dm); 
               if(isset($_POST['submit']) && $_POST['submit']){
                if(preg_match($checkName,$_POST['tenlp'])){
                    $tenLp = $_POST['tenlp'];
                    update_loaiphong1($id,$tenLp);                  
                    
                    $thongbaoTC = " Đã Sửa Thành Công";
                    header('refresh:2;url=index.php?act=editlp&id='.$id_loaiphong);
                    }
                else{
                        $thongbao = "Tên danh mục sai định dạng";
                    }
                }
             include "loaiphong/edit.php";

             }  

            break;

        case 'addphong':
            $error = [];
            if(isset($_POST['submit']) && $_POST['submit']){
                if(isset($_POST['sophong']) && $_POST['sophong']){
                    if(preg_match($checkName,$_POST['sophong'])){
                    $soPhong = $_POST['sophong'];                       
                    }
                    else{
                        $error['sophong'] = "Tên phòng không hợp lệ!";
                    }
                } else{
                    $error['sophong'] = "Không được bỏ trống !";
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
                    if(is_int((int)$_POST['soluongnguoi']) && (int)$_POST['soluongnguoi'] < 50){
                    $soLN = $_POST['soluongnguoi'];                       
                    }
                    else{
                        $error['soluongnguoi'] = "Số lượng người phẩm không hợp lệ!";
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

                if(isset($_POST['idlp']) && $_POST['idlp']){
                    $idLP = $_POST['idlp'];
                } else{
                    $error['loaiphong'] = "Không được bỏ trống !";

                }
                if(empty($error)){
                    // echo "haha";
                    // Cập nhật vào csdl
                    insert_phong($soPhong,$img,$idLP,$gia,$moTa,$soLN,$dienTich);
                    $thongbaoTC ="Đã thêm phòng thành công !";
                }
            }
            include_once "phong/add.php";
            break;

        case 'editphong':
            $error = [];

            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
            $phong = select_Onephong($id);
            extract($phong);
                if(isset($_POST['submit']) && $_POST['submit']){
                    if(isset($_POST['sophong']) && $_POST['sophong']){
                        if(preg_match($checkName,$_POST['sophong'])){
                        $soPhong = $_POST['sophong'];                       
                        }
                        else{
                            $error['sophong'] = "Tên phòng không hợp lệ!";
                        }
                    } else{
                        $error['sophong'] = "Không được bỏ trống !";
                    }
    
                    if(!empty($_FILES['img']['name'])){
                        $image = '../image/'.$_FILES['img']['name'];
                        
                        if(move_uploaded_file($_FILES['img']['tmp_name'],$image)){
                         $imgTC = "Upload ảnh thành công";
     
                        } else{
                         $error['img'] = "Upload anhr không thành công ";
     
                        }
                     }  else{
                         $image = $anh_phong;
                     } 
    
                    if(isset($_POST['gia']) && $_POST['gia']){
                        if(is_int((int)$_POST['gia'])){
                        $gia = $_POST['gia'];                       
                        }
                        else{
                            $error['gia'] = "Giá sản phẩm không hợp lệ!";
                        }
                    } else{
                        $error['gia'] = "Không được bỏ trống !";
                    }
    
                    if(isset($_POST['mota']) && $_POST['mota']){
                        $moTa = $_POST['mota'];                       
                        
                    } else{
                        $error['mota'] = "Không được bỏ trống !";
                    }
    
                    if(isset($_POST['soluong']) && $_POST['soluong']){
                        if(is_int((int)$_POST['soluong'])){
                        $soLN = $_POST['soluong'];                       
                        }
                        else{
                            $error['soluong'] = "Số Lượng sản phẩm không hợp lệ!";
                        }
                    } else{
                        $error['soluong'] = "Không được bỏ trống !";
                    }
    
                    if(isset($_POST['dientich']) && $_POST['dientich']){
                        if(is_int((int)$_POST['dientich'])){
                        $dienTich = $_POST['dientich'];                       
                        }
                        else{
                            $error['dientich'] = "Diện tích không hợp lệ!";
                        }
                    } else{
                        $error['dientich'] = "Không được bỏ trống !";
                    }
    
                    if(isset($_POST['idloaiphong']) && $_POST['idloaiphong']){
                        $idLP = $_POST['idloaiphong'];
                    } else{
                        $error['loaiphong'] = "Không được bỏ trống !";
    
                    }
                
                    if(empty($error)){

                        // Cập nhật vào csdl
                        update_phong($id,$soPhong,$image,$idLP,$gia,$moTa,$soLN,$dienTich);
                        $thongbaoTC ="Đã sửa sách thành công !";
                    }
    
    
    
    
                }
                }   
                include_once "phong/edit.php";
                break;

       
            case "listphong":
            $listPhong = select_Allphong('',0);
            // echo "<pre>";
            // print_r($listS);
            
            include_once "phong/list.php";
            break;

         case "deletephong":
                if(isset($_GET['id']) && $_GET['id']){
                  echo  $id = $_GET['id'];
                    $s = select_Onephong($id);
                    unlink($s['anh_phong']);
                    delete_phong($id);                
    
                    
                   echo $thongbao = "Đã Xóa Thành Công !";
                   }
                    
                   header('location:index.php?act=listphong');
                break;
        case 'addtienichphong':
            $listPhong = select_Allphong('',0);
            
            $listTienich = select_Alltienich();
            if(isset($_GET['idphong']) && $_GET['idphong']){
                $idP = $_GET['idphong'];
            }

            $listTI_P = select_tienich_phong(isset($_GET['idphong'])? $_GET['idphong'] : '');
            if(isset($_POST['submit']) && $_POST['submit']){
                if(!empty($_POST['idphong']) && $_POST['idphong']){
                        if(isset($_GET['idphong']) && $_GET['idphong']){
                            $idP = $_GET['idphong'];

                            if(isset($_POST['tienich']) && $_POST['tienich']){
                                // Lấy dữ liệu từ checkbox
                                $tienIch = $_POST['tienich'];
                                delete_tienich_phong($idP);
                                foreach ($tienIch as $ti) {
                                    insert_tienich_phong($idP,$ti);
                                    
                                    
                                }
                                // echo '<script> alert("Đã thêm thành công !"); </script>';
                                $thongbao="Thêm thành công!";

                            // header("Refresh: 2; url=index.php?act=addtienichphong&idphong=$idP");   
                            }
                           
                        }
                } else {
                    $error['idphong'] = "Không được bỏ trống!";
                }
                

                
            }
            
            include_once 'phong/addtienichphong.php';
            break;
        case 'adddichvuphong':
            $listPhong = select_Allphong('',0);
            $listDichVu = select_Alldichvu();
            if(isset($_GET['idphong']) && $_GET['idphong']){
                $idP = $_GET['idphong'];
                echo $idP;
            }
            if(isset($_POST['submit']) && $_POST['submit']){
                if(!empty($_POST['idphong']) && $_POST['idphong']){
                    $idPhong = $_POST['idphong'];

                    
                } else {
                    $error['idphong'] = "Không được bỏ trống!";
                }
                if(isset($_GET['idphong']) && $_GET['idphong']){
                    if(isset($_POST['dichvu']) && $_POST['dichvu']){
                        // Lấy dữ liệu từ checkbox
                        $dichvu = $_POST['dichvu'];                                   
                    } else {
                        $error['dichvu'] = "Không có lựa chọn nào được chọn.";
                    }
    
                    if(empty($error)){
                        foreach ($dichvu as $dv) {
                            insert_dichvu_phong($idPhong,$dv);
    
                        }
                        $thongbao="Thêm thành công!";
                        
                    }
                }
                
            }
            
            include_once 'phong/adddichvuphong.php';
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
        case "listdonhang":

            include_once "donhang/list.php";
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
