<?php
session_start();
include_once "../../model/pdo.php";
include_once "../../global.php";
include_once "../../model/taikhoan.php";
$checkPass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&]).{8,}$/";

?>
<?php 
$error = [];
if(isset($_POST['submit']) && $_POST['submit']){
    
    if($_POST['password1']==''){
        $error['password1'] = 'Không được bỏ trống !';
    } else {
        if(!preg_match($checkPass,$_POST['password1'])){
            $error['password1'] = 'Mật Khẩu có ít nhất 8 ký tự,có chữ hoa,có ký tự đặc biệt... !';
        } else {
            $pass1 = $_POST['password1'];
        }
    }
    if($_POST['password2']==''){
        $error['password2'] = 'Không được bỏ trống !';
    } else {
        if($_POST['password2'] === $pass1){
            $pass2 = $_POST['password2'];

        } else {
            $error['password2'] = 'Nhập lại không giống !';

        }
    }


    if(empty($error)){
        echo '<script>alert("Bạn mới đăng nhập lần đầu ! Hãy đổi mật khẩu !");</script>';

        update_pass($_SESSION['admin']['id_khachhang'],$pass2);
    
    header("Location: http://localhost/A/DU_AN_1_NHOM_4/admin/dangnhap/dangnhap.php");
    }
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container{
            padding-top: 90px;
        }
        .login-form {
        width: 400px;
        margin: 0 auto;
        padding: 50px;
        background: #f7f7f7;
        border: 1px solid #ccc;
        border-radius: 5px;
        }

        .login-form h2 {
        text-align: center;
        margin-bottom: 20px;
        }

        .form-group {
        margin-bottom: 20px;
        }

        .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        }

        .form-group input {
        width: 100%;
        padding: 8px;
        border-radius: 3px;
        border: 1px solid #ccc;
        }

        input[type="submit"] {
        width: 100%;
        padding: 8px;
        background: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        }

        /* .signup-link {
        text-align: center;
        } */
    </style>
    <title>ADMIN</title>
</head>
<body>
    <div class="container">
        <form class="login-form" action="" method="post">
            <h2>Đổi Mật Khẩu</h2>

            

            <div class="form-group">
                <label for="password1">Mật khẩu</label>
                <input type="password1" id="password1" name="password1" placeholder="Nhập mật khẩu" value="<?= isset($pass1) ? $pass1 : '' ?>"  >
                <span id="emailerror" style="color: red;"><?php echo isset($error['password1']) ? $error['password1'] : '' ?> </span>
            </div>

            <div class="form-group">
                <label for="password2">Nhập Lại Mật khẩu</label>
                <input type="password2" id="password2" name="password2" placeholder="Nhập mật khẩu"   >
                <span id="emailerror" style="color: red;"><?php echo isset($error['password2']) ? $error['password2'] : '' ?> </span>
            </div>

            <!-- <input type="submit" > -->
            <input type="submit" class="btn btn-primary" value="Submit" name="submit">

        </form>

    </div>


</body>
</html>



