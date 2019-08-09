<?php // cannot have ANY whitespace or returns ... they count as HTML characters which should not come before the HTML header
require_once('../../../private/initialize.php');

// I revised this page to NOT use create.php, and be single-page form submission

$menu_name = '';
$position = '';
$visible = '';

// Handle form values sent by new.php

if(is_post_request()) {
  //php-v5: $test = isset($_GET['test']) ? $_GET['test'] : '';
  //php-v7: $test = $_GET['test']) ?? ]];
  $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
  $position = isset($_POST['position']) ? $_POST['position'] : '';
  $visible = isset($_POST['visible']) ? $_POST['visible'] : '';

  echo "Form parameters<br />";
  echo "Menu name: " . $menu_name . "<br />";
  echo "Position: " . $position . "<br />";
  echo "Visible: " . $visible . "<br />";
} 

?>

<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
      <h1>Create Subject</h1>

      <form action="<?php echo url_for('/staff/subjects/new.php'); ?>" method="post">
          <dl>
            <dt>Menu Name</dt>
            <dd><input type="text" name="menu_name" value="<?php echo $menu_name; ?>" /></dd>
          </dl>
          <dl>
            <dt>Position</dt>
            <dd>
              <select name="position">
                <option value="1"<?php if($position =="1") { echo " selected"; } ?>>1</option>
              </select>
            </dd>
          </dl>
          <dl>
            <dt>Visible</dt>
            <dd>
              <input type="hidden" name="visible" value="0" />
              <input type="checkbox" name="visible" value="1"<?php if($visible =="1") { echo " checked"; } ?> />
            </dd>
          </dl>
          <div id="operations">
            <input type="submit" value="Create Subject" />
          </div>
      </form>

  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>