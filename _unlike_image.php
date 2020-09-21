<?php require 'main.php'; ?>
<?php require 'model/imageLikeFactory.php'; ?>

<?php 
$test = new ImageLikeFactory;
$test->removeLike($_GET['identity'], $_SESSION['current_profile']->getIdentity());
?>

<script>
window.history.back();
</script>