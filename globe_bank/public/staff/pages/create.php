<?php // cannot have ANY whitespace or returns ... they count as HTML characters which should not come before the HTML header
require_once('../../../private/initialize.php');

if(is_post_request()) {
  //php-v5: $test = isset($_GET['test']) ? $_GET['test'] : '';
  //php-v7: $test = $_GET['test']) ?? ]];

  // Handle form values sent by new.php
  $page =[];
  $page['subject_id'] = isset($_POST['subject_id']) ? $_POST['subject_id'] : '';
  $page['menu_name'] = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
  $page['position'] = isset($_POST['position']) ? $_POST['position'] : '';
  $page['visible'] = isset($_POST['visible']) ? $_POST['visible'] : '';
  $page['content'] = isset($_POST['content']) ? $_POST['content'] : '';

  $result = insert_page($page);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));

} else {
  $page =[];
  $page['subject_id'] = '';
  $page['menu_name'] = '';
  $page['position'] = '';
  $page['visible'] = '';
  $page['content'] = '';

  $page_set = find_all_pages();
  $page_count = mysqli_num_rows($page_set) +1;
  mysqli_free_result($page_set);
  
  redirect_to(url_for('/staff/pages/new.php'));
}

?>