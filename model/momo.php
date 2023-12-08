<?php
function addMomoTransaction($data, $uniqueId)
{
    $partnerCode = $data['partnerCode'];
    $orderId = $data['orderId'];
    $requestId = $data['requestId'];
    $amount = $data['amount'];
    $orderInfo = $data['orderInfo'];
    $orderType = $data['orderType'];
    $transId = $data['transId'];
    $resultCode = $data['resultCode'];
    $message = $data['message'];
    $payType = $data['payType'];
    $responseTime = $data['responseTime'];
    $extraData = $data['extraData'];
    $signature = $data['signature'];
    $paymentOption = "momo";

    $sql = "INSERT INTO momo (uniqueId,partnerCode, orderId, requestId, amount, orderInfo, orderType, transId, resultCode, message, payType, responseTime, extraData, signature, paymentOption) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    pdo_execute($sql, $uniqueId, $partnerCode, $orderId, $requestId, $amount, $orderInfo, $orderType, $transId, $resultCode, $message, $payType, $responseTime, $extraData, $signature, $paymentOption);

}

?>