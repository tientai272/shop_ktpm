
<?php
permission_user();
permission_moderator();
require_once('admin/models/users.php');
$role_id = intval($_GET['user_id']);
user_delete($role_id);
header('location:admin.php?controller=role&action=admin');
