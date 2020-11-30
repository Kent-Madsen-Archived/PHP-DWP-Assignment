<?php
  if( !( isset( $id ) || isset( $_POST[ 'admin_product_delete_is_deleted' ] ) ) )
  {
        throw new Exception('Sorry, but this view requires to have a view specified. to function.');
  }

  if( isset( $_POST[ 'admin_product_delete_is_deleted' ] ) )
  {
    //
    $factory = new ProductBaseFactoryTemplate
    (
           new MySQLConnectorWrapper
           (
                  MySQLInformationSingleton::getSingleton()
           )
    );

    $to_be_deleted = trim( $_POST[ 'admin_product_delete_model_id' ] );
    $filtered_tbd = filter_var( $to_be_deleted, FILTER_VALIDATE_INT );

    $model = $factory->createModel();
    $model->setIdentity( $filtered_tbd );

    $factory->readModel($model );
    $retVal = $factory->delete($model );

    if( $retVal )
    {
        $title_model = htmlentities( $model->getTitle() );
        echo "you have just deleted {$title_model}.";
    }
  }

?>

<h4> 
    Delete 
</h4>

<form action="/admin/product/delete"
      method="post"> 
    <p> 
      Are you sure you want to delete <?php echo htmlentities( $id ); ?>
    </p>

    <input type="hidden" name="admin_product_delete_model_id" value="<?php echo htmlentities( $id );?>">

    <input type="submit"
           name="admin_product_delete_is_deleted" 
           value="delete product"
           class="btn">
</form>


