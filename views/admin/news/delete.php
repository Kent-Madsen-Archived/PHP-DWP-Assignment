<?php

if(isset($_POST['admin_product_delete_is_deleted']))
{
    $factory = GroupNews::getArticleFactory();
    $m = $factory->createModel();

    $to_be_deleted = trim( $_POST[ 'admin_article_delete_model_id' ] );
    $filtered_tbd = filter_var( $to_be_deleted, FILTER_VALIDATE_INT );

    $m->setIdentity($filtered_tbd);
    $factory->delete($m);

    echo "deleted article: {$filtered_tbd}";
}
?>

<h4>
    Delete
</h4>

<form action="/admin/news/delete"
      method="post">
    <p>
        Are you sure you want to delete <?php echo htmlentities( $id_value ); ?>
    </p>

    <input type="hidden" name="admin_article_delete_model_id" value="<?php echo "{$id_value}";?>">

    <input type="submit"
           name="admin_product_delete_is_deleted"
           value="delete article"
           class="button">
</form>

