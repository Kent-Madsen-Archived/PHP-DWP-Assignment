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
        extends BaseMVCView
    {
        /**
         * @param ProductModel $model
         * @throws Exception
         */
        public function __construct( ProductModel $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        final public function validateModel( $model ): bool
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
        final public function viewIdentity(): ?int
        {
            $value = $this->getModel()->getIdentity();
            return $value;
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function viewIsIdentityNull(): bool
        {
            $retVal = false;

            if( $this->getModel() )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @throws Exception
         */
        final public function viewTitle(): ?string
        {
            return $this->getModel()->getTitle();
        }



        /**
         * @return float|null
         * @throws Exception
         */
        final public function viewPrice(): ?float
        {
            return $this->getModel()->getPrice();
        }


        /**
         * @return string|null
         * @throws Exception
         */
        final public function viewDescription(): ?string
        {
            return $this->getModel()->getDescription();
        }


        /**
         * @return string
         * @throws Exception
         */
        final public function printAreaIdentity(): string
        {
            $id= $this->viewIdentity();
            $message= "value='{$id}'";
            return $message;
        }


        /**
         * @return string
         * @throws Exception
         */
        final public function printAreaTitle(): string
        {
            $str = strval( $this->viewTitle() );
            return htmlentities( "{$str}." );
        }


        /**
         * @return string|null
         * @throws Exception
         */
        final public function printAreaDescription(): string
        {
            $str = strval( $this->viewDescription() );
            return htmlentities("description: {$str}.");
        }


        /**
         * @return string
         * @throws Exception
         */
        final public function printSummaryOfDescription():string
        {
            $str = strval( $this->viewDescription() );
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
         * @return string|null
         * @throws Exception
         */
        final public function printAreaPrice(): string
        {
            $str = strval( $this->viewPrice() );

            return htmlentities(strtoupper("{$str} dkk."));
        }


        /**
         * @return string
         * @throws Exception
         */
        final public function printFieldTypePrice(): string
        {
            $str = strval($this->viewPrice());
            return htmlentities("{$str}");
        }


        /**
         * @return string
         * @throws Exception
         */
        final public function printAreaHrefLink(): string
        {
            $id = strval( urlencode( $this->viewIdentity() ) );
            $str = "href='/product/identity/{$id}'";
            return $str;
        }


        /**
         * @return string
         */
        final public function printAreaHrefLang(): string
        {
            $value = htmlentities( 'en' );
            return "hreflang='{$value}'";
        }


        /**
         * @param $value
         * @return string
         */
        final public function printHTMLAreaId( $value ): string
        {
            $fvalue = htmlentities($value);
            return "id='{$fvalue}'";
        }


        /**
         * @param array $array
         * @return string
         */
       final public function printHTMLAreaClasses( array $array ): string
       {
           $concatClass = implode( $array, ',' );
           $concatClass = htmlentities( $concatClass );

           return "class='{$concatClass}'";
       }
               
    }
?>