<a href="?act=datphong">Đặt Phòng</a>
<!DOCTYPE html>
<html>
<head>
  <title>Đăng nhập bằng Google</title>
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <meta name="google-signin-client_id" content="YOUR_CLIENT_ID">
</head>
<body>
  <h1>Đăng nhập bằng Google</h1>
  <input type="datetime-local" name="checkout"><br>

  <div id="g_id_onload"
       data-client_id="425778456337-qpt2f27nd6bovt9glnop5kd6me8bmmrq.apps.googleusercontent.com"
       data-callback="handleCredentialResponse">
  </div>
  <script>
    function handleCredentialResponse(response) {
      // Xử lý phản hồi từ Google Sign-In
      var credential = response.credential;
      // Gửi credential đến máy chủ để xác thực người dùng
      // ...
    }
  </script>
  <div class="g_id_signin"></div>


   <h1>Đăng nhập bằng Facebook</h1>
  <div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true"></div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>Đăng nhập bằng Facebook</title>
  <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=YOUR_APP_ID&autoLogAppEvents=1" crossorigin="anonymous" defer></script>
</head>
<body>
 
</body>
</html>