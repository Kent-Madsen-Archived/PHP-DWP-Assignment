<?php

$router = RouterSingleton::getInstance()->getCurrentRoute();

$operation_value = $router->getValidationTree()[1]->getValue();
$id_value = $router->getValidationTree()[2]->getValue();

$domain = new NewsDomain();

$article = $domain->retrieveArticleById( $id_value );

if( !is_null( $article->getIdentity() ) )
{

}
?>

<h4>Article</h4>
<h5>
    <?php echo $article->getTitle();?>
</h5>
<p>
    <?php echo $article->getContent();?>
</p>