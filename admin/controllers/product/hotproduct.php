
<?php
permission_user();
//load model
require_once('admin/models/products.php');
if (isset($_POST['product_id'])) {
    foreach ($_POST['product_id'] as $product_id) {
        $product_id = intval($product_id);
        products_delete($product_id);
    }
}
$title = 'Sản phẩm mới order';
$nav_product  = 'class="active open"';
require('admin/views/product/hotproduct.php');