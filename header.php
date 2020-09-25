<header> 
    <nav> 
        <ul> 
            <li> 
                <a href="index.php"> 
                    Store
                </a>
            </li>
            
            <li> 
                <a href="index.php"> 
                    Products
                </a>
            </li>

            <li> 
                <a href="index.php"> 
                    News
                </a>
            </li>
            
            <li> 
                <a href="index.php"> 
                    Contact
                </a>
            </li>

            <?php if( logged_in() ):?>
                <li> 
                    <a href="index.php"> 
                        Backend
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