<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {
// alt1: if(isset($_POST['menu_name'])) {}
// alt2: if(isset($_POST['submit'])) {} // name attr 4 submit button shud be added

  // Handle form values sent by new.php
// aşağıdaki ternarylerde else kısmı hiçbir zaman yürütülmez (checkbox özel)
  $menu_name = $_POST['menu_name'] ?? '';
  $position = $_POST['position'] ?? '';
  $visible = $_POST['visible'] ?? '';

  echo "Form parameters<br />";
  echo "Menu name: " . h($menu_name) . "<br />";
  echo "Position: " . h($position) . "<br />";
  echo "Visible: " . h($visible) . "<br />";
} else {
  redirect_to(url_for('/staff/subjects/new.php'));
}

?>
