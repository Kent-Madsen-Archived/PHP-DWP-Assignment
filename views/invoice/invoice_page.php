<?php
    $domain = new InvoiceDomain();
    $invoice_model = $domain->retrieveInvoiceByIdentity($id_value);
    $invoiceView = new ProductInvoiceView($invoice_model);
    $invoicePrint = new ProductInvoicePrint($invoiceView);
?>

<h5>
    <?php echo $invoicePrint->printIdentity();?>
</h5>
<div>
    <p>
        <?php echo $invoicePrint->printInvoiceRegisteredDay(); echo ', ' . $invoicePrint->printInvoiceRegisteredTimeOfDay();?>
    </p>
    <p>
        <?php echo $invoicePrint->printTotalPriceWithLabel(); ?>
    </p>
</div>

<div>
    <?php $products_brougth = $domain->retrieveBroughtProductBy($id_value); ?>

    <?php if( !is_null( $products_brougth ) ): ?>
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>

        <?php foreach ( $products_brougth as $brougth ): ?>
            <tr>
                <?php
                    if( $brougth instanceof BroughtProductModel )
                    {
                        $product = $domain->retrieveProductByIndex( $brougth->getProductId() );
                    }

                    echo "<td> {$product->getTitle()} </td>";
                    echo "<td> {$brougth->getPrice()} dkr. </td>";
                    echo "<td> {$brougth->getNumberOfProducts()} </td>";

                    $total = floatval($brougth->getPrice()) * floatval($brougth->getNumberOfProducts());
                    echo "<td> {$total} dkr. </td>";
                ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>


