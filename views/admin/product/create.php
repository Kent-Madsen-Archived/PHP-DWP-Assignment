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