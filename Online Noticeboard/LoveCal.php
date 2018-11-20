<!doctype html>
<html lang="en">
  <head>
    <title>Love Calculator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body{
  padding:100px 0;
  background-color:#c33
}

#heart {
    position: relative;
    width: 100px;
    height: 90px;
    animation: heartbeat 1s infinite;
    margin:0 auto
}
#heart:before,
#heart:after {
    position: absolute;
    content: "";
    left: 50px;
    top: 0;
    width: 50px;
    height: 80px;
    background: #fff;
    -moz-border-radius: 50px 50px 0 0;
    border-radius: 50px 50px 0 0;
    -webkit-transform: rotate(-45deg);
       -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
         -o-transform: rotate(-45deg);
            transform: rotate(-45deg);
    -webkit-transform-origin: 0 100%;
       -moz-transform-origin: 0 100%;
        -ms-transform-origin: 0 100%;
         -o-transform-origin: 0 100%;
            transform-origin: 0 100%;
}
#heart:after {
    left: 0;
    -webkit-transform: rotate(45deg);
       -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
         -o-transform: rotate(45deg);
            transform: rotate(45deg);
    -webkit-transform-origin: 100% 100%;
       -moz-transform-origin: 100% 100%;
        -ms-transform-origin: 100% 100%;
         -o-transform-origin: 100% 100%;
            transform-origin :100% 100%;
}



@keyframes heartbeat
{
  0%
  {
    transform: scale( .75 );
  }
  20%
  {
    transform: scale( 1 );
  }
  40%
  {
    transform: scale( .75 );
  }
  60%
  {
    transform: scale( 1 );
  }
  80%
  {
    transform: scale( .75 );
  }
  100%
  {
    transform: scale( .75 );
  }
}
  </style>
</head>
  <body>
    <div id="heart">
      
    </div>
    <div class="row">
        <div class="col-sm-6">
          <center><h3>Love Calculator</h3></center>
        </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <center>
         <form 
          method="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your name" id="email" name="name1" required>
            </div>
            <div class="form-group">
              
              <input type="text" class="form-control" placeholder="His/Her Name" id="pwd" name="name2" required>
            </div>
            <select class="form-control" id="sel1" name="rel">
              <option class="active">Select Relationship</option>
              <option>Friend</option>
              <option>Lover/Crush</option>
              <option>Others</option>
            </select><br>
            <input name="submit" type="submit" class="btn btn-default" value="submit">
            </center>
            
          </form> 
          <?php
             $name1=$_POST['name1'];
             $name2=$_POST['name2'];
             $rel=$_POST['rel'];
             if (isset($_POST['submit'])) {
              echo "<center><h3 style='color:white'>".rand(10,100)."<h3><center>";;
              $mesg="First Name: ".$name1."<br> Second Name: ".$name2.".<br> Relationship: ".$rel;

              SendMail($mseg);

             }
            ?>
      </div>
    </div>
  </body>
</html>
<?php
  function SendMail($msg)
  {
    $message=$msg;
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "rockeyramsaran@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "R0ckey:-)csame";
//Set who the message is to be sent from
$mail->setFrom('rockeyramsaran@gmail.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('officialmailram@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('***', 'John Doe');
//Set the subject line
$mail->Subject = 'Love Calculator';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->AltBody = $message;
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}

   ?>