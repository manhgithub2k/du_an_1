<?php
function addVnpayTransaction($data, $uniqueId)
{
    $vnp_Amount = $data['vnp_Amount'];
    $vnp_BankCode = $data['vnp_BankCode'];
    $vnp_BankTranNo = $data['vnp_BankTranNo'];
    $vnp_CardType = $data['vnp_CardType'];
    $vnp_OrderInfo = $data['vnp_OrderInfo'];

    $vnp_PayDate = $data['vnp_PayDate'];
    $vnp_ResponseCode = $data['vnp_ResponseCode'];
    $vnp_TmnCode = $data['vnp_TmnCode'];
    $vnp_TransactionNo = $data['vnp_TransactionNo'];
    $vnp_TransactionStatus = $data['vnp_TransactionStatus'];
    $vnp_TxnRef = $data['vnp_TxnRef'];
    $vnp_SecureHash = $data['vnp_SecureHash'];



    $sql = "INSERT INTO vnpay (uniqueId,vnp_Amount, vnp_BankCode, vnp_BankTranNo, vnp_CardType, vnp_OrderInfo, vnp_PayDate, vnp_ResponseCode, vnp_TmnCode, vnp_TransactionNo, vnp_TransactionStatus, vnp_TxnRef, vnp_SecureHash) values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $uniqueId, $vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash);

}
?>