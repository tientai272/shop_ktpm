
<?php
cart_destroy();
if (isset($user_nav)) detroy_cart_user_db();
header('location:' . PATH_URL . 'cart');
