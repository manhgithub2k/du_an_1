<?php
function sendMail($userEmail, $verificationCode, $uniqueId, $imgUrl) {
    require "../src/PHPMailer.php";
    require "../src/SMTP.php";
    require '../src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $message = "Xin chào,\n\nBạn nhận được email này vì đã yêu cầu nhan hoa don qua mail.\n";


        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bkak60@gmail.com';
        $mail->Password = 'izakonohsmgaagvj';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('bkak60@gmail.com', 'PolyHotel');
        $mail->addAddress($userEmail, 'người nhận');
        $mail->isHTML(true);
        $mail->Subject = 'Xac nhan email';
        $content = $message;
        $mail->Body = $content;
        $mail->addAttachment($imgUrl);
        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );
        $mail->send();
        return true;
    } catch (Exception $e) {

        return false;
    }

}
function contactMail($data) {
    require "../src/PHPMailer.php";
    require "../src/SMTP.php";
    require '../src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {

        $email = $data['email'];
        $name = $data['name'];
        $content = $data['content'];


        $message = "Thư contact của khách hàng.\n";
        $message .= "\nTên khách hàng : ".$name."</br>";
        $message .= "\nemail khách hàng : ".$email."</br>";
        $message .= "\nNội dung tin nhắn : ".$content."</br>";




        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bkak60@gmail.com';
        $mail->Password = 'izakonohsmgaagvj';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('bkak60@gmail.com', 'PolyHotel');
        $mail->addAddress("bkak60@gmail.com", 'người nhận');
        $mail->isHTML(true);
        $mail->Subject = 'Thư ý kiến';
        $content = $message;
        $mail->Body = $content;
        // $mail->addAttachment($imgUrl);
        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );
        $mail->send();
        return true;
    } catch (Exception $e) {

        return false;
    }
}