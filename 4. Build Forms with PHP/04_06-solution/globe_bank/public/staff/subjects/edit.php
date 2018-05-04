<?php
// Our form has double duty for both get and post req (since form processing is done on same page). By this, our code is collected on same page and we can handle errors better 

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/subjects/index.php'));
}

$id = $_GET['id']; // vers: $id = !empty($_GET['id']) ? $_GET['id'] : 1;
$menu_name = '';
$position = '';
$visible = '';

//*we can access $_GET['id'] even when edit.php is post requested (through form)*
echo "URL parameter: " . h($id) . "<br/>";

if(is_post_request()) {

  // Handle form values sent by new.php

  $menu_name = $_POST['menu_name'] ?? '';
  $position = $_POST['position'] ?? '';
  $visible = $_POST['visible'] ?? '';

  echo "Form parameters<br />";
  echo "Menu name: " . h($menu_name) . "<br />";
  echo "Position: " . h($position) . "<br />";
  echo "Visible: " . h($visible) . "<br />";
}

?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Subject</h1>

<!-- *we need id (attached to the url as query string) in order to edit the record in db. note that we can use get params and post params together* -->
    <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1"<?php if($position == "1") { echo " selected"; } ?>>1</option>
            <option value="2"<?php if($position == "2") { echo " selected"; } ?>>2</option>          
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1"<?php if($visible == "1") { echo " checked"; } ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
