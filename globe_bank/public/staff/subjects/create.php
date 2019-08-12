<?php // cannot have ANY whitespace or returns ... they count as HTML characters which should not come before the HTML header
require_once('../../../private/initialize.php');

if(is_post_request()) {
  //php-v5: $test = isset($_GET['test']) ? $_GET['test'] : '';
  //php-v7: $test = $_GET['test']) ?? ]];

  // Handle form values sent by new.php
  $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
  $position = isset($_POST['position']) ? $_POST['position'] : '';
  $visible = isset($_POST['visible']) ? $_POST['visible'] : '';

  $result = insert_subject($menu_name, $position, $visible);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));

} else {
  redirect_to(url_for('/staff/subjects/new.php'));
}

?>