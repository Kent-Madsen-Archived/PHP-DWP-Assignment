<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ContactView
     */
     class ContactView
     {
         /**
          * @param ContactController|null $controller
          */
         public function __constructor( ?ContactController $controller )
         {
             $this->setController( $controller );
         }

         private $controller = null;

         /**
          * @return ContactController|null
          */
         public function getController(): ?ContactController
         {
             return $this->controller;
         }

         /**
          * @param ContactController|null $controller
          */
         public function setController( ?ContactController $controller ): void
         {
             $this->controller = $controller;
         }

         /**
          * @param $model
          * @return bool
          */
         final public function validateModel( $model ): bool
         {
             $retval = false;
 
             if( $model instanceof ContactModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }


         /**
          * @return int|mixed|null
          */
         final public function viewIdentity()
         {
             if( $this->viewIsIdentityNull() )
             {
                 return null;
             }

             return $this->getIdentity();
         }


         /**
          * @return bool|mixed
          */
         final public function viewIsIdentityNull()
         {
             $retVal = false;

             if( is_null( $this->identity ) )
             {
                 $retVal = true;
             }

             return boolval( $retVal );
         }


     }

?>