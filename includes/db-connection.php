<?php
    $db['db_host'] = '109.106.214.69:443';
    $db['db_user'] = 'week10';
    $db['db_pass'] = 'pass@word1';
    $db['db_name'] = 'week8';

    foreach ($db as $key => $value) {
        define(strtoupper($key), $value);
    }

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
?>