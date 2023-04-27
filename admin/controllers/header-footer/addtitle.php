<?php
permission_user();
permission_moderator();
require_once('admin/models/header-footer.php');

if (!empty($_POST)) {
    menu_footer_add_title();
}

$title = 'Thêm mới menu link footer website';
$nav_hf = 'class="active open"';

if (!empty($_POST['name']) && !empty($_POST['menu_url']) && !empty($_POST['menu_description'])) {
    $menufooter = array(
        'menu_name' => escape($_POST['name']),
        'menu_url' => escape($_POST['menu_url']),
        'menu_description' => escape($_POST['menu_description']),
        'parent' => isset($_POST['parent']) && $_POST['parent'] == 1 ? 1 : 0
    );
    save('menu_footers', $menufooter);
    header('location:admin.php?controller=header-footer&action=listMenuFooter');
}

require('admin/views/header-footer/addtitle.php');
?>
