<?php 

/*
// TEACHER'S DOOR SUPER SIMULATOR
// Version 0.9

// It's like virtual reality, except instead of being able to fly
// and meet dinosaurs, you get to have your students sign up for OH.
// Welcome to THE FUTURE!

// See readme.md for instructions

// By GARRETT DASH NELSON, garrettnelson@post.harvard.edu

// Released on a "make it better, problems aren't my fault" freeware license.
// Or, if you're being technical, GPL v2 
*/


// ini_set('display_errors', 'On');
// error_reporting(E_ALL);




require_once("settings.php");

$update_at = date('Y-m-d',strtotime("last $update_day")) . " 23:59:59";

mysql_connect($mysql_server, $mysql_user, $mysql_password) or die(mysql_error());
mysql_select_db($mysql_database) or die(mysql_error());



if (!$pause_updating) { 

$reset_query_check = "SELECT value FROM $mysql_meta_table WHERE variable='last_update'";
$reset_result_check = mysql_query($reset_query_check) or die("ERROR!");

if(strtotime(mysql_result($reset_result_check,0,"value")) < strtotime($update_at)) {

mysql_query("UPDATE $mysql_hours_table SET name='FREE' WHERE 1");
mysql_query("UPDATE $mysql_meta_table SET value=now() WHERE 1"); 

}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $teacher_name; ?>'s Office Hours Signups</title>
	
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<style type="text/css">
	@import url(http://fonts.googleapis.com/css?family=Belgrano);
	
	body { font-family: "Belgrano",Palatino,serif; font-size: 1.6em; color: #092B33; background-color: <?php echo $background_color; ?>; padding: 1.0em 4.0em; }
	.hour_input { display: none; float: right; }
	.hour_holder { width: 500px; clear: both; }
	.hour_name { float: left; margin-bottom: 15px; color: #453012; }
	.hour_person { float: right; margin-bottom: 15px; color: #192c1e; }
	.input_box { height: 1.0em; font-family: "Belgrano",Palatino,serif; font-size: 0.6em; text-align: right; }
	
	h1 { font-size: 1.7em; font-weight: normal; margin: 0 0 0.4em 0; }
	h2 { font-size: 0.8em; font-weight: normal; margin: 0 0 1.2em 0; line-height: 160%; }
	
	h3 { font-size: 0.6em; color: #453012; text-transform: uppercase; letter-spacing: 3px; margin: 0 0 15px 0; font-weight: normal }
	
	#footer { font-size: 0.5em; clear: both; color: #48483f; margin: 100px 0 0 0; }

	
	</style>
	
	<script language="javascript" type="text/javascript">
	
	function swapToInput(id) {
	
	var fixedId = "hour_person_" + id;
	var inputId = "hour_person_input_" + id;
	var inputFieldId = "hour_person_input_field_" + id;
	
		
	document.getElementById(fixedId).style.display = 'none';
	document.getElementById(inputId).style.display = 'block';
	document.getElementById(inputFieldId).focus();
		
	}
	
	function runUpdate(id) {
	
	
	
	var fixedId = "hour_person_" + id;
	var inputId = "hour_person_input_" + id;
	var inputFieldId = "hour_person_input_field_" + id;
	
	
	document.getElementById(fixedId).style.display = 'block';
	document.getElementById(inputId).style.display = 'none';
	
	var ajaxRequest;
	
	try{
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser doesn't support AJAX.");
				return false;
			}
		}
	}
	
	ajaxRequest.onreadystatechange = function() {
		if(ajaxRequest.readyState == 4){
		
			document.getElementById(fixedId).innerHTML = ajaxRequest.responseText;
		}
	}
	ajaxRequest.open("GET", "oh_updater.php?id=" + id + "&current_name=" + document.getElementById(fixedId).innerHTML + "&update_name=" + document.getElementById(inputFieldId).value, true);
	ajaxRequest.send(null); 
	
	
	
	
	}
	
	</script>
</head>
<body>

<div id="header">
<h1><?php echo $teacher_name; ?>&rsquo;s Office Hours Sign-Up</h1>
<h2>Click below to edit and sign up. Office hours are held in <?php echo $office_location; ?>. <?php echo $office_message; ?></h2>
</div>

<div id="hours_wrapper">
<?php if (!$pause_updating) { ?>
<h3>Week of <?php 
if ( strtotime("today") < strtotime("$update_day this week") ) {
echo date('j F',strtotime("Monday this week")); } else {
echo date('j F',strtotime("Monday next week")); } ?></h3>
<?php }

$query = "SELECT * FROM office_hours ORDER BY id ASC;";
$result = mysql_query($query);

$n = 0;

while ($n < mysql_numrows($result)) {

print "<div class=\"hour_holder\" id=\"hour_id_";
print mysql_result($result,$n,"id");
print "\"><div class=\"hour_name\">";
print mysql_result($result,$n,"hour");
print "</div><div class=\"hour_person\" id=\"hour_person_";
print mysql_result($result,$n,"id");
print "\" onClick=\"javascript:swapToInput('";
print mysql_result($result,$n,"id");
print "')\">";
print mysql_result($result,$n,"name");
print "</div><div class=\"hour_input\" id=\"hour_person_input_";
print mysql_result($result,$n,"id");
print "\"><input type=\"hidden\" id=\"current_name_";
print mysql_result($result,$n,"id");
print "\" value=\"";
print mysql_result($result,$n,"name");
print "\" /><input type=\"text\" size=24 class=\"input_box\" id=\"hour_person_input_field_";
print mysql_result($result,$n,"id");
print "\" value=\"";
print mysql_result($result,$n,"name");
print "\" onBlur=\"javascript:runUpdate('";
print mysql_result($result,$n,"id");
print "')\" />";
print "</div></div>";
print "\n";
$n++;
}
?>

</div>

<?php if (!$pause_updating) { ?>
<div id="footer">
This page automatically resets at the end of each <?php echo $update_day ?>.
</div>
<?php } ?>
</body>
</html>