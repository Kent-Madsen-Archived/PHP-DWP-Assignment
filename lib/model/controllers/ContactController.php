<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    interface ContactController
    {
        public function setFromMail( $var );
        public function setToMail( $var );

        public function setSubject( $var );
        public function setMessage( $var );

        public function setHasBeenSend( $var );
        public function setCreatedOn( $var );
        
        public function setIdentity( $var );
        
    }

?>