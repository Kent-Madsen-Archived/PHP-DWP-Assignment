<?php
if(!isset($id_value) || !isset($_POST['admin_elements_delete_submit']))
{

}

if(isset($_POST['admin_elements_delete_submit']))
{
    $factory = GroupElements::getPageElementFactory();
    $m = $factory->createModel();

    $to_be_deleted = trim( $_POST[ 'admin_elements_delete_identity' ] );
    $filtered_tbd = filter_var( $to_be_deleted, FILTER_VALIDATE_INT );

    $m->setIdentity($filtered_tbd);
    $factory->delete($m);
}
?>
<h4>Delete</h4>
<form action="/admin/elements/delete" method="post">
    <p>Do you wanna delete <?php echo "{$id_value}";?> </p>
    <input type="hidden" value="<?php echo "{$id_value}";?>" name="admin_elements_delete_identity">

    <input class="button" type="submit" value="delete page element" name="admin_elements_delete_submit">
</form>