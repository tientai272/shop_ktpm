<?php
permission_user();
permission_moderator();
require_once('admin/models/header-footer.php');

if (isset($_GET['menufooter_id'])) {
    $id = intval($_GET['menufooter_id']);
    menu_footer_delete($id);
    header('location:admin.php?controller=header-footer&action=listMenuFooter');
} else {
    show_404();
}
?>
