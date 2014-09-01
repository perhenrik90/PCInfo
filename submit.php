<!DOCTYPE html>
<html>
<head>
   <meta charset="utf8"></meta>
   <link type="text/css" rel="stylesheet" href="main.css"></link>
   <?php
   include("config.php");
   $loaded = include("lang/$lang.php");
   if(!$loaded){ include("lang/en.php");}
?>
</head>

<body>
<?php
  /*************************************
   * Submit and sendmail to endpoint
   * @author Per-Henrik Kvalnes
   ************************************/

/** setup language strings **/
$nameString = $_lang["name"];
$emailString =$_lang["email"];
$osString = $_lang["os"];
$browserString = $_lang["browser"];
$screenString = $_lang["screen"];
$flashString = $_lang["flash"];

/** set up post parameters **/
$os = $_POST["os"];
$browser = $_POST["browser"];
$screen = $_POST["screen"];
$flash = $_POST["flash"];

$name = $_POST["name"];
$fromMail =  $_POST["email"];


/***********************
 * Generate mail body 
 **********************/
$mailBody = "<html><body>";
$mailBody .= "<h2>Klient info for $name</h2>";
$mailBody .= "<table>";

$mailBody .= "<tr>";
$mailBody .= "<td>$nameString</td>";
$mailBody .= "<td>$name</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>$emailString</td>";
$mailBody .= "<td>$fromMail</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>$osString</td>";
$mailBody .= "<td>$os</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>$browserString</td>";
$mailBody .= "<td>$browser</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>$screenString</td>";
$mailBody .= "<td>$screen</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>$flashString</td>";
$mailBody .= "<td>$flash</td>";
$mailBody .= "</tr>";

$mailBody .= "</table>";
$mailBody .= "</body></html>";

/*************************
 * Setup and send mail
 *************************/

$headers = "From: " . strip_tags($fromMail) . "\r\n";
$headers .= "Reply-To: ". strip_tags($fromMail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf8\r\n";
$mailTo = $config["sendto"];

mail($mailTo, "Client info for $name", $mailBody, $headers);

/************************
 * Display sendt mail
 ************************/
$sendtmail = $_lang["mailsendt"];
echo "<h1>$sendtmail</h1>";
echo "<div id='viewMail'>";
echo $mailBody;
echo "</div>";
?>
</div>
</form>

<?php
  /** create escape button **/
$backLink = $config["escapesite"];
$backName = $config["escapename"];
echo "<a href='$backLink'><p id='backLink'>$backName</p></a>";
?>

</body>
</html>