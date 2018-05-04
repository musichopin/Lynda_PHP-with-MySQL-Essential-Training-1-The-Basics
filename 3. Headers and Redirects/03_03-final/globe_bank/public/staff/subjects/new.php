<?php

require_once('../../../private/initialize.php');

$test = $_GET['test'] ?? '';

// with header() we modify what the webserver says to browser about the requested webpage. with redirect server tells the browser to go to a new webpage/url instead
if($test == '404') {
  error_404();
} elseif($test == '500') {
  error_500();
} elseif($test == 'redirect') {
  redirect_to(url_for('/staff/subjects/index.php'));
} else {
  echo 'No error';
}
?>
