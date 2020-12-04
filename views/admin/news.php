<?php
    $factory = GroupNews::getArticleFactory();
    $pag = new FactoryPagination( $factory );

    if( isset( $_POST[ 'admin_product_pagination_current' ] ) )
    {
        $filtered_pagination_value = filter_var( $_POST[ 'admin_product_pagination_current' ], FILTER_VALIDATE_INT  );
        $pagination = $filtered_pagination_value;
    }
    else
    {
        $pagination = $pag->viewCurrentPagination();
    }

    $factory->setPaginationIndexValue( $pagination );

    if( isset( $_POST[ 'admin_product_pagination_previous' ] ) )
    {
        $pagination = $pag->viewPreviousPagination();
    }

    if( isset( $_POST[ 'admin_product_pagination_next' ] ) )
    {
        $pagination = $pag->viewNextPagination();
    }

    $factory->setPaginationIndexValue( ($pagination - 1) );
?>

<h3>
    News
</h3>

<a href="/admin/news/create" hreflang="en" class="btn"> Create </a>

<?php
    if( isset( $operation_value ) )
    {
        if( $operation_value == 'create' )
        {
            include 'views/admin/news/create.php';
        }

        if( $operation_value == 'delete' )
        {
            include 'views/admin/news/delete.php';
        }

        if( $operation_value == 'update' )
        {
            include 'views/admin/news/update.php';
        }
    }

    $articles = $factory->read();
?>
<?php if ( !isset( $operation_value ) ): ?>
    <ul>
        <?php if(!is_null( $articles )): ?>
            <?php foreach ( $articles as $article ): ?>
                <li>
                    <?php
                        $pId = $article->getIdentity();
                        $pTitle = $article->getTitle();
                        $pContent = $article->getContent();

                        echo "<h4>{$pTitle}</h4>";
                        echo "<p>{$pContent}</p>";

                        $updateLink = "/admin/news/update/{$pId}";
                        $deleteLink = "/admin/news/delete/{$pId}";
                    ?>


                    <?php echo "<a class='btn' href=\"{$updateLink}\" hreflang='en'> Update </a>"; ?>
                    <?php echo "<a class='btn' href=\"{$deleteLink}\" hreflang='en'> Delete </a>"; ?>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

    <form class="pagination"
          method="post"
          action="/admin/news">

        <input type="hidden" value="<?php echo $pag->getPaginationIndex(); ?>" name="admin_product_pagination_current">

        <li>
            <?php if( !$pag->isPreviousMinimum() ): ?>
                <button type="submit" value="previous" class="btn" name="admin_product_pagination_previous">
                    <span class="material-icons">
                        navigate_before
                    </span>
                </button>
            <?php else: ?>
                <button type="submit" value="previous" class="btn disabled">
                    <span class="material-icons">
                        navigate_before
                    </span>
                </button>
            <?php endif; ?>
        </li>

        <li>
            <?php echo $pag->viewCurrentPagination();?>
        </li>

        <li>
            <?php if( !$pag->isNextMax() ): ?>
                <button type="submit" class="btn" name="admin_product_pagination_next">
                    <span class="material-icons">
                        navigate_next
                    </span>
                </button>
            <?php else: ?>
                <button type="submit" class="btn disabled">
                    <span class="material-icons">
                        navigate_next
                    </span>
                </button>
            <?php endif; ?>
        </li>
    </form>
<?php endif; ?>