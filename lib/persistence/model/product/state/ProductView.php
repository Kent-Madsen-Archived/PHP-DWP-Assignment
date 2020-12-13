<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductView
     */
    class ProductView
    {
        /**
         * ProductView constructor.
         * @param $controller
         */
        public function __construct( ?ProductController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @param ProductController|null $controller
         */
        public final function setController( ?ProductController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @return ProductController|null
         */
        public final function getController(): ?ProductController
        {
            return $this->controller;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        public final function validateModel( $model ): bool
        {
             $retval = false;
 
             if( $model instanceof ProductModel )
             {
                 $retval = true;
             }
             else
             {
                 throw new Exception('test');
             }
 
             return boolval( $retval );
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewIdentity(): ?int
        {
            return $this->getController()->getModel()->getIdentity();
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function viewIsIdentityNull(): bool
        {
            $retVal = false;

            if( is_null( $this->getController()->getModel()->getIdentity() ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return string|null
         */
        public final function viewTitle(): ?string
        {
            return $this->getController()->getTitle();
        }


        /**
         * @return float|null
         */
        public final function viewPrice(): ?float
        {
            return $this->getController()->getPrice();
        }


        /**
         * @return string|null
         */
        public final function viewDescription(): ?string
        {
            return $this->getController()->getDescription();
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printAreaIdentity(): string
        {
            $id= $this->viewIdentity();
            $message= "value='{$id}'";
            return $message;
        }


        /**
         * @return string
         */
        public final function printAreaTitle(): string
        {
            $str = strval( $this->getController()->getTitle() );
            return htmlentities( "{$str}." );
        }


        /**
         * @return string
         */
        public final function printAreaDescription(): string
        {
            $str = strval( $this->getController()->getDescription() );
            return htmlentities("description: {$str}.");
        }


        /**
         * @return string
         */
        public final function printSummaryOfDescription():string
        {
            $str = strval( $this->getController()->getDescription() );
            $value = null;

            if(strlen($str) > 250)
            {
                $value = substr($str, 0, 250);
            }
            else
            {
                $value = $str;
            }

            return htmlentities("description: {$value}");
        }


        /**
         * @return string
         */
        public final function printAreaPrice(): string
        {
            $str = strval( $this->getController()->getPrice() );

            return htmlentities(strtoupper("{$str} dkk."));
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printFieldTypePrice(): string
        {
            $str = strval( $this->getController()->getPrice() );
            return htmlentities("{$str}");
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printAreaHrefLink(): string
        {
            $id = strval( urlencode( $this->viewIdentity() ) );
            $str = "href='/product/identity/{$id}'";
            return $str;
        }


        /**
         * @return string
         */
        public final function printAreaHrefLang(): string
        {
            $value = htmlentities( 'en' );
            return "hreflang='{$value}'";
        }


        /**
         * @param int|null $value
         * @return string
         */
        public final function printHTMLAreaId( ?int $value ): string
        {
            $fvalue = htmlentities($value);
            return "id='{$fvalue}'";
        }


        /**
         * @param array $array
         * @return string
         */
       public final function printHTMLAreaClasses( array $array ): string
       {
           $concatClass = implode( $array, ',' );
           $concatClass = htmlentities( $concatClass );

           return "class='{$concatClass}'";
       }
               
    }
?>