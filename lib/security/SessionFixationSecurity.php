<?php 

    class SessionFixationSecurity
    {
        public function __construct()
        {

        }

        function update()
        {
            if( !isset( $_SESSION[ 'session_generated' ] ) )
            {
                $_SESSION['session_generated'] = time();
            }

            if( $_SESSION[ 'session_generated' ] < ( time() - 300 ) )
            {
                session_regenerate_id();
                $_SESSION[ 'session_generated' ] = time();
            }
        }
 

    }

?>