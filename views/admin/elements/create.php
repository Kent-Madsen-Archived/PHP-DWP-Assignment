<?php

$page_elements_factory = GroupElements::getPageElementFactory();

    if( isset( $_POST[ 'admin_elements_create_submit' ] ) )
    {
        $area_key = trim( $_POST[ 'admin_elements_create_area_key' ] );
        $title = trim( $_POST[ 'admin_elements_create_title' ] );
        $content = trim( $_POST[ 'admin_elements_create_content' ] );

        $fAreakey = filter_var( $area_key, FILTER_SANITIZE_STRING );
        $fTitle = filter_var( $title, FILTER_SANITIZE_STRING );
        $fContent = filter_var( $content, FILTER_SANITIZE_STRING );

        $m = $page_elements_factory->createModel();
        $m->setAreaKey($fAreakey);
        $m->setTitle($fTitle);
        $m->setContent($fContent);

        $r = $page_elements_factory->create($m);

        if($r)
        {
            echo "created: {$m->getTitle()}";
        }
    }
?>
<h4>Create</h4>
<form action="/admin/elements/create" method="post">
    <label>Area Key</label>
    <input type="text" value="" name="admin_elements_create_area_key">

    <label>Title</label>
    <input type="text" value="" name="admin_elements_create_title">

    <label>Content</label>
    <input type="text" value="" name="admin_elements_create_content">

    <input class="button" type="submit" value="create" name="admin_elements_create_submit">
</form>