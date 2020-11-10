<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

     $access = new AccessPrivileges(); 
?>
<header> 
    <nav> 
        <a href="./homepage" 
           class="brand-logo">
            Logo 
        </a>

        <ul class="right hide-on-med-and-down"> 
            <li> 
                <a href="./about"> 
                    About 
                </a>
            </li>
            
            <li> 
                <a href="./shop"> 
                    Shop 
                </a>
            </li>
            
            <li> 
                <a href="./contact"> 
                    Contact 
                </a>
            </li>

            <?php if( $access->is_logged_in() ): ?>
                <li> 
                    <a href="./checkout"> 
                        Checkout 
                    </a>
                </li>
            <?php endif; ?>
            
            <?php if( $access->is_logged_in() ): ?>
                <li> 
                    <a href="./profile"> 
                        Profile 
                    </a>
                </li>
            <?php endif; ?>
            
            <?php if( !$access->is_logged_in() ): ?>
                <li> 
                    <a href="./login"> 
                        Login 
                    </a>
                </li>
            <?php endif; ?>

            <?php if( $access->is_logged_in() ): ?>
                <li> 
                    <a href="./logout"> 
                        Logout 
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>