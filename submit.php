<!DOCTYPE html>
<html>
<head>
   <META http-equiv=Content-Type content="text/html; charset=utf-8"></meta>
   <link type="text/css" rel="stylesheet" href="main.css"></link>
   <?php
   include("config.php");
   $lang = $config["lang"];
   $loaded = include("lang/$lang.php");
   if(!$loaded){ include("lang/en.php");}
?>
</head>

<body>
<img id="logo" src=<?php echo $config["logo"];?>></img>
<?php
  /*************************************
   * Submit and sendmail to endpoint
   * @author Per-Henrik Kvalnes
   ************************************/



/** setup language strings **/
$nameString = $_lang["name"];
$emailString =$_lang["email"];
$emailHeaderString = $_lang["mailheader"];
$osString = $_lang["os"];
$browserString = $_lang["browser"];
$screenString = $_lang["screen"];
$flashString = $_lang["flash"];
$commentString = $_lang["comment"];
$cookieString = $_lang["cookie"];

/** set up post parameters **/
$os = $_POST["os"];
$browser = $_POST["browser"];
$screen = $_POST["screen"];
$flash = $_POST["flash"];
$cookie = $_POST["cookie"];
$comment = $_POST["comment"];

$name = $_POST["name"];
$fromMail =  $_POST["email"];

/** check if provided emails are valid **/
if (!filter_var($emailString, FILTER_VALIDATE_EMAIL)) 
{
   // Email is not valid... How should we fail?
   echo "Email entered in config file is not a valid email.";
   die;
}
if (!empty($fromMail) && !filter_var($fromMail, FILTER_VALIDATE_EMAIL)) 
{
   // Email is not valid... How should we fail?
   echo "The 'from' email du entered is not a valid email.";
   die;
}

/***********************
 * Generate mail body 
 **********************/
$mailBody = "<html><body>";
$mailBody .= "<h2>" . htmlspecialchars($emailHeaderString) . " " . htmlspecialchars($name) . "</h2>";
$mailBody .= "<table>";

$mailBody .= "<tr>";
$mailBody .= "<td>" . htmlspecialchars($nameString) . "</td>";
$mailBody .= "<td>" . htmlspecialchars($name) . "</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>" . htmlspecialchars($emailString) . "</td>";
$mailBody .= "<td>" . htmlspecialchars($fromMail) . "</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>" . htmlspecialchars($osString) . "</td>";
$mailBody .= "<td>" . htmlspecialchars($os) . "</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>" . htmlspecialchars($browserString) . "</td>";
$mailBody .= "<td>" . htmlspecialchars($browser) . "</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>" . htmlspecialchars($screenString) . "</td>";
$mailBody .= "<td>" . htmlspecialchars($screen) . "</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>" . htmlspecialchars($flashString) . "</td>";
$mailBody .= "<td>" . htmlspecialchars($flash) . "</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>" . htmlspecialchars($cookieString) . "</td>";
$mailBody .= "<td>" . htmlspecialchars($cookie) . "</td>";
$mailBody .= "</tr>";

$mailBody .= "<tr>";
$mailBody .= "<td>" . htmlspecialchars($commentString) . "</td>";
$mailBody .= "<td>" . htmlspecialchars($comment) . "</td>";
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

mail($mailTo, "$emailHeaderString $name", $mailBody, $headers);

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