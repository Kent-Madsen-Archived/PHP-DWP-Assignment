<?php
    if( isset( $_POST[ 'admin_product_update_is_updated' ] ) )
    {
        $id             = trim( $_POST[ 'admin_product_update_id' ] );
        $title          = trim( $_POST[ 'admin_product_update_title' ] );
        $description    = trim( $_POST[ 'admin_product_update_description' ] );
        $price          = trim( $_POST[ 'admin_product_update_price' ] );

        $id_db          = filter_var( $id, FILTER_VALIDATE_INT );
        $title_db       = filter_var( $title, FILTER_SANITIZE_STRING );
        $description_db = filter_var( $description, FILTER_SANITIZE_STRING );
        $price_db       = filter_var( $price, FILTER_VALIDATE_FLOAT );

        $factory = new ProductBaseFactoryTemplate(
                new MySQLConnectorWrapper(
                        MySQLInformationSingleton::getSingleton()
                )
        );

        $model = $factory->createModel();
        $model->setIdentity( $id_db );

        $factory->readModel($model);

        // replace values only, if they contain new values. ie. empty or null will be reverted back to the original value
        if( !( is_null( $title_db ) || empty( $title_db ) ) )
        {
            $model->setTitle($title_db);
        }

        if( !( is_null( $description_db ) || empty( $description_db ) ) )
        {
            $model->setDescription( $description_db );
        }

        if( !( is_null( $price_db )|| empty( $price_db )) )
        {
            $model->setPrice( $price_db );
        }

        $factory->update($model );
    }
?>

<h4>
    Update
</h4>

<form action="/admin/product/update" 
      method="post">
    <?php $filtered_id = htmlentities($id); ?>
    <input type="hidden" name="admin_product_update_id" value="<?php echo "{$filtered_id}"; ?>">

    <p>
        You're currently editing product model with the id:
        <span>
            <?php echo "{$filtered_id}"; ?>
        </span>
    </p>
    
    <input type="text" 
           name="admin_product_update_title" 
           placeholder="title">
    <label> Title </label>
    

    <input type="text" 
           name="admin_product_update_description" 
           placeholder="description">
    <label> Description </label>
    

    <input type="number" 
           name="admin_product_update_price" 
           placeholder="price" 
           value="">
    <label> Price </label>
    

    <input type="submit" 
           name="admin_product_update_is_updated" 
           value="update product"
           class="btn">
</form>
