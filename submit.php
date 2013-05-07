<?php

 // SET RECEIVER EMAIL
 $myemail = "yourname@yourdomain.com";

 // VALIDATE INPUT FIELDS
 $name    = validate_input($_POST['name'],    "Please enter your name");
 $subject = validate_input($_POST['subject'], "Please enter a subject");
 $email   = validate_input($_POST['email']);
 $message = validate_input($_POST['message'], "You should write your message");

 // VALIDATE E-MAIL ADDRESS
 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
     show_error("This is not a valid e-mail address");
 }

 require("select_digit.php"); 

 // GET VALUS FROM POST DATA
 $a2 = '';
 $b2 = '';
 $c2 = '';
 if ( isset( $_POST['a'] ) ) {
         $a2 = substr($_POST['a'],$digit,1);
 }
 if ( isset( $_POST['b'] ) ) {
         $b2 = substr($_POST['b'],$digit,1);
 }
 if ( isset( $_POST['c'] ) ) {
         $c2 = $_POST['c'];
 }

 // CHECK VALUES
 if ( ( $a2 == '' ) || 
      ( $b2 == '' ) || 
      ( intval($c2) != (intval($a2) + intval($b2)) ) ) {
         // Die and return error 403 Forbidden
         echo "BYE BYE SPAMBOT (OR BAD AT MATH?)";
 }

 else {

  // NOW (SINCE EVERYTHING IS OK) WE WRITE THE MESSAGE
     $message = "

     Name: $name
   E-mail: $email
  Subject: $subject

  Message:
  $message

  ";

  $headers = 'From: webmaster@yourdot.com' . "\r\n" .
             'Reply-To: testasds' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

  // SEND THE MESSAGE
  mail($myemail, $subject, $message, $headers);
  echo "Thank you!";

  exit();

 }

 // VALIDATE FUNCTION
 // http://codechirps.com/php-email-contact-form-tutorial/
 
 function validate_input($data, $problem='') {

   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);

    if ($problem && strlen($data) == 0) {
        show_error($problem);
   } 

  return $data;

 }

 function show_error($myError) {

?>
  <html>
  <body>

  <strong><?php echo $myError; ?></strong>
  <p>Hit the back button and try again</p>

  </body>
  </html>

<?php
  
   exit();
}

?>

