<?php
$page_elements_factory = GroupElements::getPageElementFactory();

if( isset( $_POST[ 'admin_elements_update_submit' ] ) )
{
    $identity = trim( $_POST[ 'admin_elements_update_identity' ] );
    $area_key = trim( $_POST[ 'admin_elements_update_area_key' ] );
    $title = trim( $_POST[ 'admin_elements_update_title' ] );
    $content = trim( $_POST[ 'admin_elements_update_content' ] );

    $fAreakey = filter_var( $area_key, FILTER_SANITIZE_STRING );
    $fTitle = filter_var( $title, FILTER_SANITIZE_STRING );
    $fContent = filter_var( $content, FILTER_SANITIZE_STRING );
    
    $filtered_id = filter_var( $identity, FILTER_VALIDATE_INT );

    $m = $page_elements_factory->createModel();

    $m->setIdentity($filtered_id);
    
    $m->setAreaKey($fAreakey);
    $m->setTitle($fTitle);
    $m->setContent($fContent);

    $page_elements_factory->update($m);
    $page_elements_factory->readModel($m);

    echo "updated model at: {$m->getLastUpdated()}";
}
?>

<h4>Update</h4>
<form action="/admin/elements/update" method="post">
    <input type="hidden" value="<?php echo "{$id_value}"; ?>" name="admin_elements_update_identity">

    <label>Area Key</label>
    <input type="text" value="" name="admin_elements_update_area_key">

    <label>Title</label>
    <input type="text" value="" name="admin_elements_update_title">

    <label>Content</label>
    <input type="text" value="" name="admin_elements_update_content">

    <input class="button" type="submit" value="update page element" name="admin_elements_update_submit">
</form>

