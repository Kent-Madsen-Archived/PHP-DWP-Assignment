<h4> 
    Update
</h4>

<form action="/admin/product/update" 
      method="post"> 
      
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
           value="0.0">
    <label> Price </label>
    

    <input type="submit" 
           name="admin_product_update_is_updated" 
           value="update">
</form>
