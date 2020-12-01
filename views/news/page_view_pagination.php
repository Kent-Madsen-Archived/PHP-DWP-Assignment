<?php

$router = RouterSingleton::getInstance()->getCurrentRoute();

$operation_value = $router->getValidationTree()[1]->getValue();
$id_value = $router->getValidationTree()[2]->getValue();

if (is_null($id_value) )
{
    $pagination = 0;
}
else
{
    $pagination = $id_value - 1;
}

$domain = new NewsDomain();

$articles = $domain->retrieveArticlesAt($pagination, 5);
?>

<h4>All Article</h4>

<?php
    foreach ( $articles as $article ):
?>
    <div>
        <h5> <?php echo $article->getTitle(); ?></h5>
        <p> <?php echo $article->getContent();?></p>
        <a href="<?php echo "/news/identity/{$article->getIdentity()}";?>">Read more</a>
    </div>
<?php
    endforeach;
?>

<?php
$af = $domain->getArticleFactory();
?>
<ul class="pagination">
    <li>
        <?php $previous_pagination = urlencode( $af->getPaginationIndexCounter()->getCurrent()); ?>

        <?php if( !$af->isPaginationIndexAtMinimumBoundary() ): ?>
            <a class="btn" href='<?php echo "/news/pagination/{$previous_pagination}";?>'>
                Previous
            </a>
        <?php else:?>
            <a class="btn disabled">
                Previous
            </a>
        <?php endif; ?>
    </li>

    <li>
        <?php echo strval( $af->getPaginationIndexCounter()->projectIncrease(1 ) ); ?>
    </li>

    <li>
        <?php $next_pagination = urlencode($af->getPaginationIndexCounter()->projectIncrease(2 )); ?>
        <?php if( !$af->isPaginationIndexAtMaximumBoundary() ): ?>
            <a href="<?php echo "/news/pagination/{$next_pagination}";?>" class="btn">
                Next
            </a>
        <?php else:?>
            <a class="btn disabled">
                Next
            </a>
        <?php endif; ?>
    </li>

</ul>
