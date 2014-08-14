<!DOCTYPE html>
<html>
<head>
   <meta charset="utf8"></meta>
   <link type="text/css" rel="stylesheet" href="main.css"></link>
   <script src="updateinfo.js"></script>
   <?php
   include("config.php");
   include("lang/no-nb.php");
?>
</head>

<body onload="updatePCInfo();">
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

<!-- Computer information -->
<div class="inputRegion">
     <p><?php echo $_lang["browser"];?></p>
     <input name="browser" id="browser"></input>
</div>
<div class="inputRegion">
     <p><?php echo $_lang["os"];?></p>
     <input name="os" id="os"></input>
</div>
<div class="inputRegion">
     <p><?php echo $_lang["screen"];?></p>
     <input name="screen" id="screen"></input>
</div>
     <input type="submit"></input>
</form>

</body>
</html>