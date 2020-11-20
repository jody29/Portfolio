<?php

$mysqli = new mysqli("localhost", "jodylorist_nl_jodylorist", "________", "jodylorist_nl_jodylorist");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$name = $mysqli->real_escape_string($_REQUEST['name']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$message = $mysqli->real_escape_string($_REQUEST['message']);

 
// Attempt insert query execution
$sql = "INSERT INTO email (name, email, message) VALUES ('$name', '$email', '$message')";
if($mysqli->query($sql) === true){
    $feedback = "Bedankt voor uw bericht $name.\n Ik zal zo snel mogelijk contact met u opnemen";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

$email_to = 'jodylorist@hotmail.com';
$email_subject = "New Form submission";
$email_body = "You have received a new message from $name.\n" . "Here is the message:\n $message";

mail($email_to, $email_subject, $email_body, $email);

 
// Close connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact | Jody Lorist</title>
    <link rel="icon" href="icon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>
<body>
  <header>
      <nav>
          <ul>
              <li><a href="index.html">Portfolio</a></li>
              <li><a href="about.html">About </a></li>
              <li><a href="">JODY LORIST</a></li>
              <li><a href=""></a></li>
              <li><a href="contact.html">Contact</a></li>   
          </ul>
      </nav>
      
      
  </header>
  <main id="insertPage">
   
   <h1><?= $feedback ?></h1>
   <p>U wordt automatischd doorverwezen naar de contact pagina. <a href="contact.html">Klik hier</a> als dit niet gebeurd.</p>
   
   </main>
   
    
</body>
<script>

    setInterval( function() { window.location.href = "contact.html"; }, 4000)
    
</script>
</html>
