<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ContactView
     */
     interface ContactView 
     {
         /**
          * @return mixed
          */
         public function getFromMail();

         /**
          * @return mixed
          */
         public function getToMail();

         /**
          * @return mixed
          */
         public function getSubject();

         /**
          * @return mixed
          */
         public function getMessage();

         /**
          * @return mixed
          */
         public function getCreatedOn();

         /**
          * @return mixed
          */
         public function getHasBeenSend();

         /**
          * @return mixed
          */
         public function getIdentity();
     }

?>