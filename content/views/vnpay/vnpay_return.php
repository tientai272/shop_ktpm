
<?php
require('./admin/views/shared/header.php');

    if(isset($_GET['vnp_Amount'])){
        $vnp_TmnCode = $_GET['vnp_TmnCode'];
        $vnp_Amount = $_GET['vnp_Amount'] / 100;
        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
        $vnp_BankCode   = $_GET['vnp_BankCode'];
        $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
        $vnp_PayDate = $_GET['vnp_PayDate'];
        $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
        $vnp_CardType = $_GET['vnp_CardType'];
        $code_order = $_SESSION['code_order'];


        $query = "INSERT INTO vnpay(vnp_TmnCode, vnp_Amount, vnp_OrderInfo,vnp_BankTranNo,vnp_BankCode,vnp_PayDate,vnp_TransactionNo,vnp_CardType,code_order)
                    VALUES ('$vnp_TmnCode','$vnp_Amount','$vnp_OrderInfo','$vnp_BankTranNo', '$vnp_BankCode','$vnp_PayDate','$vnp_TransactionNo','$vnp_CardType','$code_order')";
        $cart_query = mysqli_query($linkconnectDB, $query);
        if($cart_query){
            cart_destroy();
            global $user_nav;
	        if (isset($user_nav)) detroy_cart_user_db(); //xóa đồng bộ cart trên db sau khi đặt hàng
	        $title = 'Đặt hàng thành công - Quán Chị Kòi';
	        header("refresh:15;url=" . PATH_URL . "home");
	        echo '<div style="text-align: center;padding: 20px 10px;">Đã đặt hàng thành công</div><div style="text-align: center;padding: 20px 10px;">Cảm ơn bạn đã đặt hàng của Quán Chị Kòi. Quán sẽ gọi điện từ số điện thoại bạn đã cung cấp để Confirm (Xác nhận) lại với bạn trong thời gian sớm nhất để xác nhận đơn hàng.<br>
                    Trình duyệt sẽ tự động chuyển về trang chủ sau 15s, hoặc bạn có thể click <a href="' . PATH_URL . 'home">vào đây</a>.</div>';
            } else {
	            header('location:.');
            }

        }else{
            echo "that bai";


        

    }
    ?>
<!-- vnp_Amount=18000000
&vnp_BankCode=NCB
&vnp_BankTranNo=VNP13992714
&vnp_CardType=ATM
&vnp_OrderInfo=thanh+to%C3%A1n+%C4%91%C6%A1n+h%C3%A0ng+vnpay
&vnp_PayDate=20230418011224&vnp_ResponseCode=00
&vnp_TmnCode=1SWZ5ZID&vnp_TransactionNo=13992714
&vnp_TransactionStatus=00&vnp_TxnRef=1681755109 -->

