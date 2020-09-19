<header> 
    <nav> 
        <ul> 
            <li> 
                <a href="index.php"> Home </a> 
            </li>
            
            <?php if( is_logged_in() ): ?>
                <li>  
                    <a href="upload.php"> Upload </a>
                </li>

                <li>
                    <a href="gallery.php"> Galleri </a>
                </li>
            <?php endif; ?>

            <?php if( is_logged_in() ): ?>
                <li>
                    <a href="logout.php"> Log ud. </a>
                </li>
            <?php endif; ?>

            <?php if( !is_logged_in() ): ?>
            <li>  
                <a href="login.php"> Min profil </a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>