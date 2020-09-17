<?php require 'main.php'; ?>

<?php if( is_logged_in() ): ?>

<form action="./upload_form.php" method="post" enctype="multipart/form-data"> 
    <input type="file" name="fileImage">
    <input type="text" name="fileTitle">
    <input type="text" name="description"> 

    <input type="submit" name="submit">
</form>

<?php endif; ?>