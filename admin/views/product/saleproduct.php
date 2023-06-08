<?php require('admin/views/shared/header.php'); ?>
<?php require('admin/views/shared/loader.php'); ?>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<?php require('admin/views/shared/formsearch.php'); ?>
<?php require('admin/views/shared/rightnavbar.php'); ?>
<?php require('admin/views/shared/leftnavbar.php'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Sản phẩm khuyến mãi</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=PATH_URL.'home'?>"><i class="zmdi zmdi-home"></i> KTPM</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=product">Product</a></li>
                        <li class="breadcrumb-item active">Sale Product</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <?php require('admin/views/product/tableofSaleproduct.php'); ?>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>