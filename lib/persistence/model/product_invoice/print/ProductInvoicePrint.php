<?php

    class ProductInvoicePrint
    {
        public function __construct( $view )
        {
            $this->setView( $view );
        }


        public function printIdentity(): string
        {
            $identity = $this->getView()->viewIdentity();
            return "Invoice identity: {$identity}";
        }


        public function printTotalPrice(): string
        {
            $total_price = $this->getView()->viewTotalPrice();
            $message = "{$total_price}";
            return htmlentities($message);
        }


        public function printInvoiceRegisteredDay(): string
        {
            $date_str = $this->getView()->viewInvoiceRegistered();
            $time = new DateTime($date_str);

            $formatted_time = $time->format('Y-m-d');

            $message = "{$formatted_time}";
            return htmlentities($message);
        }


        public function printInvoiceRegisteredTimeOfDay(): string
        {
            $date_str = $this->getView()->viewInvoiceRegistered();
            $time = new DateTime($date_str);

            $formatted_time = $time->format('H:i:s');

            $message = "{$formatted_time}";
            return htmlentities($message);
        }


        public function printTotalPriceWithLabel(): string
        {
            $total = $this->getView()->viewTotalPrice();

            $message = "Total Price: {$total} dkr.";
            return htmlentities($message);
        }


        //
        private $view = null;

        /**
         * @param ProductInvoiceModel|null $view
         */
        public function setView( ?ProductInvoiceView $view ): void
        {
            $this->view = $view;
        }

        /**
         * @return ProductInvoiceView|null
         */
        public function getView(): ?ProductInvoiceView
        {
            return $this->view;
        }
    }

?>