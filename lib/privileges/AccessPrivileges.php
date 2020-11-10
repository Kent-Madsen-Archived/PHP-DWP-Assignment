<?php 

    /**
     * 
     */
    class AccessPrivileges
    {
        /**
         * 
         */
        function __construct()
        {
            
        }

        /**
         * 
         */
        public function is_logged_in()
        {
            if( isset( $_SESSION[ 'user_session_object_identity' ] ) )
            {
                return TRUE;
            }

            return FALSE;
        }

        /**
         * 
         */
        public function is_not_logged_in()
        {
            return !$this->is_logged_in();
        }

        /**
         * 
         */
        public function is_admin()
        {
            if( $this->is_logged_in() == FALSE )
            {
                return FALSE;
            }

            if( $_SESSION['user_session_object_profile_type'] == 3 )
            {
                return TRUE;
            }

            return FALSE;
        }
    }

?>