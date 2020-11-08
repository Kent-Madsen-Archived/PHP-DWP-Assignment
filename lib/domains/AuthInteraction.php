<?php 

interface AuthInteraction
{
    public function login( $username, $password );

    public function forgot_my_password_by_email( $email );

    public function register( $username, $password, $name, $email, $birthday, $phone_number, $address );
}

?>