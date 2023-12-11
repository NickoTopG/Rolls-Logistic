<?php

$LOCALHOST = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "logistic";

$con = new mysqli($LOCALHOST, $USERNAME, $PASSWORD, $DBNAME);
echo get_include_path();
if (!$con) {
    die("Connection error: " . $con->connect_error);
}
