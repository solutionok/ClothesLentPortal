<?php
$omari = "";

if ($omari != "omari") { 
      $name = $_POST['name'];
      $email = "info@rentassuit.ca";
      $ToEmail = 'omarilamar@gmail.com';
      $EmailSubject = "Item Added"; 
      $mailheader = "From: ".$_POST["email"]."\r\n"; 
      $mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
      $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
      $MESSAGE_BODY .= "Email: ".$_POST["email"]."<br>"; 
      $MESSAGE_BODY .= "Subject:".$_POST['subject']."<br />";  
      $MESSAGE_BODY .= "picture: ".$_POST["picture"]."<br>";
$MESSAGE_BODY .= "Name: ".$_POST["name"]."<br>";
$MESSAGE_BODY .= "Retail Price: ".$_POST["retail_price"]."<br>";
$MESSAGE_BODY .= "Price: ".$_POST["price"]."<br>";
$MESSAGE_BODY .= "Price Week: ".$_POST["price_week"]."<br>";
$MESSAGE_BODY .= "File: ".$_POST["file"]."<br>";
$MESSAGE_BODY .= "Color: ".$_POST["color"]."<br>";
$MESSAGE_BODY .= "Size: ".$_POST["size"]."<br>";
$MESSAGE_BODY .= "Categories: ".$_POST["categories"]."<br>";
$MESSAGE_BODY .= "Alterations: ".$_POST["alteration"]."<br>";
$MESSAGE_BODY .= "Condition: ".$_POST["condition"]."<br>";
$MESSAGE_BODY .= "Season: ".$_POST["season"]."<br>";
$MESSAGE_BODY .= "Description: ".$_POST["description"]."<br>";
$MESSAGE_BODY .= "Designer: ".$_POST["designer"]."<br>";
$MESSAGE_BODY .= "Canellation: ".$_POST["cancellation"]."<br>";
      if(mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader))
      {
      echo "<script>alert('Thanks Item will be added !');</script>";
      echo "<script>document.location.href='https://rentasuit.ca/dev/public/for-rent/post-an-item'</script>";
      }
      else
      {
      echo "<script>alert('Mail was not sent. Please try again later');</script>";
      }
     }