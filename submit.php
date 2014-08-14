<!DOCTYPE html>
<html>
<head>
   <meta charset="utf8"></meta>
   <link type="text/css" rel="stylesheet" href="main.css"></link>
   <?php
   include("config.php");
   include("lang/no-nb.php");
?>
</head>

<body>
<h1><?php echo $_lang["header"];?></h1>

<form method="post" action="submit.php">
<div class="inputRegion">
     <p><?php echo $_lang["name"];?></p>
     <input name="name"></input>
</div>
<div class="inputRegion">
     <p><?php echo $_lang["email"];?></p>
     <input name="name"></input>
</div>
<div class="inputRegion">
     <p></p>
     <input name="name"></input>
</div>
</form>
</body>
</html>