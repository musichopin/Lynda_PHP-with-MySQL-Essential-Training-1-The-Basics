<?php
  if(!isset($page_title)) { $page_title = 'Staff Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>GBI - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>GBI Staff Area</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/staff/index.php'); ?>">Menu</a></li>
<!--alt1: absolute path: a href="/Exercise Files/Chapter_02/02_07-solution/globe_bank/public/staff/index.php"-->
<!--alt2: without url_for(): a href="<?php echo WWW_ROOT . '/staff/index.php';?>"-->
<!--not alt: a href="<?php echo 'index.php'; ?>" or <a href="index.php"> makes the path relative and as staff_header.php is used by multiple files it wudnt work as we want -->
      </ul>
    </navigation>
