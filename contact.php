<?php 
if( isset( $_GET[ 'send_message' ] ) )
{
    $message = $_GET['message'];
    $message = wordwrap($message, 70);

    mail('kent.vejrup.madsen@outlook.com', $_GET['subject_matter'], $message, "from: sender@designermadsen.com");
}
?>

<?php require_once 'head.php'; ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="style.css">
        <title>
            Webshop
        </title>
    </head>
    <body>
        <?php require 'header.php'; ?>  
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
        <?php require 'footer.php'; ?>  
    </body>
</html>