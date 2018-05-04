<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<!-- alt1: absolute path: include('C:\wamp64\www\Exercise Files\Chapter_02\02_07-solution\globe_bank\private/shared/staff_header.php');  -->
<!-- alt2: absolute path: include('\wamp64\www\Exercise Files\Chapter_02\02_07-solution\globe_bank\private/shared/staff_header.php'); -->
<!-- alt3: relative path: include('../../private/shared/staff_header.php'); -->

<!-- *index.php sees staff_header.php sees initialize.php sees functions.php* -->

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/staff/subjects/index.php'); ?>">Subjects</a></li> <!-- alt: a href="subjects/index.php" -->
      <li><a href="<?php echo url_for('/staff/pages/index.php'); ?>">Pages</a></li>
    </ul>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
