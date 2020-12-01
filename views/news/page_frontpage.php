<?php

$domain = new NewsDomain();

$articles = $domain->retrieveArticlesAt(0, 5);

?>

<h4>Latest</h4>

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

<a class="btn" href="/news/pagination">
    More
</a>