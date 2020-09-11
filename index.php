<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
require './model/ProfileMailFactory.php';

$test = new ProfileMailFactory;
$test->update(5, 'fracturerdev@gmail.com');

?>
    
</body>
</html>