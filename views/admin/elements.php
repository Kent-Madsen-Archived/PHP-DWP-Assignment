<h4>Elements</h4>

<a href="/admin/elements/create" class="button">
    Create
</a>

<?php

if( isset( $operation_value ) )
{
    if( $operation_value == 'create' )
    {
        include 'views/admin/elements/create.php';
    }

    if( $operation_value == 'delete' )
    {
        include 'views/admin/elements/delete.php';
    }

    if( $operation_value == 'update' )
    {
        include 'views/admin/elements/update.php';
    }
}

$domain = new PageDomain();
$elements = $domain->retrievePageElements();
if(!is_null($elements)):
?>
<div>
    <?php foreach ($elements as $current_element): ?>
    <div>
        <?php if ($current_element instanceof PageElementModel): ?>
            <?php $id = $current_element->getIdentity(); ?>
            <h5><?php echo $current_element->getTitle(); ?></h5>
            <p><?php echo $current_element->getAreaKey(); ?></p>
            <p><?php echo $current_element->getCreatedOn(); ?></p>

            <div>
                <a class="button" href='<?php echo "/admin/elements/update/{$id}"; ?>'>Update</a>
                <a class="button" href='<?php echo "/admin/elements/delete/{$id}"; ?>'>Delete</a>
                <a class="button">View Element</a>
            </div>
        <?php endif;?>
    </div>
    <?php endforeach; ?>
</div>

<?php
endif;
?>
