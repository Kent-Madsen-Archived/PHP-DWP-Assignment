<?php require_once 'meta/main.php'; ?>

<?php 

if( !isset( $_SESSION[ "profile_checkout_bag"] ) ) 
{
    $_SESSION["profile_checkout_bag"] = array();
}

$already_exist = false;

foreach( $_SESSION["profile_checkout_bag"] as $value )
{
    //if($value[0] == $_GET['identity'])
    if( $value->getIdentity() == $_GET['identity'] )
    {
        $already_exist = true;

        $value->increaseQuantity( $_GET['quantity'] );

    }
}

if( !$already_exist )
{
    $newArg = new BasketEntry( $_GET['identity'], $_GET['quantity'] );

    array_push( $_SESSION["profile_checkout_bag"], $newArg );
}

go_back();

?>