<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <link rel="shortcut icon" href="http://files.softicons.com/download/transport-icons/car-icon-by-nishad2m8/ico/Car.ico">
    <link rel="stylesheet" type="text/css" href="layout.css" media="screen"/>
    <script src="carAnimation.js"></script> 
    <title>Document</title>

    
  </head>
  <body onload = "init()">
    <h1 align="center">The car you're looking for is in the table and has these features:</h1>

    <canvas id = "mov"
	    height = "200"
	    width = "1000"
	    <p> Canvas not supported!</p>
</canvas>

<p>
  <?php
     $carmake = filter_input(INPUT_GET, "make");
     $carmodel  = filter_input(INPUT_GET, "model");
     $caryear = filter_input(INPUT_GET, "year");
     $carid  = filter_input(INPUT_GET, "id");
     $carcolor = filter_input(INPUT_GET, "color");
     $output = "";

     if (filter_has_var(INPUT_GET, "hybrid")) {
     $output .= "<h1><strong>Hybrid </strong>";}

     if (filter_has_var(INPUT_GET, "sport")) {
     $output .= "<strong>Sporty </strong>";}

     if (filter_has_var(INPUT_GET, "luxury")) {
     $output .= "<strong>Luxurious </strong>";}

     if (filter_has_var(INPUT_GET, "economic")) {
     $output .= "<strong>Economic</strong></h1>";}
     
     $query = "SELECT * FROM dmv, owner, accident where owner.id = accident.id and dmv.id = owner.id"; //Standard query
     
     //This code block enables the user to search for one or more features of a car.
     if ((strlen($carmake) > 0) || (strlen($carmodel) > 0) || (strlen($caryear) > 0) || (strlen($carid) > 0) || (strlen($carcolor) > 0))
      {
      //$query .= " WHERE ";
      $andString = " AND ";
      $multiplesettings = 0; // to know if we have to use "AND"
      $query .= " AND ";
      if(strlen($carmake) > 0){$query .= "make = '$carmake'"; $multiplesettings = 1;}
      if(strlen($carmodel) > 0){if($multiplesettings){ $query .= " AND model = '$carmodel'";}else{$query .= "model = '$carmodel'"; $multiplesettings = 1;}}
      if(strlen($caryear) > 0){if($multiplesettings){ $query .= " AND year = '$caryear'";}else{$query .= "year = '$caryear'"; $multiplesettings = 1;}}
      if(strlen($carid) > 0){if($multiplesettings){ $query .= " AND dmv.id = '$carid'";}else{$query .= "dmv.id = '$carid'"; $multiplesettings = 1;}}
      if(strlen($carcolor) > 0){if($multiplesettings){ $query .= " AND color = '$carcolor'";}else{$query .= "color = '$carcolor'"; $multiplesettings = 1;}}
      //$query .= " AND owner.id = '$carid'";
      
      }  //end if 
      $query .= ";";
      
      try {
      $con = new PDO("mysql:host=localhost;dbname=cs174_hw1", "root", "qwerty");
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $result = $con->query($query);
      //checking if we got any results from the query

      if($result->rowCount() == 0) { 
      echo "Your search returned no results.";}
      else{
      //We got results; print them!
      echo $output;
      $row = $result->fetch(PDO::FETCH_ASSOC);
      print "<table border='1'>\n";
	// Construct the header row of the HTML table.
	print "            <tr>\n";
	  foreach ($row as $field => $value) {
	  print "                <th>$field</th>\n";}  
	  print "            </tr>\n";

	// Fetch the matching database table rows.
	$data = $con->query($query);
	$data->setFetchMode(PDO::FETCH_ASSOC);

	foreach ($data as $row)
	{
	print "            <tr>\n";
	  foreach ($row as $name => $value) 
	  {
	  print "<td>$value</td>\n";}	
	  print "            </tr>\n";
	}  //end for loop
	print "        </table>\n";
      }  //end for loop
      }  //end try
      catch(PDOException $ex) {
      echo 'ERROR: '.$ex->getMessage();}
      
      $query = "SELECT * FROM dmv, owner where owner.id = dmv.id "; //Standard query
      $query .= " AND ";
      //This code block enables the user to search for one or more features of a car.
      if ((strlen($carmake) > 0) || (strlen($carmodel) > 0) || (strlen($caryear) > 0) || (strlen($carid) > 0) || (strlen($carcolor) > 0))
      {
      
      $andString = " AND ";
      $multiplesettings = 0; // to know if we have to use "AND"
      if(strlen($carmake) > 0){$query .= "make = '$carmake'"; $multiplesettings = 1;}
      if(strlen($carmodel) > 0){if($multiplesettings){ $query .= " AND model = '$carmodel'";}else{$query .= "model = '$carmodel'"; $multiplesettings = 1;}}
      if(strlen($caryear) > 0){if($multiplesettings){ $query .= " AND year = '$caryear'";}else{$query .= "year = '$caryear'"; $multiplesettings = 1;}}
      if(strlen($carid) > 0){if($multiplesettings){ $query .= " AND dmv.id = '$carid'";}else{$query .= "dmv.id = '$carid'"; $multiplesettings = 1;}}
      if(strlen($carcolor) > 0){if($multiplesettings){ $query .= " AND color = '$carcolor'";}else{$query .= "color = '$carcolor'"; $multiplesettings = 1;}}
      $query .= " AND ";
      //$query .= " AND owner.id = '$carid'";
      }  //end if
      $query .= "dmv.ID not in (SELECT dmv.ID FROM dmv, owner, accident where owner.id = accident.id AND dmv.id = owner.id)";
      $query .= ";";
      
      try {
      $con = new PDO("mysql:host=localhost;dbname=cs174_hw1", "root", "qwerty");
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $result = $con->query($query);
      //checking if we got any results from the query

      if($result->rowCount() == 0) { 
      echo "Your search returned no results.";}
      else{
      //We got results; print them!
      echo $output;
      $row = $result->fetch(PDO::FETCH_ASSOC);
      print "<table border='1'>\n";
	// Construct the header row of the HTML table.
	print "            <tr>\n";
	  foreach ($row as $field => $value) {
	  print "                <th>$field</th>\n";}  
	  print "            </tr>\n";
	
	// Fetch the matching database table rows.
	$data = $con->query($query);
	$data->setFetchMode(PDO::FETCH_ASSOC);

	foreach ($data as $row)
	{
	print "            <tr>\n";
	  foreach ($row as $name => $value) 
	  {
	  print "<td>$value</td>\n";}	
	  print "            </tr>\n";
	}  //end for loop
	print "        </table>\n";
      }  //end for loop
      }  //end try
      catch(PDOException $ex) {
      echo 'ERROR: '.$ex->getMessage();}  
      ?>
</p>

<style>
  h1{
  color:white;
  }
</style>

</body>
</html>
