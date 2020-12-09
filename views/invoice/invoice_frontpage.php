<?php
    $domain = new InvoiceDomain();
    $listed_invoices = $domain->retrieveInvoicesByProfileIdentity( SessionUserProfile::getSessionUserProfileIdentity() );
?>

<section class="invoice_section">
    <?php if(!is_null($listed_invoices)): ?>
        <?php foreach ( $listed_invoices as $current_invoice ): ?>
            <?php if( $current_invoice instanceof ProductInvoiceModel ): ?>
                <div class="invoice">
                    <?php
                    $brougth_products = $domain->retrieveBroughtProductBy( $current_invoice->getIdentity() );
                    $current_invoice_view = new ProductInvoiceView( $current_invoice );

                    $print_invoice = new ProductInvoicePrint( $current_invoice_view );
                    ?>
                    <h5>
                        <?php echo $print_invoice->printIdentity(); ?>
                    </h5>
                    <div class="invoice_overview">
                        <p>
                            <?php echo $print_invoice->printTotalPriceWithLabel();?>
                        </p>

                        <div>
                            <p>
                                Brought: <?php echo $print_invoice->printInvoiceRegisteredDay(); ?>, <?php echo $print_invoice->printInvoiceRegisteredTimeOfDay(); ?>
                            </p>
                        </div>

                        <?php $counter = 0; ?>
                        <ul class="invoice_products">
                            <?php foreach ( $brougth_products as $current_brougth_product ): ?>
                                <li class="">
                                    <?php
                                    $counter = $counter + 1;
                                    ?>
                                    <?php $current_bpview = new BroughtProductView( $current_brougth_product ); ?>
                                    <?php $print_bv = new BroughtProductPrint( $current_bpview );?>
                                    <?php $product = $domain->retrieveProductByIndex( $current_brougth_product->getProductId() ); ?>
                                    <div class="invoice_product">
                                        <?php $view_product = new ProductView( $product ); ?>
                                        <div class="invoice_header">
                                            <h6>
                                                <a <?php echo $view_product->printAreaHrefLink(); echo $view_product->printAreaHrefLang();  ?> >
                                                    <?php echo "{$counter}: ";?>
                                                    <?php echo $view_product->printAreaTitle(); ?>
                                                </a>
                                            </h6>
                                        </div>
                                        <div class="invoice_body">
                                            <p>
                                                <?php echo $print_bv->printAreaPrice(); ?>
                                            </p>
                                            <p>
                                                Quantity:
                                                <?php echo $print_bv->printQuantity(); ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>

                    <a class="btn"
                       href="<?php echo "/invoice/identity/{$current_invoice->getIdentity()}";?>"
                       hreflang="en">
                        Read Invoice
                    </a>
                </div>
            <?php endif;?>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
