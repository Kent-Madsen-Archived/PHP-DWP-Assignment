<?php 
       if( isset( $_POST[ 'admin_product_create_is_created' ] ) )
       {
              $title        = $_POST[ 'admin_product_create_title' ];
              $description  = $_POST[ 'admin_product_create_description' ];
              $price        = $_POST[ 'admin_product_create_price' ];
              
              // Filter and sanitized data to the db
              $title_db = filter_var( $title, FILTER_SANITIZE_STRING );
              $description_db = filter_var( $description, FILTER_SANITIZE_STRING );
              $price_db = filter_var( $price, FILTER_SANITIZE_NUMBER_FLOAT );

              //
              $factory = new ProductFactory(new MySQLConnectorWrapper(MySQLInformationSingleton::getSingleton()));

              $model = $factory->createModel();
              $model->setTitle( $title_db );
              $model->setDescription( $description_db );
              $model->setPrice( $price_db );

              $factory->create($model);

              if( !is_null( $model->getIdentity() ) )
              {
                  $id = htmlentities( $model->getIdentity() );
                  echo "congratulations {$id} has been created.";
              }
       }

?>
<h4> 
    Create 
</h4>

<form action="/admin/product/create" 
      method="post"> 

    <input type="text" 
           name="admin_product_create_title" 
           placeholder="title">
    <label> Title </label>

    <input type="text" 
           name="admin_product_create_description" 
           placeholder="description">
    <label> description </label>
    
    <input type="number" 
           name="admin_product_create_price" 
           placeholder="price" 
           value="0.0">
    <label> Price </label>
    
    <input type="submit" 
           name="admin_product_create_is_created" 
           value="create">
</form>