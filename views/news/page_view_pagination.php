<?php

$router = RouterSingleton::getInstance()->getCurrentRoute();

$operation_value = $router->getValidationTree()[1]->getValue();
$id_value = $router->getValidationTree()[2]->getValue();

if (!isset($id_value) )
{
    $pagination = 0;
}
else
{
    $pagination = $id_value - 1;
}

$domain = new NewsDomain();
$articles = $domain->retrieveArticlesAt($pagination, 5);

$af = GroupNews::getArticleFactory();
$pag = new FactoryPagination( $af );
$pag->setBase('/news/pagination/');

?>

<h4>All Article</h4>

<?php
    foreach ( $articles as $article ):
?>
    <div>
        <h5> <?php echo $article->getTitle(); ?></h5>
        <p> <?php echo $article->getContent();?></p>
        <a class="btn" href="<?php echo "/news/identity/{$article->getIdentity()}";?>">Read more</a>
    </div>
<?php
    endforeach;
?>

<ul class="pagination">
    <li>
        <?php $previous_pagination = $pag->viewPreviousPagination(); ?>

        <?php if( !$pag->isPreviousMinimum() ): ?>
            <a class="button" href='<?php echo $pag->generateLink($previous_pagination);?>'>
                Previous
            </a>
        <?php else:?>
            <a class="btn disabled">
                Previous
            </a>
        <?php endif; ?>
    </li>

    <li>
        <a class="btn disabled"><?php echo $pag->viewCurrentPagination(); ?> </a>
    </li>

    <li>
        <?php $next_pagination = $pag->viewNextPagination(); ?>

        <?php if( !$pag->isNextMax() ): ?>
            <a href="<?php echo $pag->generateLink($next_pagination);?>" class="button">
                Next
            </a>
        <?php else:?>
            <a class="button disabled">
                Next
            </a>
        <?php endif; ?>
    </li>

</ul>
