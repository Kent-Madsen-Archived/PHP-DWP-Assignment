<?php 
require './model/ProfileFactory.php';

$test = new ProfileFactory;

echo var_dump($test->updateProfilePassword(10, '1234') );

?>