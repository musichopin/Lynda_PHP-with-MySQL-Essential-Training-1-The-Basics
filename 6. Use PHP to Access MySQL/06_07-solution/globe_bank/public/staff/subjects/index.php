<?php // 1. Create a database connection (cud be on a different file)
require_once('../../../private/initialize.php'); ?>

<?php
// 2. Perform database query: $subject_set is the object having info on table:
  $subject_set = find_all_subjects();  // print_r($subject_set);
?>

<?php $page_title = 'Subjects'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="subjects listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/subjects/new.php'); ?>">Create New Subject</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>
<!-- 3. Use queried/returned data (if any): subject is record/row. mysqli_fetch_assoc() both gets the row and advances the pointer inside $subject_set at the same time. while loop continues until we grab a new row (as associative array): -->
      <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?> <!-- alt1 -->
        <tr>
          <td><?php echo h($subject['id']); ?></td>
          <td><?php echo h($subject['position']); ?></td>
          <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
          <td><?php echo h($subject['menu_name']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
        </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($subject_set); // 4.Release returned data (4 memory & perf.)
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); //5.Close database connection ?> 
<!-- alt1: basic version using for loop:
      <?php for ($i=0; $i < mysqli_num_rows($subject_set); $i++) {
        $subject = mysqli_fetch_assoc($subject_set) ?>
        <tr>
          <td><?php echo h($subject['id']); ?></td>
          <td><?php echo h($subject['position']); ?></td>
          <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
          <td><?php echo h($subject['menu_name']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
        </tr>
      <?php } ?>
-->