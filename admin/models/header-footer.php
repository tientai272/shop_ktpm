
<?php
function header_footer_update()
{
    $contacts = array(
        'id' => intval($_POST['contact_id']),
        'contact_name' => escape($_POST['name']),
        'address' => escape($_POST['address']),
        'country' => escape($_POST['country']),
        'phone' => escape($_POST['phone']),
        'phone_2' => escape($_POST['phone_2']),
        'email' => escape($_POST['email']),
        'link_Contact' => escape($_POST['link_Contact']),
        'link_Facebook' => escape($_POST['link_Facebook']),
        'link_Twitter' => escape($_POST['link_Twitter']),
        'link_linkedin' => escape($_POST['link_linkedin']),
        'zalo' => escape($_POST['zalo']),
        'link_about' => escape($_POST['link_about']),
        'about_footer' => escape($_POST['about_footer']),
    );
    $contact_id = save('contacts', $contacts);
    $image_name1 =slug($_POST['name']);
    $config = array(
        'name' => $image_name1,
        'upload_path' => 'public/img/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image1 = upload('logo', $config); //$field = name of input 
    if ($image1) {
        $contacts = array(
            'id' => $contact_id,
            'link_Logo' => $image1
        );
        save('contacts', $contacts);
    }
    $image_name2 = slug($_POST['name']);
    $config2 = array(
        'name' => $image_name2,
        'upload_path' => 'public/img/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image2 = upload('favicon', $config2); //$field = name of input 
    if ($image2) {
        $contacts = array(
            'id' => $contact_id,
            'favicon' => $image2
        );
        save('contacts', $contacts);
    }
    header('location:admin.php?controller=header-footer');
}
function menu_footer_update()
{
    $menufooter = array(
        'id' => intval($_POST['menufooter_id']),
        'menu_name' => escape($_POST['name']),
        'menu_url' => escape($_POST['menu_url']),
        'menu_description' => escape($_POST['menu_description'])
    );
    save('menu_footers', $menufooter);
    header('location:admin.php?controller=header-footer&action=listMenuFooter');
}


function menu_footer_add()
{
    $menufooter = array(
        'menu_name' => escape($_POST['name']),
        'menu_url' => escape($_POST['menu_url']),
        'menu_description' => escape($_POST['menu_description'])
    );
    save('menu_footers', $menufooter);
    header('location:admin.php?controller=header-footer&action=listMenuFooter');
}

function menu_footer_add_title()
{
    $parent = isset($_POST['parent']) ? intval($_POST['parent']) : null;
    
    if ($parent !== null && $parent !== 0 && $parent !== 1) {
        // Xử lý lỗi khi giá trị nhập vào không phải là 0 hoặc 1
    }

    $menufooter = array(
        'menu_name' => escape($_POST['name']),
        'menu_url' => escape($_POST['menu_url']),
        'menu_description' => escape($_POST['menu_description'])
    );
    
    if ($parent !== null) {
        $menufooter['parent'] = $parent;
    }
    
    save('menu_footers', $menufooter);
    header('location:admin.php?controller=header-footer&action=listMenuFooter');
}
function menu_footer_delete($id)
{
    if (isset($_GET['menufooter_id'])) {
        $id = intval($_GET['menufooter_id']);
    } else {
        show_404();
    }

    global $linkconnectDB;
    $sql = "DELETE FROM menu_footers WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}





