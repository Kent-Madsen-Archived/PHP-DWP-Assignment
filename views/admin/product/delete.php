<h4> 
    Delete 
</h4>

<form action="/admin/product/delete" 
      method="post"> 
    <p> 
      Are you sure you want to delete <?php echo htmlentities( $id ); ?>
    </p>
    
    <input type="submit" 
           name="admin_product_delete_is_deleted" 
           value="delete">
</form>


