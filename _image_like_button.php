<?php require_once "model/imageLikeFactory.php"; ?>

<?php

    $test = new ImageLikeFactory;
?>

<?php
    if($test->isImageLiked($_GET["identity"], $_SESSION['current_profile']->getIdentity())):
?>
    <?php // require '_unlike_image.php'; ?>
    <a href="_unlike_image.php?identity=<?php echo $_GET["identity"];?>" ><?php echo $test->imageLikes($_GET["identity"]); ?> Unlike Image </a>
<?php else: ?>
    <?php // require '_like_image.php'; ?>
    <a href="_like_image_.php?identity=<?php echo $_GET["identity"]; ?>" ><?php echo $test->imageLikes($_GET["identity"]); ?> Like Image </a>
<?php endif; ?>