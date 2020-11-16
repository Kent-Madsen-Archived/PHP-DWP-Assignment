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
         extends BaseEntityView
     {
         /**
          * @return mixed
          */
         public function viewFromMail();

         /**
          * @return mixed
          */
         public function viewToMail();

         /**
          * @return mixed
          */
         public function viewSubject();

         /**
          * @return mixed
          */
         public function viewMessage();

         /**
          * @return mixed
          */
         public function viewCreatedOn();

         /**
          * @return mixed
          */
         public function viewHasBeenSend();

     }

?>