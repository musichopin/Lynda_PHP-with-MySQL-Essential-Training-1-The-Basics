<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = (isset($_GET['id']) && $_GET['id'] !== "") ? $_GET['id'] : 1; // *1 if param value is undefined/null or is empty string (condition sırası ve && olması önemli)*
// alt: $id = $_GET['id'] ?? '1'; // PHP > 7.0
// gettype($_GET['id']); is string whereas gettype((int) $_GET['id']); is int
?>

<?php $page_title = 'Show Subject ' . $id; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">

    Subject ID: <?php echo h($id); ?>
<!-- encoding html with htmlspecialchars() prevents users from putting malicious scripts or putting html tags in the url by converting powerful html/js chars like <, >, &, " into special chars (text) like &lt; &gt; &amp;-->
  </div>

</div>

<!-- ex: we use urlencode() for making special chars on URL:
<a href="show.php?name=<?php echo u('John Doe'); ?>">Link</a><br /> // we encode
<?php if (isset($_GET["name"])) {echo h($_GET["name"]) . "<br/>";} ?> // php decodes itself (h() is used for htmlspecialchars())
<a href="show.php?company=<?php echo u('Widgets&More'); ?>">Link</a><br />
<a href="show.php?query=<?php echo u('!#*?'); ?>">Link</a><br />
 -->