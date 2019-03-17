<?php
// This file is used for simplifying code inside other php files

// Connectiong to the database (hostName, userName, password, databaseName)
$connection = mysqli_connect('109.106.214.69:443','week10','pass@word1','rentacar');

// The following functions are created to make PHP code more readable
// ------------------------------------------------------------------
// Shortcut function for mysqli_query()
function query($query) {
    global $connection;
    return mysqli_query($connection,$query);
}

// Shortcut function for mysqli_real_escape_string()
function escapeSql($string) {
    global $connection;
    return mysqli_real_escape_string($connection,$string);
}

// Shortcut function for mysqli_fetch_array()
function fetchArray($result) {
    global $connection;
    return mysqli_fetch_array($result);
}

function validateQuery($result) {
    global $connection;
    if(!$result){
        diedie("QUERY FAILED. " . mysqli_error($connection));
    }
}
// ------------------------------------------------------------------

?>