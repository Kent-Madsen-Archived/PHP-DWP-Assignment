<?php
    /**
     *  Title: Invoices
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    $domain = new InvoiceDomain();

    
    PageTitleController::getSingletonController()->append( ' - Invoices' );


    $arr = $domain->retrieveInvoicesBy(SessionUserProfile::getSessionUserProfileIdentity());
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo encodingStandardHTML(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
        <?php
            PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>
        
        <main>
            <h4>
                Invoices
            </h4>

            <div>
                <?php foreach ( $arr as $value ): ?>
                    <?php if( $value instanceof ProductInvoiceModel ): ?>
                        <div>
                            <?php
                                $arrBrought = $domain->retrieveBroughtProductBy( $value->getIdentity() );
                            ?>

                            <h5>Invoice Id: <?php echo $value->getIdentity(); ?></h5>
                            <p>Total Price: <?php echo $value->getTotalPrice();?></p>
                            <div>
                                <p>
                                    profile_id: <?php echo $value->getProfileId();?>
                                </p>
                            </div>

                            <ul>
                                <li class="product">
                                    <table>
                                        <tr>
                                            <th>
                                                Product Identity & Title
                                            </th>
                                            <th>
                                                Number of:
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                        </tr>

                                <?php foreach ($arrBrought as $brougthvalue): ?>

                                    <?php if( $brougthvalue instanceof BroughtProductModel ): ?>

                                        <?php $product = $domain->retrieveProductByIndex( $brougthvalue->getProductId() ); ?>
                                                <tr>
                                                    <td>
                                                        <?php echo "{$product->getIdentity()}, {$product->getTitle()}"; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $brougthvalue->getNumberOfProducts(); ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $brougthvalue->getPrice();?>
                                                    </td>
                                                </tr>

                                    <?php endif;?>
                                <?php endforeach;?>

                                    </table>
                                    </li>

                            </ul>

                        </div>
                    <?php endif;?>
                <?php endforeach; ?>
            </div>
        </main>
        
        <?php getFooter(); ?>
    </body>
</html>