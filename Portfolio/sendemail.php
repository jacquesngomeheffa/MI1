  <script type="text/javascript">
      function RedirectionJavascript(){
        document.location.href="contact.php";
      }
   </script>
     <body onLoad="setTimeout('RedirectionJavascript()', 2000)">
<?php
if(isset($_POST['submit'])){
	
    $name = ($_POST['name']); 
    $email = ($_POST['email']); 
    $subject = ($_POST['subject']); 
    $message = ($_POST['message']); 

    $email_from = $email;
    $email_to = 'bucmotor16@yahoo.fr';

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    mail($email_to, $subject, $body);
print'Votre message a bien été envoyé'; }else{
	header('location: contact.php');
	exit(0);
}
    ?>
  
    
    </body> 