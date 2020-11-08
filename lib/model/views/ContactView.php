<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

     interface ContactView 
     {
         public function getFromMail();
         public function getToMail();

         public function getSubject();
         public function getMessage();

         public function getCreatedOn();
         public function getHasBeenSend();
         
         public function getIdentity();
     }

?>