
<?php
permission_user();
require_once('admin/models/feedbacks.php');
if (isset($_GET['feedback_id'])) {
    $feedback_id = intval($_GET['feedback_id']);
    feedback_unApproved($feedback_id);
    header('location:admin.php?controller=feedback&action=pending');
}
