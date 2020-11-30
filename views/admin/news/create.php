<?php
    $factory = new ArticleFactory(
                    new MySQLConnectorWrapper(
                            MySQLInformationSingleton::getSingleton()
                    )
    );

    if( isset( $_POST[ 'admin_news_create_submit' ] ) )
    {
        $title = trim( $_POST[ 'admin_news_create_title' ] );
        $description = trim( $_POST[ 'admin_news_create_content' ] );

        $fTitle = filter_var( $title, FILTER_SANITIZE_STRING );
        $fDescription = filter_var( $description, FILTER_SANITIZE_STRING );

        $model = $factory->createModel();
        $model->setTitle( $fTitle );
        $model->setContent( $fDescription );

        $factory->create($model);

        echo "{$fTitle} has been created";
    }

?>
<h4>
    Create
</h4>
<form action="/admin/news/create"
      method="post">
    <input type="text"
           name="admin_news_create_title">

    <label>Title</label>

    <input type="text"
           name="admin_news_create_content">

    <label>Content</label>

    <input class="btn"
           type="submit"
           name="admin_news_create_submit"
           value="Create Article">
</form>