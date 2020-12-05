<?php

$router = RouterSingleton::getInstance()->getCurrentRoute();

$operation_value = $router->getValidationTree()[1]->getValue();
$id_value = $router->getValidationTree()[2]->getValue();

    $domain = new NewsDomain();

    $af = GroupNews::getArticleFactory();
    $pag = new FactoryPagination( $af );
    $pag->setBase('/news/pagination/');


    if ( is_null($id_value))
    {
        redirect_to_local_page( $pag->generateLink(1) );
    }
    else
    {
        $pagination = $id_value - 1;
    }

    $articles = $domain->retrieveArticlesAt($pagination, $af->getLimitValue());
?>

<h4>All Article</h4>

<?php
    foreach ( $articles as $article ):
?>
    <div>
        <h5> <?php echo $article->getTitle(); ?></h5>
        <p> <?php echo $article->getContent();?></p>
        <a class="button" href="<?php echo "/news/identity/{$article->getIdentity()}";?>">Read more</a>
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
            <a class="button disabled">
                Previous
            </a>
        <?php endif; ?>
    </li>

    <li>
        <a class="button disabled"><?php echo $pag->viewCurrentPagination(); ?> </a>
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
