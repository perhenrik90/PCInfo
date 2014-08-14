<!DOCTYPE html>
<html>
<head>
   <META http-equiv=Content-Type content="text/html; charset=utf-8"></meta>
   <link type="text/css" rel="stylesheet" href="main.css"></link>
   <script src="updateinfo.js"></script>
   <?php
   include("config.php");
   include("lang/no-nb.php");
?>
</head>

<body onload="updatePCInfo();">
<h1><?php echo $_lang["header"];?></h1>

<div id="blanket">

<form method="post" action="submit.php">
<div class="inputRegion">
     <p><?php echo $_lang["name"];?></p>
     <input name="name"></input>
</div>

<div class="inputRegion">
     <p><?php echo $_lang["email"];?></p>
     <input name="email"></input>
</div>

<!-- Computer information -->
<div class="inputRegion">
     <p><?php echo $_lang["browser"];?></p>
     <input name="browser" id="browser" readonly></input>
</div>

<div class="inputRegion">
     <p><?php echo $_lang["os"];?></p>
     <input name="os" id="os" readonly></input>
</div>

<div class="inputRegion">
     <p><?php echo $_lang["screen"];?></p>
     <input name="screen" id="screen" readonly></input>
</div>
<div class="inputRegion">
     <p><?php echo $_lang["flash"];?></p>
     <input name="flash" id="flash" readonly></input>
</div>
<div class="inputRegion">
     <p><?php echo $_lang["cookie"];?></p>
     <input name="cookie" id="cookie" readonly></input>
</div>
<div class="inputRegion">
     <p><?php echo $_lang["comment"];?></p>
     <textarea name="comment" id="comment"></textarea>
</div>
<div class="inputRegion">
     <input type="submit" id="submit"
     value=<?php echo "\"".$_lang["submit"]."\"";?>></input>
</div>

</form>
</div>

</body>
</html>