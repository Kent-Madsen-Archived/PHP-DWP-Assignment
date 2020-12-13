<?php
    $router = RouterSingleton::getInstance()->getCurrentRoute();
    $id_value = $router->getValidationTree()[2]->getValue();

    $domain = new ProductDomain();

    $privileges = new AccessPrivilegesDomain();
    $product = $domain->readSingularProduct( $id_value );

    $view = new ProductView( new ProductController( $product ) );
?>

<?php if( !is_null( $product->getTitle() ) ): ?>
    <h4>
        <?php echo $view->printAreaTitle(); ?>
    </h4>

    <p>
        <?php echo $view->viewDescription(); ?>
    </p>

    <p>
        <?php echo $view->printFieldTypePrice();?>
    </p>

    <?php if($privileges->is_logged_in()): ?>
        <form method="post"
              action="/product/buy">

            <input type="hidden" <?php echo $view->printAreaIdentity(); ?> name="product_basket_product_identity">

            <input type="number" value="1" placeholder="quantity" name="product_basket_number_of_products">

            <input type="hidden" value="<?php echo $view->printFieldTypePrice(); ?>" name="product_basket_price">

            <button class="button" name="product_basket_submit" value="1">
                insert into Basket
            </button>
        </form>
    <?php endif; ?>

<?php $product_fac = GroupProduct::getProductFactory(); ?>
<?php $variant_fac = new ProductVariationFactory(new MySQLConnectorWrapper(MySQLInformationSingleton::getSingleton())); ?>
<?php $variant_models = $variant_fac->readVariationByProductId($id_value); ?>
    <?php if(!is_null($variant_models)): ?>
        <div>
            <h4>Variants</h4>
            <div>
                <?php foreach ($variant_models as $vm): ?>
                    <?php
                        $model_ent = $product_fac->createModel();
                        $model_ent->setIdentity($vm->getProductVariantOfId());
                        $product_fac->readModel($model_ent);
                    ?>
                <h5><?php echo $model_ent->getTitle(); ?></h5>
                <p><?php echo $model_ent->getPrice(); ?></p>

                <a class="button" href="/product/identity/<?php echo $model_ent->getIdentity();?>">View Product</a>

                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php
    $recommended_fac = new ProductInvoiceRelationFactory(new MySQLConnectorWrapper(MySQLInformationSingleton::getSingleton()));
    $recommended = $recommended_fac->recommendation_by_product_id($id_value);
    ?>

<div>
    <h4>recommendation area</h4>
    <div>
        <?php if( !is_null( $recommended ) ): ?>
        <!-- Recommended -->
            <?php foreach ( $recommended as $product_rec ): ?>
                <?php
                    $product_rec_ent = $product_fac->createModel();
                    $product_rec_ent->setIdentity( $product_rec[ 'product_id' ] );
                    $product_fac->readModel($product_rec_ent );
                ?>
            <div>
                <h5><?php echo $product_rec_ent->getTitle(); ?></h5>
                <p><?php echo $product_rec_ent->getPrice();?></p>
                <a class="button" href="/product/identity/<?php echo $product_rec_ent->getIdentity();?>">View Product</a>
            </div>

            <?php endforeach; ?>

        <?php endif; ?>
    </div>
</div>

<?php endif; ?>