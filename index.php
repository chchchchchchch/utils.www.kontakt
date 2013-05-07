<html>
<head>
<title>What do you think?</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form class="email" action="submit.php" method="post">

<p>Name:</p>
<input type="text" name="name" />
<p>E-mail:</p>
<input type="text" name="email" />
<p>Subject:</p>
<input type="text" name="subject" />
<p>Message:</p>
<textarea name="message"></textarea></p>

<input class="send" type="submit" value="Send">

<p>IMPORTANT! To be able to proceed, you need to solve 
the following simple math (to make sure you are human) :-) </p>

<?php

 require("phpfiglet_class.php");

 $seeda = rand(1000000000,9999999999);
 $seedb = rand(1000000000,9999999999);

 // because the values are readable in the html source
 // we select one digit according to the value defined
 // in select_digit.php
 require("select_digit.php");

 $a = substr($seeda,$digit,1); 
 $b = substr($seedb,$digit,1) ; 

 $phpFiglet = new phpFiglet();

 echo "<pre>\r\n";
 if ($phpFiglet -> loadFont("fonts/standard.flf")) {
     $phpFiglet -> display("What is $a + $b ");
 } else {
    trigger_error("Could not load font file");
 }
 echo "</pre>\r\n";

 echo "<input name='a' value='$seeda' type='hidden' />\r\n";
 echo "<input name='b' value='$seedb' type='hidden' />\r\n";

?>

<input name="c" value="" type="text" />

</form>

</body>
</html>
