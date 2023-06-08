<?php
// code thanh toan VNPAY
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$url = "?controller=vnpay&action=vnpay_return";
$vnp_TmnCode = "1SWZ5ZID"; //Website ID in VNPAY System
$vnp_HashSecret = "BWZLTKRHHDQGQODFBPIXBWKZVZBJIYFX"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/new_mvc_shop/index.php$url";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
// end config

// 

$code_order = rand(0,9999);

$vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = $_POST['message'];
$vnp_OrderType = 'order';
$vnp_Amount = $_POST['cart_total'] * 100;
$vnp_Locale = 'vn';
$vnp_BankCode ='NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];


$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,

);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}

    //var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['vnpay'])) {
        $_SESSION['code_order'] = $code_order;
        $order = array(
            'id' => 0,
            'customer' => escape($_POST['name']),
            'province' => escape($_POST['province']),
            'address' => escape($_POST['address']),
            'phone' => escape($_POST['phone']),
            'cart_total' => $_POST['cart_total'],
            'createtime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
            'message' => escape($_POST['message']),
            'user_id' => intval($_POST['user_id']),
            'code_order' => escape($code_order),
            'type' => escape($_POST['type'])
        );
        $order_id = save('orders', $order);
    
        $cart = cart_list();
        //lấy sản phẩm trong session cart
        foreach ($cart as $product) {
            $order_detail = array(
                'id' => 0,
                'order_id' => $order_id,
                'product_id' => $product['id'],
                'quantity' => $product['number'],
                'price' => $product['price'],
                'code_order' => escape($code_order),
                'type' => escape($_POST['type'])
            );
            save('order_detail', $order_detail);
        }


        header('Location: ' . $vnp_Url);
        die();

    } else {

        echo json_encode($returnData);

    }




?>