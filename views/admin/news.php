<?php
    if( isset( $_POST[ 'admin_product_pagination_current' ] ) )
    {
        $filtered_pagination_value = filter_var( $_POST[ 'admin_product_pagination_current' ], FILTER_VALIDATE_INT );
        $pagination = $filtered_pagination_value;
    }
    else
    {
        $pagination = 0;
    }

    if( isset( $_POST[ 'admin_product_pagination_previous' ] ) )
    {
        if( !( $pagination < 1 ) )
        {
            $pagination = $pagination - 1;
        }
    }

    if( isset( $_POST[ 'admin_product_pagination_next' ] ) )
    {
        $pagination = $pagination + 1;
    }
?>

<h3>
    News
</h3>

<a href="/admin/news/create" hreflang="en" class="btn"> Create </a>

<?php
    if( isset( $operation ) )
    {
        if( $operation == 'create' )
        {
            include 'views/admin/news/create.php';
        }

        if( $operation == 'delete' )
        {
            include 'views/admin/news/delete.php';
        }

        if( $operation == 'update' )
        {
            include 'views/admin/news/update.php';
        }
    }

    $factory = new ArticleFactory(
        new MySQLConnectorWrapper(
            MySQLInformationSingleton::getSingleton()
        )
    );

    $factory->setPaginationIndex($pagination);
    $articles = $factory->read();
?>
<?php if ( !isset( $operation ) ): ?>
    <ul>
        <?php if(!is_null( $articles )): ?>
            <?php foreach ( $articles as $article ): ?>
                <li>
                    <?php
                        $pId = $article->getIdentity();
                        $pTitle = $article->getTitle();
                        $pContent = $article->getContent();

                        echo "<p>{$pTitle}</p>";
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

    <form class="pagination" method="post" action="/admin/news">
        <input type="hidden" value="<?php echo $factory->getPaginationIndex(); ?>" name="admin_product_pagination_current">

        <li>
            <?php if( !$factory->isAtMinimumBoundary() ): ?>
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
            <?php echo ( $factory->getPaginationIndex() + 1 );?>
        </li>

        <li>
            <?php if( !$factory->isAtMaximumBoundary() ): ?>
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