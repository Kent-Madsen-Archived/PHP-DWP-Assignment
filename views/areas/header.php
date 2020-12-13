<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */
     $access = new AccessPrivilegesDomain();

     $b = BasketSessionSingleton::getBasket();
?>
<header> 
    <nav> 
        <a href="/homepage" 
           class="brand-logo">
            Logo 
        </a>

        <ul class="right hide-on-med-and-down"> 
            <li> 
                <a href="/shop"> 
                    Shop 
                </a>
            </li>

            <li>
                <a href="/product">
                    Products
                </a>
            </li>

            <li> 
                <a href="/news"> 
                    News 
                </a>
            </li>

            <li> 
                <a href="/about"> 
                    About 
                </a>
            </li>
            
            <li> 
                <a href="/contact"> 
                    Contact 
                </a>
            </li>

            <?php if( $access->is_logged_in() ): ?>
                <li> 
                    <a href="/profile"> 
                        Profile 
                    </a>
                </li>
            <?php endif; ?>

            <?php if( $access->is_logged_in() ): ?>
                <li> 
                    <a href="/checkout"> 
                        Checkout
                        <?php if(!is_null($b)):  ?>
                            <?php $v = $b->getSize(); ?>
                            <?php echo "<span class='new badge' data-badge-caption='wares'>{$v}</span>";?>
                        <?php endif;?>
                    </a>
                </li>
            <?php endif; ?>

            <?php if( $access->is_logged_in() ): ?>
                <li> 
                    <a href="/invoice"> 
                        Invoice
                    </a>
                </li>
            <?php endif; ?>

            <?php if( $access->isAdmin() ): ?>
                <li> 
                    <a href="/admin"> 
                        Admin
                    </a>
                </li>
            <?php endif; ?>

            <?php if( $access->is_logged_in() ): ?>
                <li> 
                    <a href="/logout"> 
                        Logout 
                    </a>
                </li>
            <?php endif; ?>
            
            <?php if( $access->is_not_logged_in() ): ?>
                <li> 
                    <a href="/login"> 
                        Login 
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </nav>
</header>