<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    
    // Internal Libraries
    require 'bootstrap.php';
?>

<?php
    /**
     * Sets Variables
     */
     $return_stack = array(
         
     );

    /**
     *  Set the require HTTP Headers, for the api.
     */ 
    api_headers();
?>


<?php 
    // Return value
    return_page( $return_stack );
?>