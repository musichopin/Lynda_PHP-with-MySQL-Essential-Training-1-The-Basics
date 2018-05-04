<?php /*validation happens before editing, adding or even deleting record*/

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/subjects/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $subject = [];
  $subject['id'] = $id;
  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '';
  $subject['visible'] = $_POST['visible'] ?? '';

  $result = update_subject($subject);
  if($result === true) {
    redirect_to(url_for('/staff/subjects/show.php?id=' . $id));
  } else { // there is error during form submission
    $errors = $result;
    //var_dump($errors); or print_r($errors);
  }

} else { // initial get request

  $subject = find_subject_by_id($id);

}

// got taken out of else sta so we can reuse it if der is error during form submission
$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set);
mysqli_free_result($subject_set);

?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Subject</h1>

    <?php echo display_errors($errors); ?> <!--$errors is defined in initialize.php-->

    <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($subject['menu_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
          <?php
            for($i=1; $i <= $subject_count; $i++) {
              echo "<option value=\"{$i}\"";
              if($subject["position"] == $i) {
                echo " selected";
              }
              echo ">{$i}</option>";
            }
          ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1"<?php if($subject['visible'] == "1") { echo " checked"; } ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
