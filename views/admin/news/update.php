<?php
$article_factory = GroupNews::getArticleFactory();

if( isset( $_POST[ 'admin_news_update_submit' ] ) )
{
    $identity = trim( $_POST[ 'admin_news_update_identity' ] );
    $title = trim( $_POST[ 'admin_news_update_title' ] );
    $content = trim($_POST['admin_news_update_content']);

    $fTitle = filter_var( $title, FILTER_SANITIZE_STRING );
    $fContent = filter_var( $content, FILTER_SANITIZE_STRING );
    $filtered_id = filter_var( $identity, FILTER_VALIDATE_INT );

    $m = $article_factory->createModel();

    $m->setIdentity($filtered_id);

    $m->setTitle($fTitle);
    $m->setContent($fContent);

    $article_factory->update($m);
    $article_factory->readModel($m);

    echo "updated model at: {$m->getLastUpdated()}";
}
?>

<h4>Update</h4>
<form action="/admin/news/update" method="post">
    <input type="hidden" value="<?php echo "{$id_value}"; ?>" name="admin_news_update_identity">

    <label>Title</label>
    <input type="text" value="" name="admin_news_update_title">

    <label>Content</label>
    <input type="text" value="" name="admin_news_update_content">

    <input class="button" type="submit" value="update article" name="admin_news_update_submit">
</form>

