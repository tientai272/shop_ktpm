
<?php
permission_user();
permission_moderator();
require_once('admin/models/slides.php');
$slide_id = intval($_GET['slide_id']);
slide_delete($slide_id);
header('location:admin.php?controller=slide');