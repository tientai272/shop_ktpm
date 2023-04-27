
<?php
permission_user();
require_once('admin/models/posts.php');
$nav_page  = 'class="active open"';
$title = 'Các bản nháp';
if (isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;

$page = ($page > 0) ? $page : 1;
$limit = 20;
$offset = ($page - 1) * $limit;

$options = array(
    'where' => 'post_type =2 and post_status="Draft"',
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id DESC'
);
$pages  = get_all('posts', $options);

$url = 'admin.php?controller=page&action=viewdraft';
$total_rows = get_total('posts', $options);
$total = ceil($total_rows / $limit);

$pagination = pagination_admin($url, $page, $total);
require('admin/views/page/viewdraft.php');
