<?php require 'main.php'; ?>

<?php if( is_logged_in() ): ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <?php require "header.php"; ?>

    <main> 
        <form action="./upload_form.php" method="post" enctype="multipart/form-data"> 
            <input type="file" name="fileImage">
            <input type="text" name="fileTitle">
            <input type="text" name="description"> 

            <input type="submit" name="submit">
        </form>
    </main>

        <?php require "footer.php"; ?>
</body>
</html>
<?php endif; ?>