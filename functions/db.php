<?php
// This file is used for simplifying code inside other php files

// Connectiong to the database (hostName, userName, password, databaseName)
$connection = mysqli_connect('109.106.214.69:443','week10','pass@word1','rentacar');

// The following functions are created to make PHP code more readable
// ------------------------------------------------------------------
// Shortcut function for mysqli_query() with result validation
function query($query) {
    global $connection;
    $result = mysqli_query($connection,$query);
    if(!$result){
        return die("QUERY FAILED. " . mysqli_error($connection));
    } else {
        return $result;
    }
}

// Shortcut function for mysqli_real_escape_string()
function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection,$string);
}

// Shortcut function for mysqli_fetch_array()
function fetchArray($result) {
    global $connection;
    return mysqli_fetch_array($result);
}

// Shortcut function for validating executed query
function validateQuery($result) {
    global $connection;
    if(!$result){
        die("QUERY FAILED. " . mysqli_error($connection));
    }
}

// Shortcut function for row count
function rowCount($result) {
    return mysqli_num_rows($result);
}



// ------------------------------------------------------------------

?>