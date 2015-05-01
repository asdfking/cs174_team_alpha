<?php

// class Teacher{

// private $id;
// private $first;
// private $last;

// public function getId(){ return $this->id; }
// public function getFirst(){ return $this->first; }
// public function getLast()  { return $this->last; }

// }

// $teacherId = filter_input(INPUT_POST, 'id');
// if ($teacherId == 0) return;

$carmake = filter_input(INPUT_POST, 'make');
$carmodel  = filter_input(INPUT_POST, 'model');
$caryear = filter_input(INPUT_POST, 'year');
$carid  = filter_input(INPUT_POST, 'id');
$carcolor = filter_input(INPUT_POST, 'color');
$carimage = filter_input(INPUT_POST, 'image');

// $carmake = filter_input(INPUT_GET, "make");
// $carmodel  = filter_input(INPUT_GET, "model");
// $caryear = filter_input(INPUT_GET, "year");
// $carid  = filter_input(INPUT_GET, "id");
// $carcolor = filter_input(INPUT_GET, "color");

$output = "";

if (filter_has_var(INPUT_GET, "hybrid")) {
$output .= "<h1><strong>Hybrid </strong>";}

if (filter_has_var(INPUT_GET, "sport")) {
$output .= "<strong>Sporty </strong>";}

if (filter_has_var(INPUT_GET, "luxury")) {
$output .= "<strong>Luxurious </strong>";}

if (filter_has_var(INPUT_GET, "economic")) {
$output .= "<strong>Economic</strong></h1>";}

$query = "SELECT dmv.make, dmv.model, dmv.color, dmv.year, dmv.id, owner.name, owner.age, owner.address, owner.phone, accident.accidentid, accident.description FROM dmv, owner, accident where owner.id = accident.id and dmv.id = owner.id"; //Standard query

//This code block enables the user to search for one or more features of a car.
if ((strlen($carmake) > 0) || (strlen($carmodel) > 0) || (strlen($caryear) > 0) || (strlen($carid) > 0) || (strlen($carcolor) > 0))
{
$query = "SELECT * FROM dmv, owner, accident where owner.id = accident.id and dmv.id = owner.id";
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
echo "Your search returned no results.";
//echo $query; // DEBUG ONLY; REMOVE AFTER!
}  
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

$query = "SELECT dmv.make, dmv.model, dmv.color, dmv.year, dmv.id, owner.name, owner.age, owner.address, owner.phone FROM dmv, owner where owner.id = dmv.id "; //Standard query
//$query = "SELECT * FROM dmv, owner where owner.id = dmv.id "; //Standard query
$query .= " AND ";
//This code block enables the user to search for one or more features of a car.
if ((strlen($carmake) > 0) || (strlen($carmodel) > 0) || (strlen($caryear) > 0) || (strlen($carid) > 0) || (strlen($carcolor) > 0))
{
$query = "SELECT * FROM dmv, owner where owner.id = dmv.id and "; //Standard query

$andString = " AND ";
$multiplesettings = 0; // to know if we have to use "AND"
if(strlen($carmake) > 0){$query .= "make = '$carmake'"; $multiplesettings = 1;}
if(strlen($carmodel) > 0){if($multiplesettings){ $query .= " AND model = '$carmodel'";}else{$query .= "model = '$carmodel'"; $multiplesettings = 1;}}
if(strlen($caryear) > 0){if($multiplesettings){ $query .= " AND year = '$caryear'";}else{$query .= "year = '$caryear'"; $multiplesettings = 1;}}
if(strlen($carid) > 0){if($multiplesettings){ $query .= " AND dmv.id = '$carid'";}else{$query .= "dmv.id = '$carid'"; $multiplesettings = 1;}}
if(strlen($carcolor) > 0){if($multiplesettings){ $query .= " AND color = '$carcolor'";}else{$query .= "color = '$carcolor'"; $multiplesettings = 1;}}
$query .= " AND ";
//$query .= " AND owner.id = '$carid' ";
}  //end if

$query .= "dmv.id not in (SELECT accident.id FROM dmv, accident where dmv.id = accident.id)";
$query .= ";";

try {
$con = new PDO("mysql:host=localhost;dbname=cs174_hw1", "root", "qwerty");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $con->query($query);
//checking if we got any results from the query

if($result->rowCount() == 0) {
echo "Your search returned no results.";
//echo $query; // DEBUG ONLY; REMOVE AFTER!
}  
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
echo 'ERROR: '.$ex->getMessage();
}
//echo $query; // DEBUG ONLY; REMOVE AFTER!
?>