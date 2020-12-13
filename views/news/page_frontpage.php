<?php

$domain = new NewsDomain();

$articles = $domain->retrieveArticlesOrderedByCreationAt(0, 8);
?>

<h4>Latest Articles</h4>

<?php if( !is_null( $articles ) ): ?>
    <?php
        foreach ( $articles as $article ):
    ?>
        <div>
            <h5> <?php echo $article->getTitle(); ?></h5>
            <p> <?php echo $article->getContent();?></p>
            <a href="<?php echo "/news/identity/{$article->getIdentity()}";?>" class="button">Read Article</a>
        </div>
    <?php
        endforeach;
    ?>
<?php endif; ?>

<div class="view">
    <a class="button" href="/news/pagination">
        More articles
    </a>
</div>