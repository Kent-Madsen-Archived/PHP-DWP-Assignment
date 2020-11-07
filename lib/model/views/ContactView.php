<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

     interface ContactView 
     {
         public function getFromMail();
         public function getSubject();
         public function getMessage();
     }

?>