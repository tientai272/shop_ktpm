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
                    <h2>Menu Footer</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> KTPM</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=header-footer">Header-Footer</a></li>
                        <li class="breadcrumb-item active">Thêm  menu title</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <h2 style="font-weight: bold;">Thêm thông tin title</h2>
                <div class="col-lg-12">
                    <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=header-footer&amp;action=editMenuFooter" enctype="multipart/form-data" role="form">
                        <input name="menufooter_id" type="hidden" value="<?php echo $menufooter ? $menufooter['id'] : '0'; ?>" />
                        <h4 class="card-inside-title" style="font-weight:bold;">Tên mô tả cho title </h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="name" type="text" maxlength="150" value="" class="form-control" id="name" placeholder="" required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Thêm liên kết:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="menu_url" maxlength="255" type="text" value="" class="form-control" id="name" placeholder=""/>
                                </div>
                            </div>
                        </div>
                       
                        <h4 class="card-inside-title" style="font-weight:bold;">Thêm mô tả:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="menu_description" maxlength="255" type="text" value="" class="form-control" id="name" placeholder="Trang web buôn bán vâng vâng..."/>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Cột Parent (1 là title, 0 là link footer):</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="parent" maxlength="255" type="text" value="" class="form-control" id="name" placeholder=""/>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group" style="text-align: center;">
                            <button class="btn btn-primary waves-effect" type="submit">Lưu thông tin</button>
                            <a class="btn btn-warning waves-effect" href="admin.php?controller=header-footer&amp;action=listMenuFooter">Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>