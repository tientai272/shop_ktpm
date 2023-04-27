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
                    <h2>Project list</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php"><i class="zmdi zmdi-home"></i> KTPM</a></li>
                        <li class="breadcrumb-item">Blog</li>
                        <li class="breadcrumb-item active">Pages</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="admin.php?controller=page&action=add" class="btn btn-success btn-icon float-right" type="button"><i class="zmdi zmdi-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="table-responsive">
                            <table class="table table-hover c_table theme-color">
                                <thead>
                                    <tr>
                                        <th style="width:50px;">Title</th>
                                        <th class="hidden-md-down">Date</th>
                                        <th>Slug</th>
                                        <th>Post Author</th>
                                        <th class="hidden-md-down" width="150px">View</th>
                                        <th style="width:50px;">Comment</th>
                                        <th class="hidden-md-down">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($pages)) {
                                        echo '<h3><strong>Hiện không có trang nào trong hệ thống.</strong></h3>';
                                    }
                                    foreach ($pages as $page) : ?>
                                        <tr>
                                            <td>
                                                <strong><a style="color: #000;" href="admin.php?controller=page&action=edit&post_id=<?= $page['id'] ?>"><?= $page['post_title'] ?></a></strong>
                                            </td>
                                            <td>
                                                <strong><?= $page['post_date'] ?></strong><br>
                                                <small><?= $page['post_status'] ?></small>
                                            </td>
                                            <td><?= $page['post_slug'] ?></td>
                                            <td class="hidden-md-down">
                                                <?php $user = get_a_record('users', $page['post_author']); ?>
                                                <ul class="list-unstyled team-info margin-0">
                                                    <li><?= $user['user_name'] ?> </li>
                                                    <li><img src="public/upload/images/<?= $user['user_avatar'] ?>" alt="Avatar"></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <strong><?= $page['totalView'] ?></strong>
                                            </td>
                                            <td><span class="badge badge-info"></span></td>
                                            <td>
                                                <a title="Move Trash" class="btn btn-danger btn-round" href="admin.php?controller=page&action=trash&post_id=<?= $page['id'] ?>"> <i class="zmdi zmdi-delete"></i> Move Trash</a>
                                                <a title="Edit" class="btn btn-warning btn-icon btn-icon-mini btn-round" href="admin.php?controller=page&action=edit&post_id=<?= $page['id'] ?>"> <i class="zmdi zmdi-edit"></i> </a>
                                                <?php if ($page['post_status'] <> 'Draft') : ?>
                                                    <a title="View" class="btn btn-success btn-icon btn-icon-mini btn-round" target="_blank" href="page/<?= $page['id'] . '-' . $page['post_slug'] ?>"> <i class="zmdi zmdi-eye"></i> </a>
                                                <?php else : ?>
                                                    <a title="Public" class="btn btn-success btn-round" href="admin.php?controller=page&action=public&post_id=<?= $page['id'] ?>"> <i class="zmdi zmdi-sun"></i> Công khai</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>