<?php

    class BroughtProductPrint
    {
        public function __construct( BroughtProductView $view )
        {
            $this->setView( $view );
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printPrice(): string
        {
            $v = $this->getView();
            $value = htmlentities("{$v->viewProductPrice()}");
            return $value;
        }



        /**
         * @return string
         * @throws Exception
         */
        public final function printQuantity(): string
        {
            $v = $this->getView();
            $value = htmlentities("{$v->viewNumberOfProducts()}");
            return $value;
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printRegisteredTime(): string
        {
            $v = $this->getView();

            $day = new DateTime($v->viewRegistered());
            $format_date = $day->format('H:i:s');

            $value = htmlentities("{$format_date}" );
            return $value;
        }

        public final function printAreaPrice(): string
        {
            $v = $this->getView()->viewProductPrice();
            $message = "Price: {$v} dkr.";
            return htmlentities( $message );
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printRegisteredDay(): string
        {
            $v = $this->getView();

            $day = new DateTime( $v->viewRegistered() );
            $format_date = $day->format('Y/m/d');

            $value = htmlentities( "{$format_date}" );
            return $value;
        }


        //
        private $view = null;

        /**
         * @param BroughtProductView|null $view
         */
        public function setView( ?BroughtProductView $view ): void
        {
            $this->view = $view;
        }

        /**
         * @return BroughtProductView|null
         */
        public function getView(): ?BroughtProductView
        {
            return $this->view;
        }
    }

?>