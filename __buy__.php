<?php require_once 'head.php'; ?>

<?php 
if( !isset($_SESSION["profile_checkout_bag"]) ) 
{
    $_SESSION["profile_checkout_bag"] = array();
}

$already_exist = false;
$newVal = 0;

foreach($_SESSION["profile_checkout_bag"] as $value)
{
    if($value[0] == $_GET['identity'])
    {
        $already_exist = true;
        $newVal = $value[1] + $_GET['quantity'];
    }
}

if( !$already_exist )
{
    $newArg = array($_GET['identity'], $_GET['quantity']);
    array_push($_SESSION["profile_checkout_bag"], $newArg);
}
else 
{
    for($idx = 0; $idx < count($_SESSION['profile_checkout_bag']); $idx++) 
    {
        if($_SESSION['profile_checkout_bag'][$idx][0] == $_GET['identity'])
        {
            $_SESSION['profile_checkout_bag'][$idx][1] = $newVal;
        }
    }
}



?>