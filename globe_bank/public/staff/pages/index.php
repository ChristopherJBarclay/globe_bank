<?php 
require_once('../../../private/initialize.php');
// this page no longer has content, as we have nested the pages content beneath the subject content

require_login(); 

redirect_to(url_for('/staff/index.php'));

?>