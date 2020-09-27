<header> 
    <nav> 
        <ul> 
            <li> 
                <a href="index.php"> 
                    Store
                </a>
            </li>
            
            <li> 
                <a href="products.php"> 
                    Products
                </a>
            </li>

            <li> 
                <a href="news.php"> 
                    News
                </a>
            </li>
            
            <li> 
                <a href="contact.php"> 
                    Contact
                </a>
            </li>

            <?php if( !logged_in() ):?>
            <li> 
                <a href="login.php"> 
                    Login
                </a>
            </li>
            <?php endif; ?>

            <?php if( logged_in() ):?>
                <li> 
                    <a href="index.php"> 
                        Backend
                    </a>
                </li>

                <li> 
                    <a href="checkout.php"> 
                        Checkout
                    </a>
                </li>

                <li> 
                    <a href="__logout__.php"> 
                        Logout
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>       
</header>