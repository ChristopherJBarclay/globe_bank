<?php require_once('../../../private/initialize.php'); ?>

<?php
  // PHP 7+: $id = &_GET['id'] ?? '1';
  $id = isset($_GET['id']) ? $_GET['id'] : '1';
  
  echo h($id);
?>

<?php $page_title = 'Show Subject' ?>
<?php require(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="subjects listing">

	<a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

	<div class="subject show">
		Subject ID: <?php h($id); ?>
  </div>

  </div>
</div>

<?php require(SHARED_PATH . '/staff_footer.php'); ?>