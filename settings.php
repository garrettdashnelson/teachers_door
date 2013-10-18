<?php

// TEACHER'S DOOR v0.9 by GARRETT DASH NELSON
// SETTINGS



// DATABASE SETTINGS
// Set the name of your MySQL server. Most commonly "localhost".
$mysql_server = "localhost";
// Set the name of your MySQL user.
$mysql_user = "";
// Set the MySQL password.
$mysql_password = "";
// Set to the name of your MySQL database.
$mysql_database = "";
// Set to the name of your MySQL hours table.
$mysql_hours_table = "office_hours";
// Set to the name of your MySQL meta table.
$mysql_meta_table = "office_hours_meta";


// OFFICE HOURS SETTINGS
// Set your name.
$teacher_name = "Burt";
// Set your office location.
$office_location = "Science Hall 412";
// Set a message for 
$office_message = "Drop-ins and visits by appointment are always welcome and encouraged.";

// AUTO-UPDATE SETTINGS
// Set the day of the week you want the system to update. The system will update at midnight on this day each week.
// Note that, as written, the server will update at midnight server-time. Time zone support coming in a future release?
$update_day = "Tuesday";
// Set to 'true' if you wish to pause the weekly resets.
$pause_updating = false;

// STYLE SETTINGS
// Set the background-color
$background_color = "#FAFAED";

?>