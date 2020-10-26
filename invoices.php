<?php require_once 'meta/main.php'; ?>

<html <?php language('en'); ?> >
    <head>
        <?php $Title->insertAppendice('Invoices'); ?>
        <?php require_once 'meta/head.php'; ?>
    </head>
    <body>
        <?php require 'meta/header.php'; ?>  
        <main>
            <?php 
                    $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');
                    $sql = "SELECT * FROM invoice where profile_id=". $_SESSION['profile_user_identity'] . ";";
                    $result = $connection->query($sql);
                ?>

                <?php
                    if ( $result->num_rows > 0 ): ?>
                        <?php while( $row = $result->fetch_assoc() ): ?> 
                            <div>
                                <p> Invoice id: <?php echo $row['identity']; ?> </p>
                                <p> Total: <?php echo $row['total']; ?> dkr. </p>
                              
                                </div>   
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php 
                    $connection->close();
                ?>            
        </main>
        <?php require 'meta/footer.php'; ?>
    </body>
</html>