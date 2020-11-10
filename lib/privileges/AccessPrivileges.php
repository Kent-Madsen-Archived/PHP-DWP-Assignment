<?php 

    class AccessPrivileges
    {
        function __construct()
        {
            
        }

        public function is_logged_in()
        {
            return !isset( $_SESSION[ 'is_logged_in' ] );
        }

        public function is_admin()
        {

            return !isset( $_SESSION[ 'admin_privileges' ] );
        }
    }

?>