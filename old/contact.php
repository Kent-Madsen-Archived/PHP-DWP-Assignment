<?php require_once 'meta/main.php'; ?>

<?php 
if( isset( $_GET[ 'send_message' ] ) )
{
    $message = $_GET['message'];
    $message = wordwrap($message, 70);

    mail('kent.vejrup.madsen@outlook.com', $_GET['subject_matter'], $message, "from: sender@designermadsen.com");
}
?>

<html <?php language('en'); ?> >
    <head>
        <?php $Title->insertAppendice('Contact us'); ?>
        <?php require_once 'meta/head.php'; ?>
    </head>
    <body>
        <?php require 'meta/header.php'; ?>  
        <main>
            <h2> Tak fordi at du vil bruge vores site </h2>
            <p> Vi er åben overfor spørgsmål</p>
              <form class="contact-form"> 
                <span> 
                    <input class="input" type="text" name="subject_matter" id ="contact_subject" placeholder="subject matter">
                    <input class="input" type="text" name="message" id ="contact_message" placeholder="message">
                </span>
                <span> 

                    <input type="submit" value="send" name="send_message" class="button">
                <span>
              </form>  
        </main>
        <?php require 'meta/footer.php'; ?>  
    </body>
</html>